<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Visitor;
class VisitorController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function set_visit($client_id,$visited_client_id)
    {
        $model=  Visitor::updateOrCreate(
          ['client_id' => $client_id, 'visited_id' => $visited_client_id]         
      );
      return $model->id;
    }
    public function who_visited_me($lang)
    {
      $id = Auth::guard('client')->user()->id;
      $sitedctrlr = new SiteDataController();
      $transarr = $sitedctrlr->FillTransData($lang);
      $defultlang = $transarr['langs']->first();
      $favelist = Visitor::with([
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
      ])->where('visited_id', $id)->orderByDesc('created_at')->get();
      $clients_res = $this->selectandmap($favelist, $lang);
      $type = 'fav-me';
      return view(
        "site.page.favorite-list.visit-me",
        [
          "clients" => (object) $clients_res,
          'lang' => $lang,
          'defultlang' => $defultlang,
          'type' => $type,
        ]
      );
    }
    public function selectandmap($favorite_list, $lang)
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
      'visited_id' => $favorite->id,
      'since_visit_date' => Carbon::parse($favorite->created_at)->diffForHumans(),
    ];
    return $clientArr;
  }

  public function who_visited_me_today_count()
  {
    $id = Auth::guard('client')->user()->id; 
      $favecount = Visitor::where('visited_id', $id)->whereDate('updated_at',Carbon::today())->count();
   // $favecount = Visitor::where('visited_id', $id)->count();
    return $favecount;
  }

}
