<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function index()
    {
        $pagename = "التعليقات";

        $recordPage = "comment_reports";

        $showRecords = "عرض إبلاغات التعليقات";
        $tables = 'comments';

        $qry = \DB::table('comments')

            ->join('product', 'product.prod_id', ' = ', 'comments.prod_id')
            ->join('clients', 'clients.cla_id', ' = ', 'comments.cla_id')

//            ->join('comments', 'comments.prod_id', ' = ', 'product.prod_id')
//            ->join('clients', 'clients.cla_id', ' = ', 'comments.cla_id')

            ->select(\DB::raw("CONCAT(clients.cla_frist_name,' ',clients.cla_last_name AS الاسم"),
                'product.prod_name AS المنتج','comments.com_rateing AS التقييم',
                'comments.com_content AS التعليق','product.fakeId')

            ->get();

        $columns = ['الاسم','اسم المنتج','التقييم','التعليق','fakeId'];

        return view('master_tables_view',['pagename' => $pagename])->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables)->with
        ('showRecords',$showRecords)->with('recordPage',$recordPage);
    }

    public function enableOrdisable($id)
    {
        $data = Comment::where("fakeId","=","$id")->first();;
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
