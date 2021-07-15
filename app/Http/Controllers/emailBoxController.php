<?php

namespace App\Http\Controllers;

use App\Models\EmailBox;
use App\Models\SysInfoEmail;
use Illuminate\Http\Request;

class emailBoxController extends Controller
{
    public function index()
    {
        $pagename = "البريد ";
        $displayDetailes = 1;
//        $recordPage = "email_display";
        $tables = 'email_box';
        $noUpdateBtn = 1;
        $noDeleteBtn = 1;

        $qry = \DB::table('email_box')
//            ->join('clients','clients.cla_email','=','email_box.email_cla_name')
            ->join('sys_info_email', 'sys_info_email.sys_email_id', '=', 'email_box.sys_email_id')
            ->select('sys_info_email.sys_email AS بريد النظام', 'email_box.email_type AS نوع البريد',
                'email_cla_name AS اسم العميل', 'email_box.email_cla_email AS بريد العميل',
                'email_box.email_cla_phone AS جوال العميل', 'email_box.fakeId')
            ->get();


        $columns = ['بريد النظام', 'نوع البريد', 'اسم العميل', 'بريد العميل', 'جوال العميل', 'fakeId'];

//        $rows = \DB::table('email_box')->get();
        return view('master_tables_view', ['pagename' => $pagename])->with('rows', $qry)->with
        ('columns', $columns)->with('tables', $tables)->with('displayDetailes', $displayDetailes)->with
        ('noDeleteBtn', $noDeleteBtn)->with('noUpdateBtn', $noUpdateBtn);
    }



    public function displayDetailes($id)
    {
        // for details

        $pagename = "عرض التفاصيل";

        $tables = 'email_box';

//       $qry = \DB::table('product')
//           ->join('sub_section', 'product.sub_id', '=', 'sub_section.sub_id')
//           ->join('media_library', 'product.medl_id', '=', 'media_library.medl_id')
//           ->join('prod_avil_in', 'product.prod_id', '=', 'prod_avil_in.prod_id')
//           ->join('measure', 'prod_avil_in.mesu_id', '=', 'measure.mesu_id')
//           ->join('product_prod_avil_color AS color', 'product.prod_id', '=', 'color.prod_id')
//
//            ->select('product.prod_name AS اسم المنتج' , 'sub_section.sub_name AS القسم الفرعي', 'product.prod_price AS السعر',
//                'media_library.medl_img_ved AS الصورة','prod_avil_amount AS الكمية المتوفرة حاليًا',\DB::raw("GROUP_CONCAT(measure.mesu_value  SEPARATOR ' //  ') AS المقاسات"),
//                \DB::raw("GROUP_CONCAT(color.prod_avil_color SEPARATOR ' //  ') AS الألوان"),'product.prod_desc_img AS معلومات الصورة','product.state','product.fakeId')
//           ->where("product.fakeId","=","$id")
//           ->groupBy('اسم المنتج','القسم الفرعي','السعر','الصورة','الكمية المتوفرة حاليًا','معلومات الصورة','product.state','fakeId')
//
//           ->get();

        $currentValues = EmailBox::where("fakeId", "=", "$id")->first();
//        $measures = Measure::all();
        $currentEmaile= SysInfoEmail::find($currentValues->sys_email_id);
//        $sections = SubSection::all();
//        $productProdAvilColor = ProductProdAvilColor::all()->where("prod_id", "=", "$currentValues->prod_id");
//        $currentMeasures = ProdAvilIn::all()->where("prod_id", "=", "$currentValues->prod_id");

//        foreach($productProdAvilColor as $productProdAvilColor){
//            dd($productProdAvilColor->prod_avil_color);
//        }
//        dd($productProdAvilColor);
//      $mediaImg = MediaLibrary::all();

        $rows = \DB::table('email_box')
//            ->join('clients','clients.cla_email','=','email_box.email_cla_name')
            ->join('sys_info_email', 'sys_info_email.sys_email_id', '=', 'email_box.sys_email_id')
            ->select('sys_info_email.sys_email AS بريد النظام', 'email_box.email_type AS نوع البريد',
                'email_cla_name AS اسم العميل', 'email_box.email_cla_email AS بريد العميل',
                'email_box.email_cla_phone AS جوال العميل', 'email_box.fakeId')
            ->where("email_box.fakeId", "=", "$id")
            ->get();


        $columns = ['بريد النظام', 'نوع البريد', 'اسم العميل', 'بريد العميل', 'جوال العميل', 'fakeId'];

        return view('displayDetailes', ['tables' => $tables, 'currentValues' => $currentValues,
            'pagename' => $pagename, 'currentEmaile' => $currentEmaile,
            'columns' => $columns, 'rows' => $rows])->with('id', $id);
//
//        return view('displayDetailes', ['tables' => $tables, 'pagename' => $pagename, 'measures' => $measures, 'currentMeasures' => $currentMeasures,
//            'sections' => $sections, 'columns' => $columns, 'rows' => $rows, 'currentSections' => $currentSections,
//            'productProdAvilColor' => $productProdAvilColor])->with('currentValues', $currentValues)->with('id', $id);

    }




