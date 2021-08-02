<?php

namespace App\Http\Controllers;

use App\Models\ManagerOperationsRecord;
use App\Models\Measure;
use App\Models\measuresImages;
use App\Models\MediaLibrary;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\This;
use Ramsey\Uuid\Type\Integer;
use Yajra\DataTables\Exceptions\Exception;

/**
 * @property  id
 */
class MeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    static $id;

    static public $storeImage;

//    /**
//     * MeasureController constructor.
//     * @param  $id
//     */
//    public function __construct()
//    {
//        $this->id = 0;
//    }


    public function getId()
    {
        return MeasureController::$id;
    }

//    /**
//     * @param int $id
//     */
    public function setId(int $id): void
    {
        MeasureController::$id = $id;
    }


    public function index(Measure $measure)
    {
        $this->authorize('view', $measure);

        $pagename = "دليل المقاسات";
        $formPage = "update-measures-form";
        $addNew = "تعديل الصورة";
        $showRecords = "0";
        $tables = 'measure';

        $qry = \DB::table('measure')
            ->select('mesu_value AS المقاسات', 'measure.fakeId')->get();

        $columns = ['المقاسات', 'fakeId'];


        return view('master_tables_view', ['pagename' => $pagename])->with('rows', $qry)->with
        ('columns', $columns)->with('tables', $tables)->with('addNew', $addNew)->with
        ('showRecords', $showRecords)->with('formPage', $formPage);

//            ->with('tables2', $tables2)->with('rows2', $qry2)->with('columns2', $columns2);

    }

    public function insertData(Measure $measure)
    {
        $this->authorize('view', $measure);

        $mediaLibrary = MediaLibrary::all();
        return view('update-measures-form')->with(compact('mediaLibrary'));
    }

    public function fetch_image($id, Measure $measure)
    {
        $this->authorize('view', $measure);

        $image = Measure::findOrFail($id);
        $image_file = Image::make($image->medl_img_ved)->resize(60, 60);
        $response = Response::make($image_file->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');
        return $response;
    }

    static function del($id)
    {
        $data = Measure::where("fakeId", "=", "$id")->first();
        $data->delete();
    }

    public function delete($id, Measure $measure)
    {
        $this->authorize('view', $measure);


        ManagerOperationsRecordController::storeLog("حذف",  'App\Http\Controllers\MeasureController::del', $id);

//
//        try {
//            DB::beginTransaction();
//
//            //some code
//            $actionRecord = new ManagerOperationsRecord();
//            $actionRecord->man_id = auth()->id();
//            $actionRecord->man_oper_date = Carbon::now()->toDateString();
//            $actionRecord->man_oper_time = Carbon::now()->toTimeString();
//            $actionRecord->man_operation = " حذف مقاس بالرقم التعريفي: ";
//            $max = ManagerOperationsRecord::orderBy("fakeId", 'desc')->first(); // gets the whole row
//            $maxFakeId = $max ? $max->fakeId + 1 : 1;
//            $actionRecord->fakeId = $maxFakeId;
//            $actionRecord->save();
//
//        } catch (InputValidationFailedException $e) {
//            DB::rollback();
//
//            Log::info('User Validation Failed! ');
//            throw $e;
//        } catch
//        (Exception $e) {
//            DB::rollback();
//
//            Log::error('Server Error at UsersController!');
//            throw $e;
//        }
//
//
//        //some other code
//        if (!Measure::where("fakeId", "=", "$id")->first()) {
//            DB::commit();
//        }
//

//            "klo");

//{
//Log::error('Server Error at DoctorsController');
//DB::rollback();
//App::abort(500, $e->getMessage());
//}


        return redirect()->back();
    }

//    public function enableOrdisable($id,Measure $measure)
//    {
//        $this->authorize('view', $measure);
//
//        $data = Measure::where("fakeId","=","$id")->first();;
//
//
//        if ($data->state == false) {
//            $data->state = true;
//            $data->save();
//        } else {
//            $data->state = false;
//            $data->save();
//        }
//        return redirect()->back();
//
//    }


    function store(Request $request, Measure $measure)
    {
        $this->authorize('view', $measure);

//        $image = Image::make($request->file('medl_id'))->encode('jpeg');
//        MeasureController::$storeImage = $image;
        $mesuImage = new MediaLibrary();
        $mesuImage->medl_id = $request->medl_id;
        MeasureController::setId($request->medl_id);
//        $this->id = $request->medl_id;
//        dd(MeasureController::$id);

        return redirect('/measure');
    }

    public
    function update(Request $request, Measure $measure, $id)
    {
        $this->authorize('view', $measure);

        $currentValues = measuresImages::where("fakeId", "=", "$id")->first();
        $mediaLibrary = MediaLibrary::all();
        $currentMedias = MediaLibrary::all()
            ->where("medl_id", "=", "$currentValues->medl_id");

        return view('update-measures-form')->with('currentValues', $currentValues)
                ->with('mediaLibrary', $mediaLibrary) - with('currentMedias', $currentMedias)
                ->with('id', $id);
    }


    public
    function store_update(Request $request, $id, Measure $measure)
    {
        $this->authorize('view', $measure);

        $data = Measure::where("fakeId", "=", "$id")->first();
        $data->update($request->all());
        return redirect('/measure');
    }

//    function addNew(Request $request)
//    {
//        $manager = new Manager;
//        $manager->ManagerName = $request->ManagerName;
//        $manager->ManagerEmail = $request->ManagerEmail;
//        $manager->ManagerPhone = $request->ManagerPhone;
//        $manager->ManagerRole = $request->ManagerRole;
//        $manager->ManagerPassword = $request->ManagerPassword;
//      $manager->save();
//        return redirect('/home');
//   }


    public
    function search(Request $request, Measure $measure)
    {
        $this->authorize('view', $measure);

        $key = trim($request->get('search'));


        $pagename = "دليل المقاسات";
        $formPage = "update-measures-form";
        $addNew = "تعديل الصورة";
        $showRecords = "0";
        $tables = 'measure';

        $qry = \DB::table('measure')
            ->select('mesu_value AS المقاسات', 'measure.fakeId')
            ->Where('mesu_value', 'LIKE', "%{$key}%")
            ->get();

        $col = ['المقاسات', 'fakeId'];


        if (isset($_GET['btnSearch']) && $qry->isEmpty()) {
            $qry = \DB::table('measure')
                ->select('mesu_value AS المقاسات', 'measure.fakeId')->get();

            $col = ['المقاسات', 'fakeId'];

            $placeHolder = "لا توجد نتائج";
        } elseif (isset($_GET['btnCancel'])) {
            $qry = \DB::table('measure')
                ->select('mesu_value AS المقاسات', 'measure.fakeId')->get();

            $col = ['المقاسات', 'fakeId'];

            $placeHolder = 'Search';
        } else {
            $placeHolder = 'Search';
        }

        return view('master_tables_view', ['pagename' => $pagename, 'placeHolder' => $placeHolder])->with('rows', $qry)->with
        ('columns', $col)->with('tables', $tables)->with('addNew', $addNew)->with
        ('showRecords', $showRecords)->with('formPage', $formPage)->with('key', $key);

    }


}
