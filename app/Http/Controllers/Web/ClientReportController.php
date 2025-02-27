<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientReport;
use App\Models\ReportOption;
use App\Http\Requests\Report\StoreReportRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class ClientReportController extends Controller
{
    public function index()
    {
        $List = ClientReport::get();
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
    public function store(StoreReportRequest $request)
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
      $report_to_client_id = $formdata['member_id'];
      $report_option_id=$formdata['report-sel'] ;
      $auth_id = Auth::guard('client')->user()->id;
   // $repObj=  ClientReport::where('sender_id', $auth_id)->where('report_to_client_id', $report_to_client_id)->first();
  
   $op=ReportOption::find($report_option_id);
   ClientReport::updateOrCreate(
                ['sender_id' => $auth_id, 'report_to_client_id' => $report_to_client_id],
                ['is_report' => 1,'reason'=> $op->content,'report_option_id'=>$report_option_id]
            );
   
    // if ($repObj) {     
    // //   $repObj->sender_id =  $auth_id; 
    // //   $repObj->report_to_client_id = $report_to_client_id;  
    //   $repObj->is_report = 1;           
    //   $repObj->reason = $op->content;
    //   $repObj->report_option_id = $report_option_id;  
    //   $repObj->save();
        
    // }else{
    //     $repObj=new ClientReport();

    //     $repObj->sender_id =  $auth_id; 
    //     $repObj->report_to_client_id = $report_to_client_id;  
    //     $repObj->is_report = 1;             
    //     $repObj->reason = $op->content;
    //     $repObj->report_option_id =$report_option_id;  
    //     $repObj->save();

    // }
    return response()->json(1);
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
        $item = ClientReport::find($id);
 
        //
        return view("admin.reportoption.edit", ["item" => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreReportRequest $request,$id)
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
 
      ClientReport::find($id)->update([
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
      $item = ClientReport::find($id);
      if (!( $item  === null)) {
                   //delete image        
        ClientReport::find($id)->delete();
      }
      return redirect()->route('reportoption.index');
  
    }
}
