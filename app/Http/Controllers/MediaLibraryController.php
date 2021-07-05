<?php

namespace App\Http\Controllers;

use App\Models\MediaLibrary;
use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MediaLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordPage = "0";
        $formPage = "new-mediaLibrary-form";
        $addNew = "إضافة صورة/فيديو جديد";
        $showRecords = "0";
        //these var does not in compo
        $tables = 'media_library';
        $columns= \DB::getSchemaBuilder()->getColumnListing('media_library');
        $rows = \DB::table('media_library')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    public function insertData(){
        return view('new-mediaLibrary-form');
    }

    public function enableordisable($id)
    {
        $data = MediaLibrary::find($id);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    function store(Request $request)
    {
        $media_library = new MediaLibrary();
        $media_library->medl_id=90;
        $media_library->medl_name = $request->medl_name;
        $media_library->medl_description = $request->medl_description;
        $media_library->medl_img_ved = $request->medl_img_ved;
        $media_library->state = 1;
        $media_library->fakeId =1;
        $media_library->save();
        return redirect('/manager');
    }

    public function show(MediaLibrary $mediaLibrary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaLibrary  $mediaLibrary
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaLibrary $mediaLibrary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MediaLibrary  $mediaLibrary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaLibrary $mediaLibrary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaLibrary  $mediaLibrary
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaLibrary $mediaLibrary)
    {
        //
    }
}
