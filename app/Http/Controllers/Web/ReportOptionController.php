<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReportOption;
use App\Http\Requests\ReportOption\StoreReportOptionRequest;
use Illuminate\Support\Facades\Validator;
class ReportOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $List = ReportOption::get();
        return view('admin.reportoption.show', ['List' => $List]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reportoption.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportOptionRequest $request)
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
    
      return response()->json($validator);

    } else {          
      $newObj = new ReportOption;  
 
      $newObj->content = $formdata['content'];    
      $newObj->is_active = isset ($formdata["is_active"]) ? 1 : 0;  
      $newObj->save();
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
        $item = ReportOption::find($id);
 
        //
        return view("admin.reportoption.edit", ["item" => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreReportOptionRequest $request,$id)
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
     
      //reset all to 0
 
      ReportOption::find($id)->update([
        'content' => $formdata['content'],
        'is_active' => isset ($formdata["is_active"]) ? 1 : 0,   
      ]);
  
      return response()->json("ok");
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
      //delete user
      $item = ReportOption::find($id);
      if (!( $item  === null)) {
                   //delete image        
        ReportOption::find($id)->delete();
      }
      return redirect()->route('reportoption.index');
  
    }
    //site
    public function getoptions()
    {
        $List = ReportOption::where('is_active',1)->select('id','content')->get();
        return response()->json($List);
    }

}
