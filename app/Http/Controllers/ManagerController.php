<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Position;
use http\Url;
use Illuminate\Http\Request;
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
        $columns= \DB::getSchemaBuilder()->getColumnListing('manager');
        $rows = \DB::table('manager')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
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
        $position = Position::all();
        return view('new-manager-form', ['$positions' => $position]);
    }


    function store(Request $request)
    {
        $manager = new Manager;
        $manager->man_id= 100;
        $manager->man_frist_name = $request->man_frist_name;
        $manager->man_last_name = $request->man_last_name;
        $manager->pos_id = 55;
//        $manager->pos_id = $request->pos_id;
        $manager->man_phone_num = $request->man_phone_num;
        $manager->man_email = $request->man_email;
        $manager->man_password = $request->man_password;
        $manager->fakeId = 1;
        $manager->state = 1;
        $manager->save();
        return redirect('/home');
    }


//    public function update(Request $request, manager $manager,$id)
//    {
//        $data = manager::find($id);
//        $data->ManagerName=$request->ManagerName;
//        $data->ManagerPhone=$request->ManagerPhone;
//        $data->ManagerRole=$request->ManagerRole;
//        $data->ManagerEmail=$request->ManagerEmail;
//        $data->ManagerPassword=$request->ManagerPassword;
//        $data->save();
//    }

}
