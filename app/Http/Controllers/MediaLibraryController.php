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
        $columns = \DB::getSchemaBuilder()->getColumnListing('media_library');
        $rows = \DB::table('media_library')->get();
        return view('master_tables_view')->with('rows', $rows)->with
        ('columns', $columns)->with('tables', $tables)->with('addNew', $addNew)->with
        ('showRecords', $showRecords)->with('formPage', $formPage)->with('recordPage', $recordPage);
    }

    public function insertData()
    {
        return view('new-mediaLibrary-form');
    }

    public function enableordisable($id)
    {
        $data = MediaLibrary::find($id);
        if ($data->state == false) {
            $data->state = true;
            $data->save();
        } else {
            $data->state = false;
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
        $media_library->medl_name = $request->medl_name;
        $media_library->medl_description = $request->medl_description;
        $media_library->medl_img_ved = $request->medl_img_ved;
        $max = MediaLibrary::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max->fakeId + 1;
        $media_library->fakeId = $maxFakeId;
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
     * @param \App\Models\MediaLibrary $mediaLibrary
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaLibrary $mediaLibrary)
    {
        //
    }

    public function update(Request $request, MediaLibrary $mediaLibrary, $id)
    {
        $currentValues = MediaLibrary::find($id);

        return view('new-mediaLibrary-form')->with('currentValues', $currentValues)
            ->with('id', $id);

    }

}
