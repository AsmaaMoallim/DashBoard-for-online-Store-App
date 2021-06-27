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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Permission::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa "></i>تعطيل</a>';
                    $btn = $btn.' <a class="btn btn-info btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i>تعديل</a>';
                    $btn = $btn.' <a  href="javascript:void(0)" class="btn btn-danger btn-sm deletee"><i class="fa fa-trash"></i>حذف</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('perm');
    }

}
