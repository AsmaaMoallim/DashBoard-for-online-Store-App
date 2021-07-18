<?php

namespace App\Http\Controllers;

use App\Models\SocialMediaLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class socialMediaLinksController extends Controller
{
    public function index()
    {
        $pagename = "روابط التواصل الاجتماعي";
        $formPage = "new-social-media-form";
        $addNew = "إضافة موقع تواصل إجتماعي جديد";
        $tables = 'social_media_link';

        $qry = \DB::table('social_media_link')
            ->select('social_id','social_site_name AS اسم موقع التواصل','social_url AS الرابط', 'state', 'fakeId')
            ->get();
        $columns = ['اسم موقع التواصل', 'الصورة', 'الرابط', 'fakeId'];

        return view('master_tables_view',['pagename' => $pagename])->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('formPage',$formPage);
    }

    public function enableordisable($id)
    {
        $data = SocialMediaLink::where("fakeId","=","$id")->first();
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
        $data = SocialMediaLink::where("fakeId","=","$id")->first();
        $data->delete();
        return redirect()->back();
    }

    public function insertData(){
        return view('new-social-media-form');
    }
    function fetch_image($social_id)
    {
        $image = SocialMediaLink::findOrFail($social_id);
        $image_file = Image::make($image->social_img);
        $response = Response::make($image_file->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');
        return $response;
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

        $qry = \DB::table('social_media_link')
            ->select('social_site_name AS اسم موقع التواصل', 'social_img AS صورة','social_url AS الرابط', 'state', 'fakeId')
            ->Where('social_site_name', 'LIKE', "%{$key}%")
            ->orWhere('social_img', 'LIKE', "%{$key}%")
            ->orWhere('social_url', 'LIKE', "%{$key}%")
            ->get();
        $col = ['اسم موقع التواصل', 'صورة', 'الرابط', 'fakeId'];


        if (isset($_GET['btnSearch']) && $qry->isEmpty()){
            $qry = \DB::table('social_media_link')
                ->select('social_site_name AS اسم موقع التواصل', 'social_img AS صورة','social_url AS الرابط', 'state', 'fakeId')
                ->get();
            $col = ['اسم موقع التواصل', 'صورة', 'الرابط', 'fakeId'];

            $placeHolder = "لا توجد نتائج";
        } elseif (isset($_GET['btnCancel'])){
            $qry = \DB::table('social_media_link')
                ->select('social_site_name AS اسم موقع التواصل', 'social_img AS صورة','social_url AS الرابط', 'state', 'fakeId')
                ->get();
            $col = ['اسم موقع التواصل', 'صورة', 'الرابط', 'fakeId'];


            $placeHolder = 'Search';
        }
        else{
            $placeHolder = 'Search';
        }

        return view('master_tables_view' ,['pagename' => $pagename, 'placeHolder'=> $placeHolder])->with('rows',$qry)->with
        ('columns', $col)->with('tables',$tables)->with('addNew',$addNew)->with
        ('formPage',$formPage)->with('key', $key);

    }

}
