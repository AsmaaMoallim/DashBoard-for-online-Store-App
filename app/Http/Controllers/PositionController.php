<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns= \DB::getSchemaBuilder()->getColumnListing('position');
        $rows = \DB::table('position')->get();
        return view('man')->with('rows',$rows)->with('columns', $columns);
    }




}
