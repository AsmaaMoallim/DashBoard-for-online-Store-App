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
        $columns= \DB::getSchemaBuilder()->getColumnListing('comments');
        $rows = \DB::table('comments')->get();
        return view('master_tables_view',['pagename' => $pagename])->with('rows',$rows)->with
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
