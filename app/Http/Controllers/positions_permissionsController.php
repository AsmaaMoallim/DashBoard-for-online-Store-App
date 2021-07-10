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
        $permissions = Permission::all();
//        dd(Permission::max("fakeId"));
        $currentPermissions = PosInclude::all()->where("pos_id", "=", "$currentValues->pos_id");
//        dd($currentPermissions);
//        $CurrentPermission = PosInclude::all("pos_id")->where($currentValues)->get("per_id");
//        dd($CurrentPermission);
//        $per = $CurrentPermission->pos_id;
//        dd($per);
        return view('new-position-form', ['permissions' => $permissions , 'currentPermissions' => $currentPermissions])->with('currentValues', $currentValues)
            ->with('id', $id);

//        $data->ManagerName=$request->ManagerName;
//        $data->ManagerPhone=$request->ManagerPhone;
//        $data->ManagerRole=$request->ManagerRole;
//        $data->ManagerEmail=$request->ManagerEmail;
//        $data->ManagerPassword=$request->ManagerPassword;
//        $data->save();
//        dd($currentValuues);

    }

    public function store(Request $request)
    {
        $position = new Position();
        $position->pos_name = $request->pos_name;
        $max = Position::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max->fakeId + 1;
        $position->fakeId = $maxFakeId;
        $position->save();
        $per_id = $request->input('per_id');
        foreach ($per_id as $per_id) {
            $maxFakeId = 0;
            $posInclude = new PosInclude();
            $posInclude->pos_id = $position->pos_id;
            $max = PosInclude::orderBy("fakeId", 'desc')->first(); // gets the whole row
            $maxFakeId = $max? $max->fakeId + 1 : 1;
            $posInclude->fakeId = $maxFakeId;
            $posInclude->per_id = $per_id;
            $posInclude->save();
        }

        return redirect('/');
    }

}
