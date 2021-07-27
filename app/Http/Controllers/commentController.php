<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Comments;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function index(Comment $comment)
    {
        $this->authorize('view', $comment);

        $pagename = "التعليقات";

        $recordPage = "comment_reports";

        $showRecords = "عرض إبلاغات التعليقات";
        $noUpdateBtn = 1;

        $tables = 'comments';

        $qry = \DB::table('comments')
            ->join('product','product.prod_id','=','comments.prod_id')
            ->join('clients','clients.cla_id','=','comments.cla_id')
            ->select('product.prod_name AS اسم المنتج',
                \DB::raw("CONCAT(cla_frist_name,'',  cla_last_name) AS 'اسم العميل' "),
                'comments.com_content AS التعليق','comments.com_rateing AS التقييم',
                'comments.fakeId')
            ->get();

//            ->join('product', 'product.prod_id', ' = ', 'comments.prod_id')
//            ->join('clients', 'clients.cla_id', ' = ', 'comments.cla_id')

//            ->join('comments', 'comments.prod_id', ' = ', 'product.prod_id')
//            ->join('clients', 'clients.cla_id', ' = ', 'comments.cla_id')
//
//            ->select(\DB::raw("CONCAT(clients.cla_frist_name,' ',clients.cla_last_name AS الاسم"),
//                'product.prod_name AS المنتج','comments.com_rateing AS التقييم',
////                'comments.com_content AS التعليق','product.fakeId')
//
//            ->get();

        $columns = ['اسم المنتج','اسم العميل','التعليق','التقييم','fakeId'];

        return view('master_tables_view',['pagename' => $pagename])->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables)->with('noUpdateBtn', $noUpdateBtn)->with
        ('showRecords',$showRecords)->with('recordPage',$recordPage);
    }

    public function delete($id,Comment $comment)
    {
        $this->authorize('view', $comment);

        Comment::where("fakeId","=","$id")->delete();
        return redirect()->back();
    }

//    public function enableOrdisable($id)
//    {
//        $data = Comments::where("fakeId","=","$id")->first();;
//        if($data->state==false){
//            $data->state=true;
//            $data->save();
//        }
//        else{
//            $data->state= false;
//            $data->save();
//        }
//        return redirect()->back();
//    }


    public function search(Request $request,Comment $comment){
        $this->authorize('view', $comment);

        $key = trim($request->get('search'));

        $pagename = "التعليقات";

        $recordPage = "comment_reports";

        $showRecords = "عرض إبلاغات التعليقات";
        $noUpdateBtn = 1;

        $tables = 'comments';

        $qry = \DB::table('comments')
            ->join('product','product.prod_id','=','comments.prod_id')
            ->join('clients','clients.cla_id','=','comments.cla_id')
            ->select('product.prod_name AS اسم المنتج',
                \DB::raw("CONCAT(cla_frist_name,'',  cla_last_name) AS 'اسم العميل' "),
                'comments.com_content AS التعليق','comments.com_rateing AS التقييم',
                'comments.fakeId')
            ->Where('product.prod_name', 'LIKE', "%{$key}%")
            ->orWhere('cla_frist_name', 'LIKE', "%{$key}%")
            ->orWhere('cla_last_name', 'LIKE', "%{$key}%")
            ->orWhere('comments.com_content', 'LIKE', "%{$key}%")
            ->orWhere('comments.com_rateing', 'LIKE', "%{$key}%")
            ->get();

        $col = ['اسم المنتج','اسم العميل','التعليق','التقييم','fakeId'];


        if (isset($_GET['btnSearch']) && $qry->isEmpty()){
            $qry = \DB::table('comments')
                ->join('product','product.prod_id','=','comments.prod_id')
                ->join('clients','clients.cla_id','=','comments.cla_id')
                ->select('product.prod_name AS اسم المنتج',
                    \DB::raw("CONCAT(cla_frist_name,'',  cla_last_name) AS 'اسم العميل' "),
                    'comments.com_content AS التعليق','comments.com_rateing AS التقييم',
                    'comments.fakeId')
                ->get();

            $col = ['اسم المنتج','اسم العميل','التعليق','التقييم','fakeId'];

            $placeHolder = "لا توجد نتائج";
        } elseif (isset($_GET['btnCancel'])){
            $qry = \DB::table('comments')
                ->join('product','product.prod_id','=','comments.prod_id')
                ->join('clients','clients.cla_id','=','comments.cla_id')
                ->select('product.prod_name AS اسم المنتج',
                    \DB::raw("CONCAT(cla_frist_name,'',  cla_last_name) AS 'اسم العميل' "),
                    'comments.com_content AS التعليق','comments.com_rateing AS التقييم',
                    'comments.fakeId')
                ->get();

            $col = ['اسم المنتج','اسم العميل','التعليق','التقييم','fakeId'];

            $placeHolder = 'Search';
        }
        else{
            $placeHolder = 'Search';
        }

        return view('master_tables_view' ,['pagename' => $pagename, 'placeHolder'=> $placeHolder])->with('rows',$qry)->with
        ('columns', $col)->with('tables',$tables)->with('noUpdateBtn', $noUpdateBtn)->with
        ('showRecords',$showRecords)->with('recordPage',$recordPage)->with('key', $key);

    }

}
