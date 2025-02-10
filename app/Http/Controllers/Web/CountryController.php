<?php

namespace App\Http\Controllers\Web;
use App\Models\Country;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Web\SiteDataController;


class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getAll()
    {
        $sycountries = Country::select('id', 'name_ar', 'code')->where('code', 'sy')->first();
        $countries = Country::select('id', 'name_ar', 'code')->whereNot('code', 'sy')->orderBy('name_ar')->get();
        $countries->prepend($sycountries);
        return $countries;
    }

    public function getCitiesbyCountryID($country_id)
    {
        $cities = City::where('country_id', $country_id)->select('id', 'name_ar')->orderBy('name_ar')->get();
        return $cities;
    }

    public function getCities($country_id)
    {
        $cities = $this->getCitiesbyCountryID($country_id);

        return response()->json($cities);
    }

}
