<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        $pagename = "الطلبات";
        $recordPage = "order_details";
        $showRecords = "عرض";
        $tables = 'orders';
        $qry = \DB::table('orders')
            ->join('clients', 'orders.cla_id','=','clients.cla_id')
            ->join('stage','orders.stage_id','=','stage.stage_id')
            ->join('ord_has_item_of','orders.ord_id','=','ord_has_item_of.ord_id')
            ->join('product','product.prod_id','=','ord_has_item_of.prod_id')
            ->select('orders.ord_number AS رقم الطلب')
            ->select(\DB::raw("CONCAT(orders.cla_frist_name, ' ' ,orders.cla_last_name) AS الأسم"))
            ->select('orders.ord_date AS تاريخ الطلب')
            ->select(\DB::raw("(SUM(ord_has_item_of.prod_ord_amount) * product.prod_price ) AS إجمالي تكلفة الطلب"))
            ->select('stage_name AS حالة الطلب','orders.state','orders.fakeId')
            ->get();

        $columns = ['رقم الطلب','الأسم','تاريخ الطلب','إجمالي تكلفة الطلب','حالة الطلب','fakeId'];

        return view('master_tables_view',['pagename' => $pagename])->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables)->with
        ('showRecords',$showRecords)->with('recordPage',$recordPage);
    }

    public function display(){

        $pagename = "عرض التفاصيل";

        $tables = 'product';
        $qry = \DB::table('product')
            ->join('ord_has_item_of','product.prod_id','=','ord_has_item_of.prod_id')
            ->join('orders','orders.ord_id','=','ord_has_item_of.ord_id')
            ->select(\DB::raw("SUM(prod_ord_amount) AS الكمية"),'product.fakeId')
            ->get();
        $columns=['الكمية','fakeId'];

        return view('master_tables_view',['pagename' => $pagename])->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables);
    }


    public function enableOrdisable($id)
    {
        $data = Order::where("fakeId","=","$id")->first();;
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
        $data = Order::where("fakeId","=","$id")->first();;
        $data->delete();
        return redirect()->back();
    }
}
