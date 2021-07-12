<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\MediaLibrary;
use Illuminate\Http\Request;

class bannerController extends Controller
{

    public function index()
    {
        $pagename = "البانارات";

        $formPage = "new-banner-form";
        $addNew = "إضافة بانر جديد";
        $tables = 'banners';

//        $columns= \DB::getSchemaBuilder()->getColumnListing('banner');

        $qry = \DB::table('banner')
            ->join('media_library', 'banner.medl_id', '=', 'media_library.medl_id')
            ->select('banner.ban_name As اسم البانر' , 'media_library.medl_img_ved As الصورة','banner.state', 'banner.fakeId')
            ->get();
//        $qry = \DB::table('banner')->get();
        $columns=['اسم البانر','الصورة','fakeId'];


        return view('master_tables_view',['pagename' => $pagename])->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('formPage',$formPage);
    }

    public function enableordisable($id)
    {
        $data = Banner::where("fakeId","=","$id")->first();
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
        $data = Banner::where("fakeId","=","$id")->first();
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
        $banner->ban_name = $request->ban_name;
        $banner->medl_id = $request->medl_id;
        $max = Banner::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max? $max->fakeId + 1 : 1;
        $banner->fakeId =$maxFakeId;
        $banner->save();
        return redirect('/banners');
    }

    public function update(Request $request, Banner $banner, $id)
    {
        $currentValues = Banner::where("fakeId","=","$id")->first();
        $currentforeignValues = MediaLibrary::find($currentValues->medl_id);
        return view('new-banner-form')->with('currentValues', $currentValues)
            ->with('id', $id)->with('currentforeignValues',$currentforeignValues);

    }
    public function store_update(Request $request, $id){
        $data = Banner::where("fakeId","=","$id")->first();
        $data->update($request->all());
        return redirect('/banners');
    }

}
