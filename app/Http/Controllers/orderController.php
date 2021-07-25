<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Stage;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class orderController extends Controller
{
    public function index()
    {
        $pagename = "الطلبات";
        $recordPage = "order_details";
        $tables = 'orders';
        $displayDetailes = 1;

        $qry = \DB::table('orders')
            ->join('clients', 'clients.cla_id', '=', 'orders.cla_id')
            ->join('ord_has_item_of', 'ord_has_item_of.ord_id', '=', 'orders.ord_id')
            ->join('stage', 'stage.stage_id', '=', 'orders.stage_id')
            ->join('product', 'product.prod_id', '=', 'ord_has_item_of.prod_id')
            ->select("orders.ord_number AS رقم الطلب", \DB::raw("CONCAT(clients.cla_frist_name, ' ',  clients.cla_last_name) AS  'اسم العميل'"),
                'orders.ord_date AS تاريخ الطلب',
                \DB::raw('sum(ord_has_item_of.prod_ord_amount * product.prod_price) AS "اجمالي تكلفة الطلب"'), 'stage.stage_name AS حالة الطلب',
                'orders.state', 'orders.fakeId')
            ->groupBy('ord_has_item_of.prod_ord_amount', 'orders.ord_number'
                , 'clients.cla_frist_name', 'clients.cla_last_name', 'orders.ord_date',
                'ord_has_item_of.prod_ord_amount', 'product.prod_price', 'orders.state'
                , 'orders.fakeId', 'stage.stage_name')
            ->get();

//        $t = \DB::table('product')
//            ->join('ord_has_item_of','ord_has_item_of.prod_id','=','product.prod_id')
//            ->select(DB::raw('sum(ord_has_item_of.prod_ord_amount * product.prod_price) AS اجمالي'))
//            ->groupBy('ord_has_item_of.prod_ord_amount')
//            ->get();

        $columns = ['رقم الطلب', 'اسم العميل', 'تاريخ الطلب', 'اجمالي تكلفة الطلب', 'fakeId'];

        return view('master_tables_view', ['pagename' => $pagename, 'displayDetailes' => $displayDetailes])->with('rows', $qry)->with
        ('columns', $columns)->with('tables', $tables)->with('recordPage', $recordPage);
    }

//    public function display(){
//
//        $pagename = "عرض التفاصيل";
//
//        $tables = 'product';
//        $qry = \DB::table('product')
//
//            ->join('product_prod_avil_color','product_prod_avil_color.prod_id','=','product.prod_id')
//            ->join('prod_avil_in','prod_avil_in.prod_id','=','product.prod_id')
//            ->join('measure','measure.mesu_id','=','prod_avil_in.mesu_id')
//            ->join('ord_has_item_of','ord_has_item_of.prod_id','=','product.prod_id')
//            ->select('product.prod_name AS اسم المنتج','product_prod_avil_color.prod_avil_color AS اللون',
//                'measure.mesu_value AS المقاس',\DB::raw("sum(ord_has_item_of.prod_ord_amount) AS الكمية"),
//                'product.prod_price AS السعر','product.fakeId')
//            ->groupBy('اسم المنتج','اللون','المقاس','السعر','fakeId')
//            ->get();
//
//        $columns=['اسم المنتج','اللون','المقاس','الكمية','السعر','fakeId'];
//
//        return view('master_tables_view',['pagename' => $pagename])->with('rows',$qry)->with
//        ('columns', $columns)->with('tables',$tables);
//    }

    public function enableOrdisable($id)
    {
        $data = Order::where("fakeId", "=", "$id")->first();;
        if ($data->state == false) {
            $data->state = true;
            $data->save();
        } else {
            $data->state = false;
            $data->save();
        }
        return redirect()->back();
    }


    public function delete($id)
    {
        $data = Order::where("fakeId", "=", "$id")->first();;
        $data->delete();
        return redirect()->back();
    }
    public function update(Request $request, Order $order,$id)
    {
        $currentValues = Order::where("fakeId","=","$id")->first();
        $CurrentStage = Stage::find($currentValues->stage_id);
        $stages = Stage::all();
        return view('update-order-stage-form')->with('CurrentStage' , $CurrentStage)
            ->with('id', $id)->with('stages',$stages);
    }


    public function store_update(Request $request, $id){
        $data = Order::where("fakeId","=","$id")->first();
//        $Stage = Stage::find($request->stage_name);
//        dd($request->stage_id);
//        stage_name
        $data->update($request->all());
        return redirect('/orders');
    }

    public function search(Request $request)
    {
        $key = trim($request->get('search'));


        $pagename = "الطلبات";
        $recordPage = "order_details";
        $tables = 'orders';
        $displayDetailes = 1;

        $qry = \DB::table('orders')
            ->join('clients', 'clients.cla_id', '=', 'orders.cla_id')
            ->join('ord_has_item_of', 'ord_has_item_of.ord_id', '=', 'orders.ord_id')
            ->join('stage', 'stage.stage_id', '=', 'orders.stage_id')
            ->join('product', 'product.prod_id', '=', 'ord_has_item_of.prod_id')
            ->select("orders.ord_number AS رقم الطلب", \DB::raw("CONCAT(clients.cla_frist_name, ' ',  clients.cla_last_name) AS  'اسم العميل'"),
                'orders.ord_date AS تاريخ الطلب',
                \DB::raw('sum(ord_has_item_of.prod_ord_amount * product.prod_price) AS "اجمالي تكلفة الطلب"'), 'stage.stage_name AS حالة الطلب',
                'orders.state', 'orders.fakeId')
            ->Where('orders.ord_number', 'LIKE', "%{$key}%")
            ->orWhere('clients.cla_frist_name', 'LIKE', "%{$key}%")
            ->orWhere('clients.cla_last_name', 'LIKE', "%{$key}%")
//            ->orWhere('ord_has_item_of.prod_ord_amount', 'LIKE', "%{$key}%")
//            ->orWhere(\DB::raw('sum(ord_has_item_of.prod_ord_amount * product.prod_price)'), 'LIKE', "%{$key}%")
            ->orWhere('stage.stage_name', 'LIKE', "%{$key}%")
            ->groupBy('ord_has_item_of.prod_ord_amount', 'orders.ord_number'
                , 'clients.cla_frist_name', 'clients.cla_last_name', 'orders.ord_date',
                'ord_has_item_of.prod_ord_amount', 'product.prod_price', 'orders.state'
                , 'orders.fakeId', 'stage.stage_name')
            ->get();

        $col = ['رقم الطلب', 'اسم العميل', 'تاريخ الطلب', 'اجمالي تكلفة الطلب', 'fakeId'];


        if (isset($_GET['btnSearch']) && $qry->isEmpty()) {
            $qry = \DB::table('orders')
                ->join('clients', 'clients.cla_id', '=', 'orders.cla_id')
                ->join('ord_has_item_of', 'ord_has_item_of.ord_id', '=', 'orders.ord_id')
                ->join('stage', 'stage.stage_id', '=', 'orders.stage_id')
                ->join('product', 'product.prod_id', '=', 'ord_has_item_of.prod_id')
                ->select("orders.ord_number AS رقم الطلب", \DB::raw("CONCAT(clients.cla_frist_name, ' ',  clients.cla_last_name) AS  'اسم العميل'"),
                    'orders.ord_date AS تاريخ الطلب',
                    \DB::raw('sum(ord_has_item_of.prod_ord_amount * product.prod_price) AS "اجمالي تكلفة الطلب"'), 'stage.stage_name AS حالة الطلب',
                    'orders.state', 'orders.fakeId')
                ->groupBy('ord_has_item_of.prod_ord_amount', 'orders.ord_number'
                    , 'clients.cla_frist_name', 'clients.cla_last_name', 'orders.ord_date',
                    'ord_has_item_of.prod_ord_amount', 'product.prod_price', 'orders.state'
                    , 'orders.fakeId', 'stage.stage_name')
                ->get();

            $col = ['رقم الطلب', 'اسم العميل', 'تاريخ الطلب', 'اجمالي تكلفة الطلب', 'fakeId'];

            $placeHolder = "لا توجد نتائج";
        } elseif (isset($_GET['btnCancel'])) {
            $qry = \DB::table('orders')
                ->join('clients', 'clients.cla_id', '=', 'orders.cla_id')
                ->join('ord_has_item_of', 'ord_has_item_of.ord_id', '=', 'orders.ord_id')
                ->join('stage', 'stage.stage_id', '=', 'orders.stage_id')
                ->join('product', 'product.prod_id', '=', 'ord_has_item_of.prod_id')
                ->select("orders.ord_number AS رقم الطلب", \DB::raw("CONCAT(clients.cla_frist_name, ' ',  clients.cla_last_name) AS  'اسم العميل'"),
                    'orders.ord_date AS تاريخ الطلب',
                    \DB::raw('sum(ord_has_item_of.prod_ord_amount * product.prod_price) AS "اجمالي تكلفة الطلب"'), 'stage.stage_name AS حالة الطلب',
                    'orders.state', 'orders.fakeId')
                ->groupBy('ord_has_item_of.prod_ord_amount', 'orders.ord_number'
                    , 'clients.cla_frist_name', 'clients.cla_last_name', 'orders.ord_date',
                    'ord_has_item_of.prod_ord_amount', 'product.prod_price', 'orders.state'
                    , 'orders.fakeId', 'stage.stage_name')
                ->get();

            $col = ['رقم الطلب', 'اسم العميل', 'تاريخ الطلب', 'اجمالي تكلفة الطلب', 'fakeId'];

            $placeHolder = 'Search';
        } else {
            $placeHolder = 'Search';
        }

        return view('master_tables_view', ['pagename' => $pagename, 'placeHolder' => $placeHolder])->with('rows', $qry)->with
        ('columns', $col)->with('tables', $tables)->with('displayDetailes', $displayDetailes)->with
        ('recordPage', $recordPage)->with('key', $key);

    }

    public function displayDetailes($id)
    {
        // for details

        $pagename = "عرض التفاصيل";

        $tables = 'orders';
//
        $currentValues = Order::where("fakeId", "=", "$id")->first();
//        $measures = Measure::all();
        $currentClient = Client::find($currentValues->cla_id);
        $currentPaymentMethod = PaymentMethod::find($currentValues->payment_method_id);
        $currentOrdStage = Stage::find($currentValues->stage_id);
//        $sections = SubSection::all();
//        $productProdAvilColor = ProductProdAvilColor::all()->where("prod_id", "=", "$currentValues->prod_id");
//        $currentMeasures = ProdAvilIn::all()->where("prod_id", "=", "$currentValues->prod_id");

//        $rows = \DB::table('product')
//            ->join('sub_section', 'product.sub_id', '=', 'sub_section.sub_id')
//            ->join('media_library', 'product.medl_id', '=', 'media_library.medl_id')
//            ->join('prod_avil_in', 'product.prod_id', '=', 'prod_avil_in.prod_id')
//            ->join('measure', 'prod_avil_in.mesu_id', '=', 'measure.mesu_id')
//            ->join('product_prod_avil_color AS color', 'product.prod_id', '=', 'color.prod_id')
//            ->select('product.prod_name AS اسم المنتج', 'sub_section.sub_name AS القسم الفرعي', 'product.prod_price AS السعر',
//                'media_library.medl_img_ved AS الصورة', 'prod_avil_amount AS الكمية المتوفرة حاليًا', 'measure.mesu_value AS المقاسات',
//                'color.prod_avil_color AS الألوان', 'product.prod_desc_img AS معلومات الصورة', 'product.state', 'product.fakeId')
//            ->where("product.fakeId", "=", "$id")
//            ->get();
//        $rows = \DB::table('product')
//            ->join('sub_section', 'product.sub_id', '=', 'sub_section.sub_id')
//            ->join('prod_has_media', 'prod_has_media.prod_id' , 'product.prod_id')
//            ->join('media_library', 'prod_has_media.medl_id', '=', 'media_library.medl_id')
//            ->join('prod_avil_in', 'product.prod_id', '=', 'prod_avil_in.prod_id')
//            ->join('measure', 'prod_avil_in.mesu_id', '=', 'measure.mesu_id')
//            ->join('product_prod_avil_color AS color', 'product.prod_id', '=', 'color.prod_id')
//            ->select('product.prod_name AS اسم المنتج', 'sub_section.sub_name AS القسم الفرعي', 'product.prod_price AS السعر',
//                'media_library.medl_id AS الصورة', 'prod_avil_amount AS الكمية المتوفرة حاليًا', 'measure.mesu_value AS المقاسات',
//                'color.prod_avil_color AS الألوان', 'product.prod_desc_img AS معلومات الصورة', 'product.state', 'product.fakeId')
//            ->where("product.fakeId", "=", "$id")
//            ->groupby('اسم المنتج', 'القسم الفرعي', 'السعر','الكمية المتوفرة حاليًا','المقاسات',)
//            ->get();
//        dd($rows);

        $rows = \DB::table('orders')
            ->join('ord_has_item_of', 'orders.ord_id' , 'ord_has_item_of.ord_id')
            ->join('product', 'ord_has_item_of.prod_id', '=', 'product.prod_id')
            ->join('product_prod_avil_color AS color', 'product.prod_id', '=', 'color.prod_id')
            ->join('prod_avil_in', 'product.prod_id', '=', 'prod_avil_in.prod_id')
            ->join('measure', 'prod_avil_in.mesu_id', '=', 'measure.mesu_id')
            ->select('product.prod_name AS اسم المنتج', 'color.prod_avil_color AS الألوان','measure.mesu_value AS المقاسات',
                'ord_has_item_of.prod_ord_amount AS الكمية','product.prod_price AS السعر')
            ->where("orders.fakeId", "=", "$id")
            ->groupby('اسم المنتج',  'الألوان' ,'المقاسات', 'الكمية',  'السعر')

            ->get();
        $columns = ['اسم المنتج', 'الألوان','المقاسات', 'الكمية',  'السعر', 'fakeId'];

//        dd($rows);
//        $rows = \DB::table('product')
//            ->join('prod_has_media', 'prod_has_media.prod_id' , 'product.prod_id')
//            ->join('media_library', 'prod_has_media.medl_id', '=', 'media_library.medl_id')
//            ->select('product.prod_name', 'media_library.medl_id')
//            ->where("product.fakeId", "=", "$id")
//            ->groupby('product.prod_name','media_library.medl_id')
//            ->get();
////        dd($rows);
//        $columns = ['اسم المنتج', 'القسم الفرعي', 'السعر', 'الصورة', 'الكمية المتوفرة حاليًا', 'المقاسات', 'الألوان', 'معلومات الصورة', 'fakeId'];

        return view('displayDetailes', ['tables' => $tables, 'pagename' => $pagename,
            'currentValues' => $currentValues, 'currentClient' => $currentClient,
            'currentPaymentMethod' => $currentPaymentMethod, 'currentOrdStage' => $currentOrdStage])
            ->with('id', $id)->with('productsInfo', $rows)->with('columns',$columns);
    }


}
