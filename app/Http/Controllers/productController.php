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
        $prod_avil_color = new ProductProdAvilColor();
        $product->prod_name = $request->prod_name;
        $product->prod_price = $request->prod_price;
        $product->prod_avil_amount = $request->prod_avil_amount;
        $product->prod_desc_img = $request->prod_desc_img;
        $product->save();
        $prod_avil_color->save();
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
