<?php

namespace App\Http\Controllers\Advertiser;

use App\Enums\AdStatus;
use App\Http\Controllers\Controller;
use App\Models\AdPackage;
use App\Models\Advertisement;
use App\Models\SkillCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function index(){
        $user=Auth::guard('advertiser')->user();
        $ads=Advertisement::where('advertiser_id',$user->id)->get();
        $payment_success=request('payment_success',null);
        return view('advertiser.ads.index',compact('ads','payment_success'));
    }

    public function show(Advertisement $ad){
        $user=Auth::guard('advertiser')->user();
        if($ad->advertiser_id!=$user->id){
            return abort(403);
        }
        return view('advertiser.ads.single',compact('ad'));
    }

    public function stats(Advertisement $ad){
        $user=Auth::guard('advertiser')->user();
        if($ad->advertiser_id!=$user->id){
            return abort(403);
        }
        $month=request('month','current');
        if($month=='current'){
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;
        }else{
            $month = Carbon::now()->subMonth()->month;
            $year = Carbon::now()->subMonth()->year;
        }
        // Query to retrieve daily views for the current month
        $views = DB::table('ad_views')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->where('advertisement_id', $ad->id)
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        // Prepare data for chart
        $labels = $views->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('d');
        });
        $data = $views->pluck('count');
        return view('advertiser.ads.stats',compact('ad','data','labels'));
    }
    public function edit(Advertisement $ad){
        $user=Auth::guard('advertiser')->user();
        if($ad->advertiser_id!=$user->id || $ad->status!='rejected'){
            return abort(403);
        }
        if($ad->package->type=='notification'){
            $categories=SkillCategory::all();
            return view('advertiser.ads.edit-notification',compact('ad','categories'));
        }
        return view('advertiser.ads.edit-banner',compact('ad'));
    }

    public function update(Request $request,Advertisement $ad){
        $user=Auth::guard('advertiser')->user();
        if($ad->advertiser_id!=$user->id || $ad->status!='rejected'){
            return abort(403);
        }
        if($ad->package->type=='notification'){
            return $this->updateNotificationAd($request,$ad);
        }else{
            return $this->updateBannerAd($request,$ad);
        }
    }

    private function updateNotificationAd(Request $request,Advertisement $ad){
        $data=$request->validate([
            'title'=>'required',
            'skill_category_id'=>'required',
            'description'=>'required',
            'url'=>['url','nullable'],
            'content'=>'required'
        ]);
        $ad->status=AdStatus::UNDER_REVIEW;
        $ad->update($data);
        return redirect()->route('advertiser.ads.index')->with('success','Ad Updated Successfully. It will be published once approved by admin.');
    }

    private function updateBannerAd(Request $request,Advertisement $ad){
        if($request->type=='content'){
            $data=$request->validate([
                'title'=>'required',
                'type'=>'required',
                'button_text'=>'required',
                'url'=>'required',
                'color'=>'required',
                'bg_color'=>'required',
                'button_color'=>'required',
                'button_bg_color'=>'required',
                'description'=>'required'
            ]);
            $features=[$request->feature1,$request->feature2];
            $features=array_values(array_filter($features));
            $data['features']=json_encode($features);
        }else{
            $data=$request->validate([
                'title'=>'required',
                'url'=>'required',
                'type'=>'required'
            ]);
            $file=$request->file('image');
            if($file){
                $imagePath = $file->storePublicly('advertisements', 's3');
                $imageUrl = Storage::disk('s3')->url($imagePath);
                $data['image'] =$imageUrl;
            }
        }
        $ad->status=AdStatus::UNDER_REVIEW;
        $ad->update($data);
        return redirect()->route('advertiser.ads.index')->with('success','Ad Updated Successfully. It will be published once approved by admin.');
    }

    public function packages(){
        $packages=AdPackage::whereActive(true)->get();
        return view('advertiser.ads.packages',compact('packages'));
    }

    public function create(AdPackage $package){
        // notification is totally different
        // rest of ads has same design so use banner layout
        if($package->type=='notification'){
            $categories=SkillCategory::all();
            return view('advertiser.ads.create-notification',compact('package','categories'));
        }
        return view('advertiser.ads.create-banner',compact('package'));
    }

    public function store(Request $request, AdPackage $package){
        if($package->type=='notification'){
            return $this->storeNotificationAd($request,$package);
        }else{
            return $this->storeBannerAd($request,$package);
        }
    }

    private function storeNotificationAd(Request $request,AdPackage $package){
        $data=$request->validate([
            'title'=>'required',
            'skill_category_id'=>'required',
            'description'=>'required',
            'url'=>['url','nullable'],
            'content'=>'required'
        ]);
        $data['package_id']=$package->id;
        $data['duration']=$package->duration;
        $data['price']=$package->price;
        $data['total']=$package->price;
        $data['type']='content';
        $data['advertiser_id']=Auth::guard('advertiser')->user()->id;
        $ad=Advertisement::create($data);
        return redirect()->route('advertiser.ad.payment',['ad'=>$ad->id,'quantity'=>1]);
    }

    private function storeBannerAd(Request $request,AdPackage $package){
        if($request->type=='content'){
            $data=$request->validate([
                'title'=>'required',
                'type'=>'required',
                'package_quantity'=>'required',
                'button_text'=>'required',
                'url'=>'required',
                'color'=>'required',
                'bg_color'=>'required',
                'button_color'=>'required',
                'button_bg_color'=>'required',
                'description'=>'required'
            ]);
            $features=[$request->feature1,$request->feature2];
            $features=array_values(array_filter($features));
            $data['features']=json_encode($features);
        }else{
            $data=$request->validate([
                'title'=>'required',
                'url'=>'required',
                'image'=>'required',
                'type'=>'required',
                'package_quantity'=>'required',
            ]);
            $file=$request->file('image');
            $imagePath = $file->storePublicly('advertisements', 's3');
            $imageUrl = Storage::disk('s3')->url($imagePath);
            $data['image'] =$imageUrl;
        }
        $quantity=$data['package_quantity'];
        $data['package_id']=$package->id;
        $data['duration']=$package->duration*$quantity;
        $data['price']=$package->price;
        $data['total']=$package->price*$quantity;
        $data['advertiser_id']=Auth::guard('advertiser')->user()->id;
        $ad=Advertisement::create($data);
        return redirect()->route('advertiser.ad.payment',['ad'=>$ad->id,'quantity'=>$quantity]);
    }

    public function payment(Advertisement $ad,$quantity=1){
        $user=Auth::guard('advertiser')->user();
        $quantity=(int)$quantity;
        $checkout = $user->checkout([$ad->package->price_id=>$quantity])
        ->returnTo(route('advertiser.ads.index',['payment_success'=>1]))
        ->customData(['ad_id' => $ad->id]);
        return view('advertiser.ads.payment',['checkout' => $checkout]);
    }
}
