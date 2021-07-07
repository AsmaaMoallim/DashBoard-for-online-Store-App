<?php

namespace App\Http\Controllers;

use App\Models\SocialMediaLink;
use Illuminate\Http\Request;

class socialMediaLinksController extends Controller
{
    public function index()
    {
        $recordPage = "0";
        $formPage = "new-social-media-form";
        $addNew = "إضافة موقع تواصل إجتماعي جديد";
        $showRecords = "0";
        $tables = 'social_media_link';
        $columns= \DB::getSchemaBuilder()->getColumnListing('social_media_link');
        $rows = \DB::table('social_media_link')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    public function enableordisable($id)
    {
        $data = SocialMediaLink::find($id);
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
        $data = SocialMediaLink::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function insertData(){
        return view('new-social-media-form');
    }

    public function store(Request $request){
        $socialMedial = new SocialMediaLink();
        $socialMedial->social_id =100;
        $socialMedial->social_site_name = $request->social_site_name;
        $socialMedial->social_img = $request->social_img;
        $socialMedial->social_url = $request->social_url;
        $socialMedial->state = 0;
        $socialMedial->fakeId = 00;
        $socialMedial->save();
        return redirect('/');
    }

}
