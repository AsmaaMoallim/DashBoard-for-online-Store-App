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
        return redirect('/social_media_link');
    }

    public function update(Request $request, SocialMediaLink $socialMediaLink,$id)
    {
        $currentValues = SocialMediaLink::where("fakeId","=","$id")->first();

        return view('new-social-media-form')->with('currentValues' , $currentValues)
            ->with('id', $id);
    }



    public function store_update(Request $request, $id){
        $data = SocialMediaLink::where("fakeId","=","$id")->first();
        $data->update($request->all());
        return redirect('/social_media_link');
    }

    public function search(Request $request){
        $key = trim($request->get('search'));


        $pagename = "روابط التواصل الاجتماعي";
        $formPage = "new-social-media-form";
        $addNew = "إضافة موقع تواصل إجتماعي جديد";
        $tables = 'social_media_link';

        $rows = \DB::table('social_media_link')->get();

        $col= \DB::getSchemaBuilder()->getColumnListing('social_media_link');

        $qry = \DB::table('manager')
            ->join('position', 'manager.pos_id', '=', 'position.pos_id')
            ->select(\DB::raw("CONCAT(man_frist_name, ' ',  man_last_name) AS الاسم"), 'man_phone_num AS رقم الجوال','man_email AS البريد الالكتروني', 'pos_name AS المنصب', 'manager.state', 'manager.fakeId')
            ->where('man_frist_name', 'LIKE', "%".$key."%")
            ->orWhere('man_last_name', 'LIKE', "%{$key}%")
            ->orWhere('man_email', 'LIKE', "%{$key}%")
            ->orWhere('man_phone_num', 'LIKE', "%{$key}%")
            ->orWhere('pos_name', 'LIKE', "%%{$key}%")
            ->get();

//
        $col = ['الاسم', 'رقم الجوال', 'البريد الالكتروني', 'المنصب', 'fakeId'];

//            dd($_GET['btnSearch']);
        if (isset($_GET['btnSearch']) && $qry->isEmpty()){
            $qry = \DB::table('manager')
                ->join('position', 'manager.pos_id', '=', 'position.pos_id')
                ->select(\DB::raw("CONCAT(man_frist_name, ' ',  man_last_name) AS الاسم"), 'man_phone_num AS رقم الجوال','man_email AS البريد الالكتروني', 'pos_name AS المنصب', 'manager.state', 'manager.fakeId')
                ->get();

            $col = ['الاسم', 'رقم الجوال', 'البريد الالكتروني', 'المنصب', 'fakeId'];
            $placeHolder = "لا توجد نتائج";
        } elseif (isset($_GET['btnCancel'])){
            $qry = \DB::table('manager')
                ->join('position', 'manager.pos_id', '=', 'position.pos_id')
                ->select(\DB::raw("CONCAT(man_frist_name, ' ',  man_last_name) AS الاسم"), 'man_phone_num AS رقم الجوال','man_email AS البريد الالكتروني', 'pos_name AS المنصب', 'manager.state', 'manager.fakeId')
                ->get();
            $col = ['الاسم', 'رقم الجوال', 'البريد الالكتروني', 'المنصب', 'fakeId'];
            $placeHolder = 'Search';
        }
        else{
            $placeHolder = 'Search';
        }

        return view('master_tables_view' ,['pagename' => $pagename, 'placeHolder'=> $placeHolder])->with('rows',$qry)->with
        ('columns', $col)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage)->with('key', $key);

    }


}
