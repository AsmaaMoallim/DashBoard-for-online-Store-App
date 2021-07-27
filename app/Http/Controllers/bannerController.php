<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Manager;
use App\Models\MediaLibrary;
use App\Models\Permission;
use App\Models\PosInclude;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use \Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class bannerController extends Controller
{

    public function __construct()
    {
//        $this->middleware(function ($request, $next) {
//
//            $this->user = Auth::user();
//
//            return $next($request);
//        });
        $this->middleware('auth');
    }

    public function index(Manager $manager, $guard = null)
    {
//        Session::start();
//        dd(Session::all());
//        $user = Auth::guard($guard)->check();
//        $user = auth()->user();
//        dd(auth()->user()->pos_id);
//        dd(PosInclude::all()->where('pos_id', '=', auth()->user()->pos_id)
//            ->where('per_id', '=', Permission::Deals_with_banners));
        $pagename = "البانارات";

        $formPage = "new-banner-form";
        $addNew = "إضافة بانر جديد";
        $tables = 'banners';

//        $columns= \DB::getSchemaBuilder()->getColumnListing('banner');

        $qry = \DB::table('banner')
            ->join('media_library', 'banner.medl_id', '=', 'media_library.medl_id')
            ->select('banner.medl_id', 'banner.ban_name As اسم البانر', 'banner.state', 'banner.fakeId')
            ->get();
        $columns = ['اسم البانر', 'الصورة', 'fakeId'];


        return view('master_tables_view', ['pagename' => $pagename])->with('rows', $qry)->with
        ('columns', $columns)->with('tables', $tables)->with('addNew', $addNew)->with
        ('formPage', $formPage);
    }

    public function enableordisable($id)
    {
        $data = Banner::where("fakeId", "=", "$id")->first();
        if ($data->state == false) {
            $data->state = true;
            $data->save();
        } else {
            $data->state = false;
            $data->save();
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $data = Banner::where("fakeId", "=", "$id")->first();
        $data->delete();
        return redirect()->back();
    }

    public function insertData()
    {
        $medialibrary = MediaLibrary::all();
        return view('new-banner-form')->with(compact('medialibrary'));
    }

    public function fetch_image($id, $medl_id = null)
    {
        if ($medl_id) {
            $image = MediaLibrary::findOrFail($medl_id);
            $image_file = Image::make($image->medl_img_ved)->resize(60, 60);
            $response = Response::make($image_file->encode('jpeg'));
            $response->header('Content-Type', 'image/jpeg');
            return $response;
        } else {
            $image = MediaLibrary::findOrFail($id);
            $image_file = Image::make($image->medl_img_ved)->resize(60, 60);
            $response = Response::make($image_file->encode('jpeg'));
            $response->header('Content-Type', 'image/jpeg');
            return $response;
        }

    }

    function store(Request $request)
    {
        $banner = new Banner();
        $banner->ban_name = $request->ban_name;
        $banner->medl_id = $request->medl_id;
        $max = Banner::orderBy("fakeId", 'desc')->first();
        $maxFakeId = $max ? $max->fakeId + 1 : 1;
        $banner->fakeId = $maxFakeId;
        $banner->state = false;
        $banner->save();
        return redirect('/banners');
    }

    public function update(Request $request, Banner $banner, $id)
    {
        $currentValues = Banner::where("fakeId", "=", "$id")->first();
        $currentforeignValues = MediaLibrary::find($currentValues->medl_id);
        $medialibrary = MediaLibrary::all();
        $currentMedias = MediaLibrary::all()
            ->where("medl_id", "=", "$currentValues->medl_id");

        return view('new-banner-form')->with('currentValues', $currentValues)
            ->with('id', $id)->with('currentforeignValues', $currentforeignValues)
            ->with('medialibrary', $medialibrary)->with('currentMedias', $currentMedias);

    }

    public function store_update(Request $request, $id)
    {
        $data = Banner::where("fakeId", "=", "$id")->first();
        $data->update($request->all());
        return redirect('/banners');
    }

    public function search(Request $request)
    {
        $key = trim($request->get('search'));

        $pagename = "البانارات";

        $formPage = "new-banner-form";
        $addNew = "إضافة بانر جديد";
        $tables = 'banners';


        $qry = \DB::table('banner')
            ->join('media_library', 'banner.medl_id', '=', 'media_library.medl_id')
            ->select('banner.ban_name As اسم البانر', 'media_library.medl_img_ved As الصورة', 'banner.state', 'banner.fakeId')
            ->Where('banner.ban_name', 'LIKE', "%{$key}%")
            ->orWhere('media_library.medl_img_ved', 'LIKE', "%{$key}%")
            ->get();
        $col = ['اسم البانر', 'الصورة', 'fakeId'];


        if (isset($_GET['btnSearch']) && $qry->isEmpty()) {
            $qry = \DB::table('banner')
                ->join('media_library', 'banner.medl_id', '=', 'media_library.medl_id')
                ->select('banner.ban_name As اسم البانر', 'media_library.medl_img_ved As الصورة', 'banner.state', 'banner.fakeId')
                ->get();
            $col = ['اسم البانر', 'الصورة', 'fakeId'];
            $placeHolder = "لا توجد نتائج";
        } elseif (isset($_GET['btnCancel'])) {
            $qry = \DB::table('banner')
                ->join('media_library', 'banner.medl_id', '=', 'media_library.medl_id')
                ->select('banner.ban_name As اسم البانر', 'media_library.medl_img_ved As الصورة', 'banner.state', 'banner.fakeId')
                ->get();
            $col = ['اسم البانر', 'الصورة', 'fakeId'];
            $placeHolder = 'Search';
        } else {
            $placeHolder = 'Search';
        }

        return view('master_tables_view', ['pagename' => $pagename, 'placeHolder' => $placeHolder])->with('rows', $qry)->with
        ('columns', $col)->with('tables', $tables)->with('addNew', $addNew)->with
        ('formPage', $formPage)->with('key', $key);

    }


}