    public function search(Request $request)
    {
        $key = trim($request->get('search'));

        $pagename = "البريد ";
        $displayDetailes = 1;

        $tables = 'email_box';
        $noUpdateBtn = 1;
        $noDeleteBtn = 1;

        $qry = \DB::table('email_box')
//            ->join('clients','clients.cla_email','=','email_box.email_cla_name')
            ->join('sys_info_email', 'sys_info_email.sys_email_id', '=', 'email_box.sys_email_id')
            ->select('sys_info_email.sys_email AS بريد النظام', 'email_box.email_type AS نوع البريد',
                'email_cla_name AS اسم العميل', 'email_box.email_cla_email AS بريد العميل',
                'email_box.email_cla_phone AS جوال العميل', 'email_box.fakeId')
            ->Where('sys_info_email.sys_email', 'LIKE', "%{$key}%")
            ->orWhere('email_box.email_type', 'LIKE', "%{$key}%")
            ->orWhere('email_cla_name', 'LIKE', "%{$key}%")
            ->orWhere('email_box.email_cla_email', 'LIKE', "%{$key}%")
            ->orWhere('email_box.email_cla_phone', 'LIKE', "%{$key}%")
            ->get();


        $col = ['بريد النظام', 'نوع البريد', 'اسم العميل', 'بريد العميل', 'جوال العميل', 'fakeId'];

        if (isset($_GET['btnSearch']) && $qry->isEmpty()) {
            $qry = \DB::table('email_box')
//            ->join('clients','clients.cla_email','=','email_box.email_cla_name')
                ->join('sys_info_email', 'sys_info_email.sys_email_id', '=', 'email_box.sys_email_id')
                ->select('sys_info_email.sys_email AS بريد النظام', 'email_box.email_type AS نوع البريد',
                    'email_cla_name AS اسم العميل', 'email_box.email_cla_email AS بريد العميل',
                    'email_box.email_cla_phone AS جوال العميل', 'email_box.fakeId')
                ->get();


            $col = ['بريد النظام', 'نوع البريد', 'اسم العميل', 'بريد العميل', 'جوال العميل', 'fakeId'];

            $placeHolder = "لا توجد نتائج";
        } elseif (isset($_GET['btnCancel'])) {
            $qry = \DB::table('email_box')
//            ->join('clients','clients.cla_email','=','email_box.email_cla_name')
                ->join('sys_info_email', 'sys_info_email.sys_email_id', '=', 'email_box.sys_email_id')
                ->select('sys_info_email.sys_email AS بريد النظام', 'email_box.email_type AS نوع البريد',
                    'email_cla_name AS اسم العميل', 'email_box.email_cla_email AS بريد العميل',
                    'email_box.email_cla_phone AS جوال العميل', 'email_box.fakeId')
                ->get();


            $col = ['بريد النظام', 'نوع البريد', 'اسم العميل', 'بريد العميل', 'جوال العميل', 'fakeId'];

            $placeHolder = 'Search';
        } else {
            $placeHolder = 'Search';
        }

        return view('master_tables_view', ['pagename' => $pagename, 'placeHolder' => $placeHolder])->with('rows', $qry)->with
        ('columns', $col)->with('tables', $tables)->with('displayDetailes', $displayDetailes)->with
        ('key', $key)->with('noDeleteBtn', $noDeleteBtn)->with('noUpdateBtn', $noUpdateBtn);


    }

}
