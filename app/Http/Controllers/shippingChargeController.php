<?php

namespace App\Http\Controllers;

use App\Models\ShippingCharge;
use Illuminate\Http\Request;

class shippingChargeController extends Controller
{
    public function index()
    {
        $pagename = "تكلفة الشحن";
        $formPage = "new-shipping-charge-form";
        $addNew = "اضف تكلفة جديدة";

        $tables = 'shipping_charge';

        $qry = \DB::table('shipping_charge')
            ->select('ship_id AS الرقم التعريفي','shipping_charge.ship_price AS التكلفة', 'shipping_charge.fakeId')
            ->get();
        $columns = ['الرقم التعريفي', 'التكلفة', 'fakeId'];

        return view('master_tables_view', ['pagename' => $pagename , 'formPage'=>$formPage , 'addNew'=>$addNew])->with('rows', $qry)->with
        ('columns', $columns)->with('tables', $tables);
    }


    public function delete($id)
    {
        $data = ShippingCharge::where("fakeId","=","$id")->first();;
        $data->delete();
        return redirect()->back();
    }


    public function insertData(){
        $shippingCharge = ShippingCharge::all();
        return view('new-shipping-charge-form', ['shippingCharge' => $shippingCharge]);
    }

    function store(Request $request)
    {
        $shippingCharge = new ShippingCharge();
        $shippingCharge->ship_price = $request->ship_price;
        $max = ShippingCharge::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max? $max->fakeId + 1 : 1;
        $shippingCharge->fakeId = $maxFakeId;
        $shippingCharge->save();
        return redirect('/shipping_charge');
    }



    public function update(Request $request, ShippingCharge $shippingCharge,$id)
    {
        $currentValues = ShippingCharge::where("fakeId","=","$id")->first();

        return view('new-shipping-charge-form')->with('currentValues' , $currentValues)
            ->with('id', $id);
    }



    public function store_update(Request $request, $id){
        $data = ShippingCharge::where("fakeId","=","$id")->first();
        $data->update($request->all());
        return redirect('/shipping_charge');
    }

    public function search(Request $request)
    {
        $key = trim($request->get('search'));


        $pagename = "تكلفة الشحن";

        $tables = 'shipping_charge';

        $qry = \DB::table('shipping_charge')
            ->select('ship_id AS الرقم التعريفي','shipping_charge.ship_price AS التكلفة', 'shipping_charge.fakeId')
            ->Where('ship_id', 'LIKE', "%{$key}%")
            ->orWhere('ship_price', 'LIKE', "%{$key}%")
            ->get();

        $col = ['الرقم التعريفي', 'التكلفة', 'fakeId'];
        if (isset($_GET['btnSearch']) && $qry->isEmpty()) {
            $qry = \DB::table('shipping_charge')
                ->select('ship_id AS الرقم التعريفي','shipping_charge.ship_price AS التكلفة', 'shipping_charge.fakeId')
                ->get();
            $col = ['الرقم التعريفي', 'التكلفة', 'fakeId'];

            $placeHolder = "لا توجد نتائج";
        } elseif (isset($_GET['btnCancel'])) {
            $qry = \DB::table('shipping_charge')
                ->select('ship_id AS الرقم التعريفي','shipping_charge.ship_price AS التكلفة', 'shipping_charge.fakeId')
                ->get();
            $col = ['الرقم التعريفي', 'التكلفة', 'fakeId'];

            $placeHolder = 'Search';
        } else {
            $placeHolder = 'Search';
        }

        return view('master_tables_view', ['pagename' => $pagename, 'placeHolder' => $placeHolder])->with('rows', $qry)->with
        ('columns', $col)->with('tables', $tables)->with('key', $key);

    }
}
