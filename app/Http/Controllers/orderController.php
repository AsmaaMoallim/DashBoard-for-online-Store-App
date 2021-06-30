<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        $recordPage = "order_details";
        $formPage = "0";
        $addNew = "0";
        $showRecords = "عرض";
        $tables = 'orders';
        $columns= \DB::getSchemaBuilder()->getColumnListing('orders');
        $rows = \DB::table('orders')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    public function enableOrdisable($id)
    {
        $data = Order::find($id);
        if($data->state==false){
            $data->state=true;
            $data->save();
        }
        else{
            $data->state= false;
            $data->save();
        }
        return redirect()->back();
    }


    public function delete($id)
    {
        $data = Order::find($id);
        $data->delete();
        return redirect()->back();
    }
}
