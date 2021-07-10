<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\MediaLibrary;
use Illuminate\Http\Request;

class bannerController extends Controller
{

    public function index()
    {
        $recordPage = "0";
        $formPage = "new-banner-form";
        $addNew = "إضافة بانر جديد";
        $showRecords = "0";
        $tables = 'banners';

//        $columns= \DB::getSchemaBuilder()->getColumnListing('banner');

        $qry = \DB::table('banner')
            ->join('media_library', 'banner.medl_id', '=', 'media_library.medl_id')
            ->select('banner.ban_name As اسم البانر' , 'media_library.medl_img_ved As الصورة', 'banner.fakeId')
            ->get();
//        $qry = \DB::table('banner')->get();
        $columns=['اسم البانر','الصورة','fakeId'];


        return view('master_tables_view')->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    public function enableordisable($id)
    {
        $data = Banner::find($id);
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

    public function delete($id)
    {
        $data = Banner::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function insertData(){
        $ban_img = MediaLibrary::all();
    return view('new-banner-form',['ban_img'=>$ban_img]);
    }

    function store(Request $request)
    {
        $banner = new Banner();
        $banner->ban_id=11;
        $banner->ban_name = $request->ban_name;
        $banner->medl_id = $request->medl_id;
        $banner->state = 0;
        $banner->fakeId =1;
        $banner->save();
        return redirect('/manager');
    }

    public function update(Request $request, Banner $banner, $id)
    {
        $currentValues = Banner::find($id);
        $currentforeignValues = MediaLibrary::find($currentValues->medl_id);
        return view('new-banner-form')->with('currentValues', $currentValues)
            ->with('id', $id)->with('currentforeignValues',$currentforeignValues);

    }

}
