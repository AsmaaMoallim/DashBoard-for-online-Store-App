<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Permission;
use App\Models\Position;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Sodium\increment;
use function Symfony\Component\Translation\t;


class ManagerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */



    public function index()
    {
//        dd(auth()->user());

        if (Auth::check() == false)
        {
            return redirect('/');
        }
        else
        $pagename = "الادارة";
        $recordPage = "manager_operations_record";
        $formPage = "new-manager-form";
        $addNew = "اضف مدير جديد";
        $showRecords = "سجل عمليات المديرين";
        $tables = 'manager';

        $qry = \DB::table('manager')
            ->join('position', 'manager.pos_id', '=', 'position.pos_id')
            ->select(\DB::raw("CONCAT(man_frist_name, ' ',  man_last_name) AS الاسم"), 'man_phone_num AS رقم الجوال','man_email AS البريد الالكتروني', 'pos_name AS المنصب', 'manager.state', 'manager.fakeId')
            ->get();

        $col = ['الاسم', 'رقم الجوال', 'البريد الالكتروني', 'المنصب', 'fakeId'];

        return view('master_tables_view' ,['pagename' => $pagename])->with('rows',$qry)->with
        ('columns', $col)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    public function delete($id)
    {
       $data = Manager::where("fakeId","=","$id")->first();;
        $data->delete();
        return redirect()->back();
    }

    public function enableordisable($id)
    {
        $data = Manager::where("fakeId","=","$id")->first();
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


    public function insertData(){

        if (Auth::check() == false)
        {
            return redirect('/');
        }
        else
        $positions = Position::all();
        return view('new-manager-form', ['positions' => $positions]);
    }


    function store(Request $request)
    {


        $manager = new Manager();
        $manager->man_frist_name = $request->man_frist_name;
        $manager->man_last_name = $request->man_last_name;
        $manager->pos_id = $request->pos_id;
        $manager->man_phone_num = $request->man_phone_num;
        $manager->man_email = $request->man_email;

//        $manager->man_password = $request->man_password;
        $manager->man_password = Hash::make($request->man_password);


        $max = Manager::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max? $max->fakeId + 1 : 1;
        $manager->fakeId = $maxFakeId;
        $manager->save();
        return redirect('/manager');
    }

    public function update(Request $request, manager $manager,$id)
    {
        $positions = Position::all();
        $currentValues = Manager::where("fakeId","=","$id")->first();
        $CurrentPosition = Position::find($currentValues->pos_id);

        return view('new-manager-form',['positions' => $positions, 'CurrentPosition' =>$CurrentPosition])->with('currentValues' , $currentValues)
            ->with('id', $id);
    }



    public function store_update(Request $request, $id){
        $data = Manager::where("fakeId","=","$id")->first();
        $data->update($request->all());
        return redirect('/manager');
    }


    public function search(Request $request){
        $key = trim($request->get('search'));


        $pagename = "الادارة";
        $recordPage = "manager_operations_record";
        $formPage = "new-manager-form";
        $addNew = "اضف مدير جديد";
        $showRecords = "سجل عمليات المديرين";
        $tables = 'manager';

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
