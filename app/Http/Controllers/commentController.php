<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function index()
    {
        $recordPage = "comment_reports";
        $formPage = "0";
        $addNew = "0";
        $showRecords = "عرض إبلاغات التعليقات";
        $tables = 'comments';

//        SELECT CONCAT(`cla_frist_name`, '  ', `cla_last_name`) AS "الاسم", `prod_name` AS "اسم المنتج", `com_rateing` AS "التقييم", `com_content` AS "التعليق"
//        FROM `clients`
//        JOIN `product`
//        JOIN `comments`
//        ON `comments`.`cla_id` = `clients`.`cla_id`
//        AND `comments`.`prod_id` = `product`.`prod_id`

        $columns= \DB::getSchemaBuilder()->getColumnListing('comments');
        $rows = \DB::table('comments')->get();

//        $qry = \DB::table('clients')
//            ->join('product','comments.prod_id','=','product.prod_id')
//            ->join('comments','comments.cla_id','=','clients.cla_id')
//
//            ->select(\DB::raw("CONCAT(clients.cla_frist_name, '  ',clients.cla_last_name) AS الاسم", 'comments.prod_name AS اسم المنتج'),
//                'comments.com_rateing AS التقييم','comments.com_content AS التعليق','clients.fakeId')
//            ->get();
//
//        $columns = ['الاسم','اسم المنتج','التقييم','التعليق','fakeId'];

        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    public function enableOrdisable($id)
    {
        $data = Comment::find($id);
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
}
