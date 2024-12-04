<?php

namespace App\Http\Controllers\Admin;

use App\Enums\SwapStatus;
use App\Http\Controllers\Controller;
use App\Models\Advertiser;
use App\Models\Invoice;
use App\Models\QuizTest;
use App\Models\Swap;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function index(){
        $data['users_count']=User::count();
        $data['advertisers_count']=Advertiser::count();
        $data['swaps_count']=Swap::whereNotIn('status',[SwapStatus::PENDING,SwapStatus::REJECTED])->count();
        $data['exams']=QuizTest::count();
        $data['approved_skills']=DB::table('skill_user')->where('status',1)->count();
        $stats=$this->getInvoiceStats();
        $data['total_revenue']=$stats['total']/100;
        $data['last_month']=$stats['last_month']/100;
        $data['current_month']=$stats['current_month']/100;
        $data['logs']=Activity::with('causer')->orderBy('id','desc')->take(10)->get();
        $data['swaps']=Swap::with('users')->whereIn('status',[SwapStatus::PROGRESS,SwapStatus::Completed])->orderBy('id','desc')->take(10)->get();
        $userStats=$this->getUsersData();
        $data=array_merge($data,$userStats);
        $data['users']=$this->getTopRatedUsers();
        return view('admin.index',$data);
    }


    private function getInvoiceStats(){
        $data=array();
        $data['total']=Invoice::sum('amount');
        $data['current_month']=Invoice::whereYear('created_at', Carbon::now()->year)
                                    ->whereMonth('created_at', Carbon::now()->month)
                                    ->sum('amount');
        $data['last_month']=Invoice::whereYear('created_at', Carbon::now()->subMonth()->year)
                                    ->whereMonth('created_at', Carbon::now()->subMonth()->month)
                                    ->sum('amount');
        return $data;
    }

    private function getUsersData(){
        $views = DB::table('users')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
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
            'user_data'=>$data,
            'user_labels'=>$labels
        ];
    }

    private function getTopRatedUsers(){
        $users=User::with('skills')->withAvg('swapDetails as avg_rating','rating')->withCount(['swaps','swapDetails as rating_count'=>function($qry){
            $qry->whereNotNull('rating');
        },
        'skills'=>function($qry){
            $qry->where('status',1);
        }])
        ->orderByRaw('rating_count desc')
        ->orderByRaw('avg_rating desc')
        ->take(10)->get();
        return $users;
    }

    public function profile(){
        $user=Auth::guard('admin')->user();
        return view('admin.profile',compact('user'));
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        $user=Auth::guard('admin')->user();
        $user->enable_2fa=$request->enable_2fa??false;
        $user->name=$request->name;
        $user->save();
        return redirect()->back()->with('success','Profile Updated Successfully');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>['required','confirmed','min:8']
        ]);
        $user=Auth::guard('admin')->user();
        if(Hash::check($request->current_password,$user->password)){
          $user->password=bcrypt($request->password);
          $user->save();
          return redirect()->back()->with('success','Password Updated Successfully');
        }
        return redirect()->back()->withErrors(['Incorrect Password']);
    }

    public function uploadEditorMedia(Request $request){

        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $imagePath = $request->file('upload')->storePublicly('media', 's3');
            $url = Storage::disk('s3')->url($imagePath);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    public function allNotifications(){
        $user=Auth::guard('admin')->user();
        $notifications=$user->notifications()->latest()->paginate(20);
        return view('admin.notifications.index',compact('notifications'));
    }

    public function showNotification(DatabaseNotification $notification){
        if(!$notification->read_at){
            $notification->read_at=now();
            $notification->save();
        }
        $data=$notification->data;
        if($data['type']=='support-ticket'){
            return redirect()->route('admin.support.tickets.show',$data['id']);
        }
        else if($data['type']=='ad'){
            return redirect()->route('admin.ads.show',$data['id']);
        }
        return view('admin.notifications.single',$data);
    }
}
