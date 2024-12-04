<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Country;
use Illuminate\Support\Facades\Http;
class CountryController extends ApiController
{
    public function getCountryNames()
    {
        $countries = Country::select('id', 'name', 'country_code')->get();
        return response()->json(['countries' => $countries], 200);
    }

    public function getIpCountryName()
    {
        $response = Http::get('https://ipinfo.io', [
            'token' => env('IPINFO_TOKEN')
        ]);
    
        return response()->json($response->json());
    }
}
