<?php

namespace App\Http\Controllers;

use App\Models\SocialMediaLink;
use Illuminate\Http\Request;

class socialMediaLinksController extends Controller
{
    public function index()
    {
        $pagename = "روابط التواصل الاجتماعي";
        $formPage = "new-social-media-form";
        $addNew = "إضافة موقع تواصل إجتماعي جديد";
        $tables = 'social_media_link';
        $columns= \DB::getSchemaBuilder()->getColumnListing('social_media_link');
        $rows = \DB::table('social_media_link')->get();
        return view('master_tables_view',['pagename' => $pagename])->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('formPage',$formPage);
    }

    public function enableordisable($id)
    {
        $data = SocialMediaLink::where("fakeId","=","$id")->first();;
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
        $data = SocialMediaLink::where("fakeId","=","$id")->first();;
        $data->delete();
        return redirect()->back();
    }

    public function insertData(){
        return view('new-social-media-form');
    }

    public function store(Request $request){
        $socialMedial = new SocialMediaLink();
        $socialMedial->social_site_name = $request->social_site_name;
        $socialMedial->social_img = $request->social_img;
        $socialMedial->social_url = $request->social_url;
        $max = SocialMediaLink::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max? $max->fakeId + 1 : 1;
        $socialMedial->fakeId = $maxFakeId;
        $socialMedial->save();
        return redirect('/');
    }

}
