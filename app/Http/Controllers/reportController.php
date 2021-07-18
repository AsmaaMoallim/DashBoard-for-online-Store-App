<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function index()
    {
        $pagename = "بلاغات التعليقات";
        $tables = 'reports';
        $noUpdateBtn = 1;

        $qry = \DB::table('report')
            ->join('clients', 'clients.cla_id', '=', 'report.cla_id')
            ->join('comments', 'comments.com_id', '=', 'report.com_id')
            ->join('product','product.prod_id','=','comments.prod_id')
            ->select(\DB::raw("CONCAT(cla_frist_name,'',  cla_last_name) AS 'اسم صاحب البلاغ' "),
                'product.prod_name AS اسم المنتج', 'comments.com_content AS التعليق',
                'comments.com_rateing AS التقييم', 'ignored as state','report.report_id as fakeId' )
            ->orderby('state')
            ->get();

        $col = ['اسم صاحب البلاغ', 'اسم المنتج', 'التعليق', 'التقييم', 'fakeId'];

        return view('master_tables_view' ,['pagename' => $pagename , 'noUpdateBtn'=>$noUpdateBtn])->with('rows',$qry)->with
        ('columns', $col)->with('tables',$tables);

//
//
//        return view('master_tables_view',['pagename' => $pagename])->with('rows',$rows)->with
//        ('columns', $columns)->with('tables',$tables);
    }
    public function delete($id)
    {
        $data = Report::where("report_id","=","$id")->first();
        $data->delete();
        return redirect()->back();
    }

    public function enableordisable($id)
    {
        $data = Report::where("report_id","=","$id")->first();
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


    public function search(Request $request){
        $key = trim($request->get('search'));

        $pagename = "بلاغات التعليقات";
        $tables = 'reports';
        $noUpdateBtn = 1;

        $qry = \DB::table('report')
            ->join('clients', 'clients.cla_id', '=', 'report.cla_id')
            ->join('comments', 'comments.com_id', '=', 'report.com_id')
            ->join('product','product.prod_id','=','comments.prod_id')
            ->select(\DB::raw("CONCAT(cla_frist_name,'',  cla_last_name) AS 'اسم صاحب البلاغ' "),
                'product.prod_name AS اسم المنتج', 'comments.com_content AS التعليق',
                'comments.com_rateing AS التقييم', 'ignored as state','report.report_id as fakeId' )
            ->Where('cla_frist_name', 'LIKE', "%{$key}%")
            ->orWhere('cla_last_name', 'LIKE', "%{$key}%")
            ->orWhere('product.prod_name', 'LIKE', "%{$key}%")
            ->orWhere('comments.com_content', 'LIKE', "%{$key}%")
            ->orWhere('comments.com_rateing', 'LIKE', "%{$key}%")
            ->orderby('state')
            ->get();

        $col = ['اسم صاحب البلاغ', 'اسم المنتج', 'التعليق', 'التقييم', 'fakeId'];

        if (isset($_GET['btnSearch']) && $qry->isEmpty()){
            $qry = \DB::table('report')
                ->join('clients', 'clients.cla_id', '=', 'report.cla_id')
                ->join('comments', 'comments.com_id', '=', 'report.com_id')
                ->join('product','product.prod_id','=','comments.prod_id')
                ->select(\DB::raw("CONCAT(cla_frist_name,'',  cla_last_name) AS 'اسم صاحب البلاغ' "),
                    'product.prod_name AS اسم المنتج', 'comments.com_content AS التعليق',
                    'comments.com_rateing AS التقييم', 'ignored as state','report.report_id as fakeId' )
                ->orderby('state')
                ->get();

            $col = ['اسم صاحب البلاغ', 'اسم المنتج', 'التعليق', 'التقييم', 'fakeId'];

            $placeHolder = "لا توجد نتائج";
        } elseif (isset($_GET['btnCancel'])){
            $qry = \DB::table('report')
                ->join('clients', 'clients.cla_id', '=', 'report.cla_id')
                ->join('comments', 'comments.com_id', '=', 'report.com_id')
                ->join('product','product.prod_id','=','comments.prod_id')
                ->select(\DB::raw("CONCAT(cla_frist_name,'',  cla_last_name) AS 'اسم صاحب البلاغ' "),
                    'product.prod_name AS اسم المنتج', 'comments.com_content AS التعليق',
                    'comments.com_rateing AS التقييم', 'ignored as state','report.report_id as fakeId' )
                ->orderby('state')
                ->get();

            $col = ['اسم صاحب البلاغ', 'اسم المنتج', 'التعليق', 'التقييم', 'fakeId'];

            $placeHolder = 'Search';
        }
        else{
            $placeHolder = 'Search';
        }

        return view('master_tables_view' ,['pagename' => $pagename, 'placeHolder'=> $placeHolder])->with('rows',$qry)->with
        ('columns', $col)->with('tables',$tables)->with('key', $key);

    }
}
