<?php

namespace App\Http\Controllers;
use App\Models\MediaLibrary;
//use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Image;


class MediaLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename = "مكتبة الصور والفيديوهات";

        $formPage = "new-mediaLibrary-form";
        $addNew = "إضافة صورة/فيديو جديد";
        $tables = 'media_library';

        $qry = \DB::table('media_library')
            ->select('medl_name AS اسم الصورة/الفيديو', 'medl_description AS التعريف', 'medl_img_ved AS الصورة/رابط الفيديو',
                'media_library.state', 'media_library.fakeId')->get();
        $columns = ['اسم الصورة/الفيديو', 'التعريف', 'الصورة/رابط الفيديو', 'fakeId'];


        return view('master_tables_view', ['pagename' => $pagename])->with('rows', $qry)->with
        ('columns', $columns)->with('tables', $tables)->with('addNew', $addNew)->with
        ('formPage', $formPage);
    }

    public function insertData()
    {
        return view('new-mediaLibrary-form');
    }

    public function enableordisable($id)
    {
        $data = MediaLibrary::where("fakeId","=","$id")->first();
        if ($data->state == false) {
            $data->state = true;
            $data->save();
        } else {
            $data->state = false;
            $data->save();
        }
        return redirect()->back();
    }


    function store(Request $request)
    {
        $media_library = new MediaLibrary();
        $media_library->medl_name = $request->medl_name;
        $media_library->medl_description = $request->medl_description;
//      $media_library->medl_img_ved = $request->medl_img_ved;

        $img_path = 'public/medialLibrary';
        $img_file = $request->medl_img_ved;
        $image = Image::make($img_file);

        $img_name = $request->file('medl_img_ved')->getClientOriginalName();
        $request->file('medl_img_ved')->storeAs($img_path,$img_name);
        Response::make($image->encode('jpeg'));


        $media_library->medl_img_ved = $img_name;

        $max = MediaLibrary::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max? $max->fakeId + 1 : 1;;
        $media_library->fakeId = $maxFakeId;
        $media_library->save();
        return redirect('/media_Library');
//        return redirect()->back();

//        if($request->hasFile('medl_img_ved'))
//        {
//            $destination_path = 'public/images/products';
//            $image = $request->file('medl_img_ved');
//            $image_name = $image->getClientOriginalName();
//            $path = $request->file('medl_img_ved')->store($destination_path, $image_name);
//            $media_library['medl_img_ved'] = $path;
//            }

//        $size = $request->file('medl_img_ved')->getSize();
//        $name = $request->file('medl_img_ved')->getClientOriginalName();
//        $request->file('medl_img_ved')->storeAs('public/images',$name);
//      $media_library->medl_img_ved->('public/images/images', $name);
//
//        if($request->hasFile('medl_img_ved'))
//        {
//            $file = $request->file('medl_img_ved');
//            $extention = $file->getClientOriginalExtension();
//            $filename = time().'.'.$extention;
//            $file->move('uploads/mediaLibrary/'.$filename);
//            $media_library->medl_img_ved = $filename;
//        }

//        $max = MediaLibrary::orderBy("fakeId", 'desc')->first(); // gets the whole row
//        $maxFakeId = $max? $max->fakeId + 1 : 1;;
//        $media_library->fakeId = $maxFakeId;
//        $media_library->save();
//        return redirect('/media_Library');
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

//

//            dd($_GET['btnSearch']);
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
