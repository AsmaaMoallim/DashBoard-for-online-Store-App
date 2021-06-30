<?php

namespace App\Http\Controllers;

use App\Models\Manager;
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

    public function destroy($id)
    {
       $data = Manager::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function update($id)
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
        $manager = manager::all();
        return view('new-manager-form', ['managers' => $manager]);
    }

    ////////////Ruba/////////////
//    function showData()
//    {
//        $manager = manager::all();
//        return view('new-manager-form', ['managers' => $manager]);
//    }
//    function addManager(Request $request)
//    {
//        $manager = new Manager;
//        $manager->ManagerName = $request->ManagerName;
//        $manager->ManagerEmail = $request->ManagerEmail;
//        $manager->ManagerPhone = $request->ManagerPhone;
//        $manager->ManagerRole = $request->ManagerRole;
//        $manager->ManagerPassword = $request->ManagerPassword;
//        $manager->save();
//        return redirect('/home');
//    }
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
