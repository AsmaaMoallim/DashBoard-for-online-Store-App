<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordPage = "0";
        $formPage = "new-role-form";
        $addNew = "إضافة منصب جديد";
        $showRecords = "0";
        //these var does not in compo
        $tables = 'permission';
        $columns= \DB::getSchemaBuilder()->getColumnListing('permission');
        $rows = \DB::table('permission')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);    }


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


    public function destroy($id)
    {
        $data = Permission::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function update( $id)
    {

        $data = Permission::find($id);


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
}
