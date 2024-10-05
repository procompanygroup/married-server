<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Order;
use App\Http\Controllers\Web\ClientPackageController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{

  /**
   * Display a listing of the resource.
   */
  //admin
  public function index()
  {
    $List = Order::orderByDesc('created_at')->with('client', 'package', 'user')->get();

    return view('admin.order.show', ['List' => $List]);
  }



  public function add_order($client_id, $package_id, $payment_method, $amount)
  {

    $newObj = new Order();
    $newObj->client_id = $client_id;
    $newObj->package_id = $package_id;
    $newObj->status = 'sent';
    // $newObj->confirm_date = $formdata['confirm_date'];
    //$newObj->trans_num = $formdata['trans_num'];
    //$newObj->user_id = $formdata['user_id'];
    //  $newObj->notes = $formdata['notes'];
    $newObj->payment_method = $payment_method;
    $newObj->amount = $amount;
    $newObj->save();
    return $newObj->id;
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
    $item = Order::with('client', 'package', 'user')->find($id);

    //
    return view("admin.order.edit", ["item" => $item]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    $formdata = $request->all();
    if (isset($formdata['trans_num'])) {
      if ($formdata['trans_num'] != '') {
        DB::transaction(function () use ($formdata, $id) {
          $order = Order::find($id);
          $order->trans_num = $formdata['trans_num'];
          $order->status = 'confirm';
          $order->save();
          //add the pack client record
          $clientpckg = new ClientPackageController();
          //ccheck if exist to prevent renew start date
          if( !$clientpckg->check_exist_order($order->id)){
            $clientpckg->add($order->client_id, $order->package_id, $order->id);
          }
          
        });
        return response()->json('ok');
      }

    }
    return response()->json('required');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {

    //delete user
    $item = Order::find($id);
    if (!($item === null)) {
      //delete image


      Order::find($id)->delete();
    }
    return redirect()->route('order.index');

  }



}
