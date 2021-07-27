<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Manager;
use App\Models\MediaLibrary;
use App\Models\Permission;
use App\Models\PosInclude;
use App\Policies\BannerPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use \Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class bannerController extends Controller
{

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __construct(Banner $banner)
    {
        $this->middleware('auth');
    }

    public function index(Banner $banner, $guard = null)
    {
        $this->authorize('view', $banner);

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

    public function enableordisable($id, Request $request, Banner $banner)
    {
        $this->authorize('view', $banner);

//        dd($request->user());
        $this->authorize('enableordisable', $banner);

//        if (!){
//            return redirect()->back();
//            abort(403);
//        };
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

    public function delete($id, Banner $banner)
    {
        $this->authorize('view', $banner);

        $data = Banner::where("fakeId", "=", "$id")->first();
        $data->delete();
        return redirect()->back();
    }

    public function insertData(Banner $banner)
    {
        $this->authorize('view', $banner);

        $medialibrary = MediaLibrary::all();
        return view('new-banner-form')->with(compact('medialibrary'));
    }

    public function fetch_image($id, $medl_id = null, Banner $banner)
    {
        $this->authorize('view', $banner);

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

    function store(Request $request, Banner $banner)
    {
        $this->authorize('view', $banner);

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
        $this->authorize('view', $banner);

        $currentValues = Banner::where("fakeId", "=", "$id")->first();
        $currentforeignValues = MediaLibrary::find($currentValues->medl_id);
        $medialibrary = MediaLibrary::all();
        $currentMedias = MediaLibrary::all()
            ->where("medl_id", "=", "$currentValues->medl_id");

        return view('new-banner-form')->with('currentValues', $currentValues)
            ->with('id', $id)->with('currentforeignValues', $currentforeignValues)
            ->with('medialibrary', $medialibrary)->with('currentMedias', $currentMedias);

    }

    public function store_update(Request $request, $id, Banner $banner)
    {
        $this->authorize('view', $banner);

        $data = Banner::where("fakeId", "=", "$id")->first();
        $data->update($request->all());
        return redirect('/banners');
    }

    public function search(Request $request , Banner $banner)
    {
        $this->authorize('view', $banner);

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
