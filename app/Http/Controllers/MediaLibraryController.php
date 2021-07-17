<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\MediaLibrary;
use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class MediaLibraryController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
//     */


    public function index()
    {
        $pagename = "مكتبة الصور والفيديوهات";

        $formPage = "new-mediaLibrary-form";
        $addNew = "إضافة صورة/فيديو جديد";
        $tables = 'media_library';

        $rows = \DB::table('media_library')
            ->select('medl_id','medl_name AS اسم الصورة/الفيديو', 'medl_description AS التعريف',
                'media_library.state','media_library.fakeId')->get();
        $columns = ['اسم الصورة/الفيديو','التعريف','الصورة/رابط الفيديو','fakeId'];


        return view('master_tables_view' ,compact('rows'),['pagename' => $pagename])->with('rows', $rows)->with
        ('columns', $columns)->with('tables', $tables)->with('addNew', $addNew)->with
        ('formPage', $formPage);
    }

    public function insertData()
    {
        return view('new-mediaLibrary-form');
    }

    public function enableordisable($id)
    {
        $data = MediaLibrary::where("fakeId", "=", "$id")->first();
        if ($data->state == false) {
            $data->state = true;
            $data->save();
        } else {
            $data->state = false;
            $data->save();
        }
        return redirect()->back();
    }

    function fetch_image($medl_id)
    {
        $image = MediaLibrary::findOrFail($medl_id);
        $image_file = Image::make($image->medl_img_ved)->resize(60, 60);
        $response = Response::make($image_file->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');
        return $response;
    }

    function store(Request $request)
    {
        $image = Image::make($request->file('medl_img_ved'))->encode('jpeg');

        $mediaLibrary = new MediaLibrary();
        $max = MediaLibrary::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max ? $max->fakeId + 1 : 1;
        $mediaLibrary->medl_name = $request->medl_name;
        $mediaLibrary->medl_description = $request->medl_description;
        $mediaLibrary->medl_img_ved = $image;
        $mediaLibrary->fakeId = $maxFakeId;

        $mediaLibrary->save();





//        $media_library = new MediaLibrary();
//        $media_library->medl_name = $request->medl_name;
//        $media_library->medl_description = $request->medl_description;

//        $media_library->medl_img_ved = $request->medl_img_ved;
//        $size = $request->file('medl_img_ved')->getSize();
//        $name = $request->file('medl_img_ved')->getClientOriginalName();
//        $request->file('medl_img_ved')->storeAs('public/images',$name);
//      $media_library->medl_img_ved->('public/images/images', $name);

//        $image_file = $request->medl_img_ved;




//        MediaLibrary::create($form_data);



//        $image = Image::make($image_file);

//        Response::make($image->encode('jpeg'));

//        dd($image);

//        $max = MediaLibrary::orderBy("fakeId", 'desc')->first(); // gets the whole row
//        $maxFakeId = $max ? $max->fakeId + 1 : 1;;
////        $media_library->fakeId = $maxFakeId;
//        $form_data = array(
//            'medl_name' => $request->medl_name,
//            'medl_description' => $request->medl_description,
//            'medl_img_ved' => $image,
//            'fakeId' => $maxFakeId
//
//        );


//        MediaLibrary::create($form_data);

        return redirect('/media_library');
    }

    public function delete($id)
    {
        $data = MediaLibrary::where("fakeId", "=", "$id")->first();;
        $data->delete();
        return redirect()->back();
    }


    public function update(Request $request, MediaLibrary $mediaLibrary, $id)
    {
        $currentValues = MediaLibrary::where("fakeId", "=", "$id")->first();

        return view('new-mediaLibrary-form')->with('currentValues', $currentValues)
            ->with('id', $id);

    }

    public function store_update(Request $request, $id)
    {
        $data = MediaLibrary::where("fakeId", "=", "$id")->first();
        $data->update($request->all());
        return redirect('/media_Library');
    }

    public function search(Request $request){
        $key = trim($request->get('search'));


        $pagename = "مكتبة الصور والفيديوهات";

        $formPage = "new-mediaLibrary-form";
        $addNew = "إضافة صورة/فيديو جديد";
        $tables = 'media_library';

        $qry = \DB::table('media_library')
            ->select('medl_name AS اسم الصورة/الفيديو', 'medl_description AS التعريف', 'medl_img_ved AS الصورة/رابط الفيديو',
                'media_library.state', 'media_library.fakeId')
            ->Where('medl_name', 'LIKE', "%{$key}%")
            ->orWhere('medl_description', 'LIKE', "%{$key}%")
            ->get();

        $col = ['اسم الصورة/الفيديو', 'التعريف', 'الصورة/رابط الفيديو', 'fakeId'];

        $qry = \DB::table('manager')
            ->join('position', 'manager.pos_id', '=', 'position.pos_id')
            ->select(\DB::raw("CONCAT(man_frist_name, ' ',  man_last_name) AS الاسم"), 'man_phone_num AS رقم الجوال','man_email AS البريد الالكتروني', 'pos_name AS المنصب', 'manager.state', 'manager.fakeId')
            ->where('man_frist_name', 'LIKE', "%".$key."%")
            ->orWhere('man_last_name', 'LIKE', "%{$key}%")
            ->orWhere('man_email', 'LIKE', "%{$key}%")
            ->orWhere('man_phone_num', 'LIKE', "%{$key}%")
            ->orWhere('pos_name', 'LIKE', "%%{$key}%")
            ->get();

        if (isset($_GET['btnSearch']) && $qry->isEmpty()){
            $qry = \DB::table('media_library')
                ->select('medl_name AS اسم الصورة/الفيديو', 'medl_description AS التعريف', 'medl_img_ved AS الصورة/رابط الفيديو',
                    'media_library.state', 'media_library.fakeId')->get();
            $col = ['اسم الصورة/الفيديو', 'التعريف', 'الصورة/رابط الفيديو', 'fakeId'];

            $placeHolder = "لا توجد نتائج";
        } elseif (isset($_GET['btnCancel'])){
            $qry = \DB::table('media_library')
                ->select('medl_name AS اسم الصورة/الفيديو', 'medl_description AS التعريف', 'medl_img_ved AS الصورة/رابط الفيديو',
                    'media_library.state', 'media_library.fakeId')->get();
            $col = ['اسم الصورة/الفيديو', 'التعريف', 'الصورة/رابط الفيديو', 'fakeId'];

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
