<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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
class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $List = Package::get();
        return view('admin.package.show', ['List' => $List]);
    }

    public function create()
    {
        return view('admin.package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackageRequest $request)
    {
        $formdata = $request->all();
   // return  $formdata;
    // return redirect()->back()->with('success_message', $formdata);
    $validator = Validator::make(
      $formdata,
      $request->rules(),
      $request->messages()
    );

    if ($validator->fails()) {
      /*
                           return  redirect()->back()->withErrors($validator)
                           ->withInput();
                           */
      // return response()->withErrors($validator)->json();
      return response()->json($validator);

    } else {
          
      $newObj = new Package();
           //reset all to 0
           $newObj->name = $formdata['name'];
           $newObj->code = $formdata['code'];
           $newObj->chat_count = $formdata['chat_count'];
           $newObj->search_count = $formdata['search_count'];
           $newObj->favorite_count = $formdata['favorite_count'];
           $newObj->hidden_feature =  isset ($formdata["hidden_feature"]) ? 1 : 0;  
           $newObj->show_img =isset ($formdata["show_img"]) ? 1 : 0;  
           $newObj->special_member =isset ($formdata["special_member"]) ? 1 : 0;  
           $newObj->edit_name = isset ($formdata["edit_name"]) ? 1 : 0;           
           $newObj->expire_duration = $formdata['expire_duration'];
           $newObj->is_expire = isset ($formdata["is_expire"]) ? 1 : 0;   
           $newObj->is_active = isset ($formdata["is_active"]) ? 1 : 0;  
           $newObj->price = $formdata['price'];
 
      $newObj->save();
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        // $filename= $file->getClientOriginalName();                
        $this->storeImage($file, $newObj->id);
      }  

      return response()->json("ok");
    }
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
    public function update(UpdatePackageRequest $request,$id)
    {
        $formdata = $request->all();
    $validator = Validator::make(
      $formdata,
      $request->rules(),
      $request->messages()
    );
    if ($validator->fails()) {

      return response()->json($validator);

    } else {
 
 
 
      Package::find($id)->update([
        //'user_name'=>$formdata['user_name'],
     'name' => $formdata['name'],
'code' => $formdata['code'],
'chat_count' => $formdata['chat_count'],
'search_count' => $formdata['search_count'],
'favorite_count' => $formdata['favorite_count'],
'hidden_feature' =>isset ($formdata["hidden_feature"]) ? 1 : 0 ,
'show_img' => isset ($formdata["show_img"]) ? 1 : 0,
'special_member' => isset ($formdata["special_member"]) ? 1 : 0,
'edit_name' =>isset ($formdata["edit_name"]) ? 1 : 0,
'expire_duration' => $formdata['expire_duration'],
'is_expire' => isset ($formdata["is_expire"]) ? 1 : 0,
'price' => $formdata['price'],
'is_active' => isset ($formdata["is_active"]) ? 1 : 0, 
      ]);
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        // $filename= $file->getClientOriginalName();                
        $this->storeImage($file, $id);
      }  
      return response()->json("ok");
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    
      //delete user
      $item = Package::find($id);
      if (!( $item  === null)) {
           //delete image
        if(!is_null($item ->image)){
          $oldimagename =  $item ->image;
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
