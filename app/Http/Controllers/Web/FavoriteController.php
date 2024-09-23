<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ClientReport;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
class FavoriteController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //btn-add-to-favorite
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $formdata = $request->all();

    if (isset($formdata['member_id'])) {
      $fav_to_client_id = $formdata['member_id'];

      $auth_id = Auth::guard('client')->user()->id;
      $favObj = Favorite::where('client_id', $auth_id)->where('fav_to_client_id', $fav_to_client_id)->first();
      $is_favorite = 0;
      if ($favObj) {

        if (is_null($favObj->is_favorite)) {
          $is_favorite = 1;
        } else {
          if ($favObj->is_favorite == 1) {
            $is_favorite = 2;
          } elseif ($favObj->is_favorite == 2 || $favObj->is_favorite == 0) {
            $is_favorite = 1;
          }
        }
        if ($favObj->is_blacklist == 1 && $is_favorite == 1) {
          return response()->json(-1);
        } else {
          $now = Carbon::now();
          $favObj->favorite_date = $now;
          $favObj->is_favorite = $is_favorite;
          $favObj->save();
        }

      } else {
        $favObj = new Favorite();
        $now = Carbon::now();
        $favObj->favorite_date = $now;
        $favObj->client_id = $auth_id;
        $favObj->fav_to_client_id = $fav_to_client_id;
        $favObj->is_favorite = 1;
        $favObj->save();
        $is_favorite = $favObj->is_favorite;

      }
      // Favorite::updateOrCreate(
      //     ['client_id' => $auth_id, 'fav_to_client_id' => $fav_to_client_id],
      //     ['is_favorite' => 1]
      // );
      return response()->json($is_favorite);
    } else {
      return response()->json('error', 422);
    }
  }

  public function delete_fav(Request $request)
  {
    $formdata = $request->all();
    if (isset($formdata['favorite_id'])) {
      $favorite_id = $formdata['favorite_id'];
      $auth_id = Auth::guard('client')->user()->id;
      $favObj = Favorite::find($favorite_id);
      if ($favObj) {
        if ($favObj->client_id == $auth_id) {
          $now = Carbon::now();
          if ($formdata['type'] == 'fav') {
            $favObj->favorite_date = $now;
            $favObj->is_favorite = 2;
            $favObj->save();
            return response()->json($favObj->is_favorite);
          } else if ($formdata['type'] == 'black') {
            $favObj->blacklist_date = $now;
            $favObj->is_blacklist = 2;
            $favObj->save();
            return response()->json($favObj->is_blacklist);
          }
        }
      }
    }
    return response()->json('error', 422);


  }

  public function store_blacklist(Request $request)
  {
    $formdata = $request->all();
    if (isset($formdata['member_id'])) {
      $fav_to_client_id = $formdata['member_id'];

      $auth_id = Auth::guard('client')->user()->id;
      $favObj = Favorite::where('client_id', $auth_id)->where('fav_to_client_id', $fav_to_client_id)->first();
      $is_blacklist = 0;
      if ($favObj) {
        if (is_null($favObj->is_blacklist)) {
          $is_blacklist = 1;
        } else {
          if ($favObj->is_blacklist == 1) {
            $is_blacklist = 2;
          } elseif ($favObj->is_blacklist == 2 || $favObj->is_blacklist == 0) {
            $is_blacklist = 1;
          }
        }
        //two enabled not allowed
        if ($favObj->is_favorite == 1 && $is_blacklist == 1) {
          return response()->json(-1);
        } else {
          $now = Carbon::now();
          $favObj->blacklist_date = $now;
          $favObj->is_blacklist = $is_blacklist;
          $favObj->save();
        }

      } else {
        $favObj = new Favorite();
        $now = Carbon::now();
        $favObj->blacklist_date = $now;
        $favObj->client_id = $auth_id;
        $favObj->fav_to_client_id = $fav_to_client_id;
        $favObj->is_blacklist = 1;
        $favObj->save();
        $is_blacklist = $favObj->is_blacklist;

      }
      // Favorite::updateOrCreate(
      //     ['client_id' => $auth_id, 'fav_to_client_id' => $fav_to_client_id],
      //     ['is_favorite' => 1]
      // );
      return response()->json($is_blacklist);
    } else {
      return response()->json('error', 422);
    }
  }
  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }
  public function getstate($client_id, $fav_to_client_id)
  {
    //0 null
    // 1 yes
    //2 no 
    $is_favorite = 0;
    $is_blacklist = 0;
    $fave = Favorite::where('client_id', $client_id)->where('fav_to_client_id', $fav_to_client_id)->first();
    if ($fave) {
      if (!is_null($fave->is_favorite)) {
        $is_favorite = $fave->is_favorite;
      }
      if (!is_null($fave->is_blacklist)) {
        $is_blacklist = $fave->is_blacklist;
      }
    }
    $is_report = 0;
    $report = ClientReport::where('sender_id', $client_id)->where('report_to_client_id', $fav_to_client_id)->first();
    if ($report) {
      if (!is_null($report->is_report)) {
        $is_report = $report->is_report;
      }

    }
    return [
      'is_favorite' => $is_favorite,
      'is_blacklist' => $is_blacklist,
      'is_report' => $is_report
    ];
  }
  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
  public function my_favorite($lang)
  {
    $id = Auth::guard('client')->user()->id;
    $sitedctrlr = new SiteDataController();
    $transarr = $sitedctrlr->FillTransData($lang);
    $defultlang = $transarr['langs']->first();
    // $favelist = Favorite::with([
    //   'favtoclient' => function ($q) use ($id) {
    //     $q->with(
    //       [
    //         'clientoptions' => function ($q) {
    //           $q->with([
    //             'property:id,name,is_active,type,is_multivalue,notes',
    //             'optionvalue:id,name,is_active,value,value_int,notes,property_id,type',
    //             'country:id,name_ar,code',
    //             'city:id,name_en,name_ar,code,country_id'
    //           ])->select(
    //               'id',
    //               'client_id',
    //               'property_id',
    //               'option_id',
    //               'val_str',
    //               'val_int',
    //               'val_date',
    //               'notes',
    //               'type',
    //               'country_id',
    //               'city_id'
    //             );
    //         }
    //       ]
    //     );
    //   }
    // ])->where('client_id', $id)->where('is_favorite', 1)->orderByDesc('favorite_date')->get();
    // $clients_res = $this->selectandmap($favelist, $lang);
    $clients_res =$this->favorite_list($id, $lang);
    $type = 'fav';
    return view(
      "site.page.favorite-list.favorite",
      [
        "clients" => (object) $clients_res,
        'lang' => $lang,
        'defultlang' => $defultlang,
        'type' => $type,
      ]
    );
  }
  public function my_blacklist($lang)
  {

    $id = Auth::guard('client')->user()->id;
    $sitedctrlr = new SiteDataController();
    $transarr = $sitedctrlr->FillTransData($lang);
    $defultlang = $transarr['langs']->first();
    $favelist = Favorite::with([
      'favtoclient' => function ($q) use ($id) {
        $q->with(
          [
            'clientoptions' => function ($q) {
              $q->with([
                'property:id,name,is_active,type,is_multivalue,notes',
                'optionvalue:id,name,is_active,value,value_int,notes,property_id,type',
                'country:id,name_ar,code',
                'city:id,name_en,name_ar,code,country_id'
              ])->select(
                  'id',
                  'client_id',
                  'property_id',
                  'option_id',
                  'val_str',
                  'val_int',
                  'val_date',
                  'notes',
                  'type',
                  'country_id',
                  'city_id'
                );
            }
          ]
        );
      }
    ])->where('client_id', $id)->where('is_blacklist', 1)->orderByDesc('blacklist_date')->get();
    $clients_res = $this->selectandmap($favelist, $lang);
    $type = 'black';
    return view(
      "site.page.favorite-list.favorite",
      [
        "clients" => (object) $clients_res,
        'lang' => $lang,
        'defultlang' => $defultlang,
        'type' => $type,
      ]
    );

  }
  public function who_like_me($lang)
  {
    $id = Auth::guard('client')->user()->id;
    $sitedctrlr = new SiteDataController();
    $transarr = $sitedctrlr->FillTransData($lang);
    $defultlang = $transarr['langs']->first();
    $favelist = Favorite::with([
      'client' => function ($q) use ($id) {
        $q->with(
          [
            'clientoptions' => function ($q) {
              $q->with([
                'property:id,name,is_active,type,is_multivalue,notes',
                'optionvalue:id,name,is_active,value,value_int,notes,property_id,type',
                'country:id,name_ar,code',
                'city:id,name_en,name_ar,code,country_id'
              ])->select(
                  'id',
                  'client_id',
                  'property_id',
                  'option_id',
                  'val_str',
                  'val_int',
                  'val_date',
                  'notes',
                  'type',
                  'country_id',
                  'city_id'
                );
            }
          ]
        );
      }
    ])->where('fav_to_client_id', $id)->where('is_favorite', 1)->orderByDesc('favorite_date')->get();
    $clients_res = $this->selectandmap_likeme($favelist, $lang);
    $type = 'fav-me';
    return view(
      "site.page.favorite-list.like-me",
      [
        "clients" => (object) $clients_res,
        'lang' => $lang,
        'defultlang' => $defultlang,
        'type' => $type,
      ]
    );
  }

  public function favorite_list($id,$lang)
  {

    $favelist = Favorite::with([
      'favtoclient' => function ($q) use ($id) {
        $q->with(
          [
            'clientoptions' => function ($q) {
              $q->with([
                'property:id,name,is_active,type,is_multivalue,notes',
                'optionvalue:id,name,is_active,value,value_int,notes,property_id,type',
                'country:id,name_ar,code',
                'city:id,name_en,name_ar,code,country_id',

              ])->select(
                  'id',
                  'client_id',
                  'property_id',
                  'option_id',
                  'val_str',
                  'val_int',
                  'val_date',
                  'notes',
                  'type',
                  'country_id',
                  'city_id'
                );
            }

          ]
        );
      }
    ])->where('client_id', $id)->where('is_favorite', 1)->orderByDesc('favorite_date')->get();
    $clients_res = $this->selectandmap($favelist, $lang);
    return  $clients_res;
  }
  public function favorite_listwith_image($id,$lang)
  {

    $favelist = Favorite::with([
      'favtoclient' => function ($q) use ($id) {
        $q->with(
          [
            'clientoptions' => function ($q) {
              $q->with([
                'property:id,name,is_active,type,is_multivalue,notes',
                'optionvalue:id,name,is_active,value,value_int,notes,property_id,type',
                'country:id,name_ar,code',
                'city:id,name_en,name_ar,code,country_id',

              ])->select(
                  'id',
                  'client_id',
                  'property_id',
                  'option_id',
                  'val_str',
                  'val_int',
                  'val_date',
                  'notes',
                  'type',
                  'country_id',
                  'city_id'
                );
            },
            'clientsshowto'=> function ($q) use ($id) {
              $q->where('client_id',$id);},            
          ]
        );
      }
    ])->where('client_id', $id)->where('is_favorite', 1)->orderByDesc('favorite_date')->get();
    $clients_res = $this->selectandmap($favelist, $lang);
    return  $clients_res;
  }
  public function selectandmap($favorite_list, $lang)
  {


    $propctrlr = new PropertyController();
    $clients_res = $favorite_list->map(function ($favorite) use ($lang, $propctrlr) {

      return $this->client_prop_map($favorite->favtoclient, $lang, $propctrlr, $favorite);

    });
    return $clients_res;

  }
  public function selectandmap_likeme($favorite_list, $lang)
  {


    $propctrlr = new PropertyController();
    $clients_res = $favorite_list->map(function ($favorite) use ($lang, $propctrlr) {

      return $this->client_prop_map($favorite->client, $lang, $propctrlr, $favorite);

    });
    return $clients_res;

  }
  public function client_prop_map($client, $lang, PropertyController $propctrlr, $favorite)
  {

    // $wife_num=$client->clientoptions()->with('optionvalue','property')->wherehas('property', function ($query) {
    //     $query->where('name', 'wife_num');
    // })->first();
    // $wife_num = $this->client_prop_filter($client->clientoptions, 'wife_num');
    $clientoptions = $propctrlr->client_prop_list($client->clientoptions);
    $countrytoptions = $propctrlr->country_prop_list($client->clientoptions);



    $clientArr = [
      'client' => $client->withoutRelations(),
      'residence' => $propctrlr->country_prop_filter($countrytoptions, 'residence'),
      'nationality' => $propctrlr->country_prop_filter($countrytoptions, 'nationality'),

      'family_status' => $propctrlr->client_prop_filter($clientoptions, 'family_status'),
      'family_status_female' => $propctrlr->client_prop_filter($clientoptions, 'family_status_female'),
      'wife_num' => $propctrlr->client_prop_filter($clientoptions, 'wife_num'),
      'since_register' => $client->created_at->diffForHumans(),
      'favorite_id' => $favorite->id,
      'since_favorite_date' => Carbon::parse($favorite->favorite_date)->diffForHumans(),

    ];
    return $clientArr;
  }

 
}
