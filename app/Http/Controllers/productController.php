<?php

namespace App\Http\Controllers;

use App\Models\MainSection;
use App\Models\Measure;
use App\Models\MediaLibrary;
use App\Models\Product;
use App\Models\ProductProdAvilColor;
use App\Models\SubSection;
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

        function store(Request $request)
    {
        $product = new Product();
        $prod_avil_color = new ProductProdAvilColor();
        $measure = new Measure();
        $product->prod_id = 100;
        $product->prod_name = $request->prod_name;
        $product->prod_price = $request->prod_price;
        $product->prod_avil_amount = $request->prod_avil_amount;
        $product->sub_id = $request->sub_id;
        $measure->mesu_value = $request->mesu_value;
        $product->medl_id = $request->medl_id;
        $product->prod_desc_img = $request->prod_desc_img;
        $product->state = 0;
        $product->fakeId = 1;
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
        $measures = Measure::all();
        $sections = SubSection::all();
//      $mediaImg = MediaLibrary::all();

        $columns =['الصورة/رابط الفيديو'];

        $rows = \DB::table('media_library')
            ->select(\DB::raw('medl_img_ved AS "الصورة/رابط الفيديو" ') )
            ->get();

        return view('new-product-form', ['measures' => $measures,
            'sections' => $sections, 'columns'=>$columns, 'rows'=>$rows]);
    }


    public function delete($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->back();
    }
}
