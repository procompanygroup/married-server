<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ClientPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Http\Requests\Package\UpdatePackageRequest;
use App\Http\Requests\Package\StorePackageRequest;
use Illuminate\Support\Facades\Validator;

use File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ClientPackageController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request, $lang)
  {
    $List = Package::where('is_active', 1)->get();
    $ip = $request->getClientIp();
    $sitedctrlr = new SiteDataController();
    $transarr = $sitedctrlr->FillTransData($lang);

    $defultlang = $transarr['langs']->first();
    return view('site.subscribe.show', ['List' => $List, 'lang' => $lang, 'defultlang' => $defultlang, 'ip' => $ip]);
  }

  //admin
  public function show_subscribtions()
  {
    $List = ClientPackage::with('order', 'client', 'package')->orderByDesc('created_at')->get();
    return view('admin.subscribe.show', ['List' => $List]);
  }
  public function payment(Request $request, $lang)
  {
    $formdata = $request->all();
    $sitedctrlr = new SiteDataController();
    $transarr = $sitedctrlr->FillTransData($lang);

    $defultlang = $transarr['langs']->first();
    if (isset($formdata['pack'])) {
      $pack_id = $formdata['pack'];
      $item = Package::where('is_active', 1)->where('id', $pack_id)->first();
      if ($item) {
        //  $ip= $request->getClientIp(); 

        return view('site.subscribe.payment', ['item' => $item, 'lang' => $lang, 'defultlang' => $defultlang]);

      }

    } else {
      return view('site.subscribe.payment', ['lang' => $lang, 'defultlang' => $defultlang]);
    }
    return response()->json('not found', 401);
  }
  public function create()
  {
    return view('admin.package.create');
  }


  //
  public function features($lang)
  {

    $sitedctrlr = new SiteDataController();
    $transarr = $sitedctrlr->FillTransData($lang);

    $defultlang = $transarr['langs']->first();

    $auth_id = auth()->guard('client')->user()->id;

    $items = $this->member_packages($auth_id);
    //  $ip= $request->getClientIp(); 

    return view('site.subscribe.member_features', ['items' => $items, 'lang' => $lang, 'defultlang' => $defultlang]);



  }
  //
  /**
   * Store a newly created resource in storage.
   */
  // public function store(StorePackageRequest $request)
  // {
  //   $formdata = $request->all();
  //   // return  $formdata;
  //   // return redirect()->back()->with('success_message', $formdata);
  //   $validator = Validator::make(
  //     $formdata,
  //     $request->rules(),
  //     $request->messages()
  //   );

  //   if ($validator->fails()) {
  //     /*
  //                          return  redirect()->back()->withErrors($validator)
  //                          ->withInput();
  //                          */
  //     // return response()->withErrors($validator)->json();
  //     return response()->json($validator);

  //   } else {

  //     $newObj = new ClientPackage();
  //     //reset all to 0
  //     $newObj->client_id = $formdata['client_id'];
  //     $newObj->package_id = $formdata['package_id'];
  //     $newObj->chat_count = $formdata['chat_count'];
  //     $newObj->search_count = $formdata['search_count'];
  //     $newObj->hidden_feature = $formdata['hidden'];
  //     $newObj->show_img = $formdata['show_img'];
  //     $newObj->special_member = $formdata['special_member'];
  //     $newObj->edit_name = $formdata['edit_name'];
  //     $newObj->favorite_count = $formdata['favorite_count'];
  //     $newObj->expire_duration = $formdata['expire_duration'];
  //     $newObj->chat_count_remain = $formdata['chat_count_remain'];
  //     $newObj->search_count_remain = $formdata['search_count_remain'];
  //     $newObj->favorite_count_remain = $formdata['favorite_count_remain'];
  //     $newObj->status = $formdata['status'];
  //     $newObj->start_date = $formdata['start_date'];
  //     $newObj->end_date = $formdata['end_date'];

  //     $newObj->save();
  //     if ($request->hasFile('image')) {
  //       $file = $request->file('image');
  //       // $filename= $file->getClientOriginalName();                
  //       $this->storeImage($file, $newObj->id);
  //     }

  //     return response()->json("ok");
  //   }
  // }

  public function check_exist_order($order_id)
  {
    $cpack = ClientPackage::where('order_id', $order_id)->first();
    if ($cpack) {
      return 1;
    } else {
      return 0;
    }
  }
  public function add($client_id, $package_id, $order_id)
  {

    $package = Package::find($package_id);

    $newObj = new ClientPackage();
    //reset all to 0
    $newObj->client_id = $client_id;
    $newObj->package_id = $package_id;
    $newObj->order_id = $order_id;
    $newObj->chat_count = $package->chat_count;
    $newObj->search_count = $package->search_count;
    $newObj->hidden_feature = $package->hidden_feature;
    $newObj->show_img = $package->show_img;
    $newObj->special_member = $package->special_member;
    $newObj->edit_name = $package->edit_name;
    $newObj->favorite_count = $package->favorite_count;
    $newObj->expire_duration = $package->expire_duration;
    $newObj->chat_count_remain = $package->chat_count;

    $newObj->search_count_remain = $package->search_count;
    $newObj->favorite_count_remain = $package->favorite_count;
    $newObj->is_expire = $package->is_expire;
    $newObj->status = '1';
    if ($package->is_expire == 1) {
      $now = Carbon::now()->toDateString();
      //  $now = $now->toDateString();
      $newObj->start_date = Carbon::parse($now);
      $newObj->end_date = Carbon::parse($now)->addMonths($package->expire_duration);

    }
    $newObj->save();
    return $newObj->id;
  }


  //validate availability section
  public function check_available($client_id, $conditionArr=true)
  {
    /*
->where([
    ['status', '=', '1'],
    ['subscribed', '<>', '1'],
])
    */
    $now = Carbon::now();
    $cpack = ClientPackage::where('client_id', $client_id)->where('status', 1)
      ->where($conditionArr)
      ->Where(function ($query) use ($now) {
        return $query
          ->Where(
            function ($query) {
              return $query
                ->where('is_expire', 0);
            }
          )->orWhere(function ($query) use ($now) {
            return $query
              ->where('is_expire', 1)
              ->whereDate('end_date', '>=', $now);
          });
      })->orderBy('created_at')->get();
    return $cpack;
  }

  public function member_packages($client_id)
  {
    /*
->where([
    ['status', '=', '1'],
    ['subscribed', '<>', '1'],
])
    */
    $now = Carbon::now();
    $cpack = ClientPackage::with('package')->where('client_id', $client_id)->where('status', 1)
      
      ->Where(function ($query) use ($now) {
        return $query
          ->Where(
            function ($query) {
              return $query
                ->where('is_expire', 0);
            }
          )->orWhere(function ($query) use ($now) {
            return $query
              ->where('is_expire', 1)
              ->whereDate('end_date', '>=', $now);
          });
      })->orderByDesc('created_at')->get();
    return $cpack;
  }
  public function check_hidden($client_id)
  {

    $arr = [
      ['hidden_feature', '=', '1'],
    ];

    $clientpack = $this->check_available($client_id, $arr);

    $is_valid = 0;
    if ($clientpack->first()) {
      $is_valid = 1;
    }
    return $is_valid;
  }

  public function check_showimag($client_id)
  {

    $arr = [
      ['show_img', '=', '1'],
    ];

    $clientpack = $this->check_available($client_id, $arr);

    $is_valid = 0;
    if ($clientpack->first()) {
      $is_valid = 1;
    }
    return $is_valid;
  }

  public function check_edit_name($client_id)
  {

    $arr = [
      ['edit_name', '=', '1'],
    ];

    $clientpack = $this->check_available($client_id, $arr);

    $is_valid = 0;
    if ($clientpack->first()) {
      $is_valid = 1;
    }
    return $is_valid;
  }


  public function check_special_member($client_id)
  {

    $arr = [
      ['special_member', '=', '1'],
    ];

    $clientpack = $this->check_available($client_id, $arr);

    $is_valid = 0;
    if ($clientpack->first()) {
      $is_valid = 1;
    }
    return $is_valid;
  }

  public function check_search_count($client_id)
  {

    $arr = [
      ['search_count_remain', '>', '0'],
    ];

    $clientpack = $this->check_available($client_id, $arr);

    $is_valid = 0;
    if ($clientpack->first()) {
      $is_valid = $clientpack->first()->id;
    }
    return $is_valid;
  }

  public function decrease_search_count($client_package_id)
  {

    $client_package = ClientPackage::find($client_package_id);
    if ($client_package) {
      $client_package->search_count_remain--;
      $client_package->save();
    }

    return 1;
  }

  //chat

  public function check_chat_count($client_id)
  {

    $arr = [
      ['chat_count_remain', '>', '0'],
    ];

    $clientpack = $this->check_available($client_id, $arr);

    $is_valid = 0;
    if ($clientpack->first()) {
      $is_valid = $clientpack->first()->id;
    }
    return $is_valid;
  }

  public function decrease_chat_count($client_package_id)
  {
    $client_package = ClientPackage::find($client_package_id);
    if ($client_package) {
      $client_package->chat_count_remain--;
      $client_package->save();
    }
    return 1;
  }
  ///
  public function check_favorite_count($client_id)
  {

    $arr = [
      ['favorite_count_remain', '>', '0'],
    ];

    $clientpack = $this->check_available($client_id, $arr);

    $is_valid = 0;
    if ($clientpack->first()) {
      $is_valid = $clientpack->first()->id;
    }
    return $is_valid;
  }

  public function decrease_favorite_count($client_package_id)
  {
    $client_package = ClientPackage::find($client_package_id);
    if ($client_package) {
      $client_package->favorite_count_remain--;
      if($client_package->favorite_count_remain<0){
       // $client_package->favorite_count_remain==0;
      }
      $client_package->save();
    }
    return 1;
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
  public function edit($id)
  {
    $item = Package::find($id);

    //
    return view("admin.package.edit", ["item" => $item]);
  }

  /**
   * Update the specified resource in storage.
   */




  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {

    //delete user
    $item = Package::find($id);
    if (!($item === null)) {
      //delete image
      if (!is_null($item->image)) {
        $oldimagename = $item->image;
        $strgCtrlr = new StorageController();
        $path = $strgCtrlr->path['languages'];
        //   Storage::delete("public/" .$path. '/' . $oldimagename);
      }

      Package::find($id)->delete();
    }
    return redirect()->route('package.index');

  }

  public function storeImage($file, $id)
  {
    $imagemodel = Package::find($id);
    $oldimage = $imagemodel->image;
    $oldimagename = basename($oldimage);
    $strgCtrlr = new StorageController();
    $ext = $file->getClientOriginalExtension();


    $path = $strgCtrlr->path['packages'];

    if (Str::lower($ext) == 'svg') {
      if ($file !== null) {
        $ext = $file->getClientOriginalExtension();
        $filename = rand(10000, 99999) . $id . '.' . $ext;
        Storage::delete("public/" . $path . '/' . $oldimagename);
        $path = $file->storeAs($path, $filename, 'public');
        Package::find($id)->update([
          "image" => $filename
        ]);
      }
    } else {
      if ($file !== null) {

        $filename = rand(10000, 99999) . $id . ".webp";
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file);
        $image = $image->toWebp(75);
        if (!File::isDirectory(Storage::url('/' . $path))) {
          Storage::makeDirectory('public/' . $path);
        }
        $image->save(storage_path('app/public') . '/' . $path . '/' . $filename);

        Package::find($id)->update([
          "image" => $filename
        ]);
        Storage::delete("public/" . $path . '/' . $oldimagename);
      }
    }


    return 1;
  }

}
