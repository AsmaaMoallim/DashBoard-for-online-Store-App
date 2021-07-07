<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PosInclude;
use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class positions_permissionsController extends Controller
{
    public function index()
    {
        $recordPage = "0";
        $formPage = "new-position-form";
        $addNew = "إضافة منصب جديد";
        $showRecords = "0";
        $tables = 'position';
        $columns = \DB::getSchemaBuilder()->getColumnListing('position');
        $rows = \DB::table('position')->get();
        return view('master_tables_view')->with('rows', $rows)->with
        ('columns', $columns)->with('tables', $tables)->with('addNew', $addNew)->with
        ('showRecords', $showRecords)->with('formPage', $formPage)->with('recordPage', $recordPage);
    }

    public function insertData()
    {
        $permission = Permission::all();
        return view('new-position-form', ['permissions' => $permission]);
    }

    public function enableordisable($id)
    {

        $data = Position::find($id);


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
        $data = Position::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function update(Request $request, Position $manager, $id)
    {
        $currentValues = Position::find($id);
        $permission = Permission::all();
        $CurrentPermission = PosInclude::all("pos_id")->where($currentValues)->get("per_id");
        dd($CurrentPermission);
//        $per = $CurrentPermission->pos_id;
//        dd($per);
        return view('new-position-form', ['permission' => $permission])->with('currentValues', $currentValues)
            ->with('id', $id);

//        $data->ManagerName=$request->ManagerName;
//        $data->ManagerPhone=$request->ManagerPhone;
//        $data->ManagerRole=$request->ManagerRole;
//        $data->ManagerEmail=$request->ManagerEmail;
//        $data->ManagerPassword=$request->ManagerPassword;
//        $data->save();
//        dd($currentValuues);

    }

//    public function store(Request $request){
//        $position = new Position();
////        $permission = new Permission();
//        $posInclude = new PosInclude();
//        $position->pos_id = 12077;
//        $position->pos_name = $request->pos_name;
//        $position->fakeId = 55;
//        $position->state = 0;
//        $posInclude = $request->input('per_id');
////        foreach ($posInclude as $posInclude){
////            PosInclude::creat($posInclude);
////        }
////        $posInclude->fakeId = 0;
//////        $permission->fakeId = 0;
////        $position->pos_includes()->saveMany($posInclude);
//////        $permission->save();
////
//
//        $posInclude->fakeId = 0;
////        $permission->fakeId = 0;
//        $position->pos_includes()->save($posInclude);
////        $permission->save();
//
//
//        return redirect()->back();
//    }

    public function store(Request $request)
    {
        $position = new Position();
        $position->pos_id = 13;
        $position->pos_name = $request->pos_name;
        $position->fakeId = 55;
        $position->state = 0;
        $position->save();
        $per_id = $request->input('per_id');

        foreach ($per_id as $per_id) {
            $posInclude = new PosInclude();
            $posInclude->pos_id = $position->pos_id;
            $posInclude->fakeId = 0;
            $posInclude->per_id = $per_id;
            $posInclude->save();
        }

        return redirect('/');
    }

}
