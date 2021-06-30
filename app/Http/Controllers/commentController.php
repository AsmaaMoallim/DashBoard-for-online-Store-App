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
        $columns= \DB::getSchemaBuilder()->getColumnListing('comments');
        $rows = \DB::table('comments')->get();
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
