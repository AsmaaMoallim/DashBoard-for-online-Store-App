<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class orderController extends Controller
{
    public function index()
    {
        $pagename = "الطلبات";
        $recordPage = "order_details";
        $showRecords = "عرض";
        $tables = 'orders';

        $qry = \DB::table('orders')

            ->join('clients', 'clients.cla_id', '=', 'orders.cla_id')
            ->join('ord_has_item_of', 'ord_has_item_of.ord_id', '=', 'orders.ord_id')
            ->join('stage', 'stage.stage_id', '=', 'orders.stage_id')
            ->join('product', 'product.prod_id', '=', 'ord_has_item_of.prod_id')

            ->select ("orders.ord_number AS رقم الطلب", \DB::raw("CONCAT(clients.cla_frist_name, ' ',  clients.cla_last_name) AS  'اسم العميل'"),
                'orders.ord_date AS تاريخ الطلب',
                \DB::raw('sum(ord_has_item_of.prod_ord_amount * product.prod_price) AS "اجمالي تكلفة الطلب"'),'stage.stage_name AS حالة الطلب',
                    'orders.state','orders.fakeId')
                ->groupBy('ord_has_item_of.prod_ord_amount','orders.ord_number'
                    ,'clients.cla_frist_name','clients.cla_last_name','orders.ord_date',
                'ord_has_item_of.prod_ord_amount','product.prod_price','orders.state'
                ,'orders.fakeId','stage.stage_name')
            ->get();

//        $t = \DB::table('product')
//            ->join('ord_has_item_of','ord_has_item_of.prod_id','=','product.prod_id')
//            ->select(DB::raw('sum(ord_has_item_of.prod_ord_amount * product.prod_price) AS اجمالي'))
//            ->groupBy('ord_has_item_of.prod_ord_amount')
//            ->get();

        $columns = ['رقم الطلب','اسم العميل','تاريخ الطلب','اجمالي تكلفة الطلب','fakeId'];

        return view('master_tables_view',['pagename' => $pagename])->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables)->with
        ('showRecords',$showRecords)->with('recordPage',$recordPage);
    }

    public function display(){

        $pagename = "عرض التفاصيل";

        $tables = 'product';
        $qry = \DB::table('product')

            ->join('product_prod_avil_color','product_prod_avil_color.prod_id','=','product.prod_id')
            ->join('prod_avil_in','prod_avil_in.prod_id','=','product.prod_id')
            ->join('measure','measure.mesu_id','=','prod_avil_in.mesu_id')
            ->join('ord_has_item_of','ord_has_item_of.prod_id','=','product.prod_id')
            ->select('product.prod_name AS اسم المنتج','product_prod_avil_color.prod_avil_color AS اللون',
                'measure.mesu_value AS المقاس',\DB::raw("sum(ord_has_item_of.prod_ord_amount) AS الكمية"),
                'product.prod_price AS السعر','product.fakeId')
            ->groupBy('اسم المنتج','اللون','المقاس','السعر','fakeId')
            ->get();

        $columns=['اسم المنتج','اللون','المقاس','الكمية','السعر','fakeId'];

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
