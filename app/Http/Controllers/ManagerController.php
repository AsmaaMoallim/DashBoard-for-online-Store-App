<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Permission;
use App\Models\Position;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use function Sodium\increment;
use function Symfony\Component\Translation\t;


class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordPage = "manager_operations_record";
        $formPage = "new-manager-form";
        $addNew = "اضف مدير جديد";
        $showRecords = "سجل عمليات المديرين";
        //these var does not in compo
        $tables = 'manager';

        $qry = \DB::table('manager')
            ->join('position', 'manager.pos_id', '=', 'position.pos_id')
            ->select(\DB::raw("CONCAT(man_frist_name, ' ',  man_last_name) AS الاسم"), 'man_phone_num AS رقم الجوال','man_email AS البريد الالكتروني', 'pos_name AS المنصب', 'manager.state', 'manager.fakeId')
            ->get();
//        dd($qry);
        $col = ['الاسم', 'رقم الجوال', 'البريد الالكتروني', 'المنصب', 'fakeId'];
        $columns= \DB::getSchemaBuilder()->getColumnListing('manager');
        $rows = \DB::table('manager')->get();
//                dd($rows);
//                dd($col);

        return view('master_tables_view')->with('rows',$qry)->with
        ('columns', $col)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

    public function delete($id)
    {
       $data = Manager::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function enableordisable($id)
    {
        $data = Manager::find($id);
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
        $positions = Position::all();
        return view('new-manager-form', ['positions' => $positions]);
    }


    function store(Request $request)
    {
        $manager = new Manager();
        $manager->man_id=66;
        $manager->man_frist_name = $request->man_frist_name;
        $manager->man_last_name = $request->man_last_name;
        $manager->pos_id = $request->pos_id;
        $manager->man_phone_num = $request->man_phone_num;
        $manager->man_email = $request->man_email;
        $manager->man_password = $request->man_password;
        $manager->fakeId = 1;
        $manager->state = 1;
        $manager->save();
        return redirect('/manager');
    }


    public function update(Request $request, manager $manager,$id)
    {
        $positions = Position::all();
        $currentValues = manager::find($id);

        $CurrentPosition = Position::find($currentValues->pos_id);

//        $data->ManagerName=$request->ManagerName;
//        $data->ManagerPhone=$request->ManagerPhone;
//        $data->ManagerRole=$request->ManagerRole;
//        $data->ManagerEmail=$request->ManagerEmail;
//        $data->ManagerPassword=$request->ManagerPassword;
//        $data->save();
//        dd($currentValuues);
        return view('new-manager-form',['positions' => $positions, 'CurrentPosition' =>$CurrentPosition])->with('currentValues' , $currentValues)
            ->with('id', $id);
    }

}
