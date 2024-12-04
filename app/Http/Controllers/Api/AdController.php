<?php

namespace App\Http\Controllers\Api;

use App\Enums\AdStatus;
use App\Http\Controllers\ApiController;
use App\Http\Resources\AdvertisementResource;
use App\Models\AdPackage;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdController extends ApiController
{
    public function getAds(){
        $google_ads_enabled=getSettingValue('enable-google-ads');
        $data=[];
        $data['google_ads']=[];
        $data['advertiser_ads']=[];
        if($google_ads_enabled){
            $data['google_ads']=$this->googleAds();
        }else{
            $data['advertiser_ads']=$this->advertiserAds();
        }
        return $this->successResponse($data);
    }

    private function googleAds(){
        return [
            'rectangle'=>getSettingValue('rectangle-google-ad'),
            'leaderboard'=>getSettingValue('leaderboard-google-ad'),
            'skyscraper'=>getSettingValue('skyscraper-google-ad')
        ];
    }

    private function advertiserAds(){
        $package=AdPackage::whereType('notification')->first();
        $ads=Advertisement::where('package_id','!=',$package->id??null)->whereActive(true)->whereStatus(AdStatus::APPROVED)->get();
        return AdvertisementResource::collection($ads);
    }
}
