<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductProdAvilColor;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $recordPage = "product_details";
        $formPage = "new-product-form";
        $addNew = "إضافة منتج جديد";
        $showRecords = "عرض التفاصيل";
        $tables = 'products';
        $columns= \DB::getSchemaBuilder()->getColumnListing('product');
        $rows = \DB::table('product')->get();
        return view('master_tables_view')->with('rows',$rows)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('showRecords',$showRecords)->with('formPage',$formPage)->with('recordPage',$recordPage);
    }

        function addNew(Request $request)
    {
        $product = new Product();
        $co = new ProductProdAvilColor();
        $manager->ManagerName = $request->ManagerName;
        $manager->ManagerEmail = $request->ManagerEmail;
        $manager->ManagerPhone = $request->ManagerPhone;
        $manager->ManagerRole = $request->ManagerRole;
        $manager->ManagerPassword = $request->ManagerPassword;
      $manager->save();
        return redirect('/home');
   }
    public function enableordisable($id)
    {
        $data = Product::find($id);
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
        return view('new-product-form');
    }


    public function delete($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->back();
    }
}
