<?php

namespace App\Http\Controllers\Advertiser;

use App\Enums\AdStatus;
use App\Http\Controllers\Controller;
use App\Models\AdView;
use App\Models\SupportTicket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class DashboardController extends Controller
{
    public function index(){
        $user=Auth::guard('advertiser')->user();
        $ads=$user->ads()->pluck('id')->toArray();
        $data['ads']=$user->ads()->where('status',AdStatus::APPROVED)->get();
        $data['total_campaigns']=$user->ads()->count();
        $data['active_campaigns']=$user->ads()->where('status',AdStatus::APPROVED)->count();
        $data['total_views']=AdView::whereIn('advertisement_id',$ads)->count();
        $data['current_month_views']=AdView::whereIn('advertisement_id',$ads)->whereYear('created_at',now()->year)->whereMonth('created_at',now()->month)->count();;
        $view_stats=$this->getViewsData($ads);
        $data=array_merge($data,$view_stats);
        return view('advertiser.index',$data);
    }

    private function getViewsData($ads){
        $views = DB::table('ad_views')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
        ->whereIn('advertisement_id',$ads)
        ->whereDate('created_at', '>=',Carbon::now()->subDays(30))
        ->groupBy('date')
        ->orderBy('date')
        ->get();
        // Prepare data for chart
        $labels = $views->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('d M');
        });
        $data = $views->pluck('count');
        return [
            'view_data'=>$data,
            'view_labels'=>$labels
        ];
    }

    public function profile(){
        $user=Auth::guard('advertiser')->user();
        return view('advertiser.profile',compact('user'));
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        $user=Auth::guard('advertiser')->user();
        $user->name=$request->name;
        $user->enable_2fa=$request->enable_2fa??false;
        $user->save();
        return redirect()->back()->with('success','Profile Updated Successfully');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>['required','confirmed','min:8']
        ]);
        $user=Auth::guard('advertiser')->user();
        if(Hash::check($request->current_password,$user->password)){
          $user->password=bcrypt($request->password);
          $user->save();
          return redirect()->back()->with('success','Password Updated Successfully');
        }
        return redirect()->back()->withErrors(['Incorrect Password']);
    }

    public function allNotifications(){
        $user=Auth::guard('advertiser')->user();
        $notifications=$user->notifications()->latest()->paginate(20);
        return view('advertiser.notifications.index',compact('notifications'));
    }

    public function showNotification(DatabaseNotification $notification){
        if(!$notification->read_at){
            $notification->read_at=now();
            $notification->save();
        }
        $data=$notification->data;
        if($data['type']=='support-ticket'){
            return redirect()->route('advertiser.support.tickets.show',$data['id']);
        }
        else if($data['type']=='ad'){
            return redirect()->route('advertiser.ads.show',$data['id']);
        }
        return view('advertiser.notifications.single',$data);
    }
}
