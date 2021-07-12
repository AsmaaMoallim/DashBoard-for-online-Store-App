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
        $pagename = "المنتجات";
        $recordPage = "product_details";
        $formPage = "new-product-form";
        $addNew = "إضافة منتج جديد";
        $showRecords = "عرض التفاصيل";
        $tables = 'products';
        $qry = \DB::table('product')
            ->join('sub_section', 'product.sub_id', '=', 'sub_section.sub_id')
            ->select('prod_name AS اسم المنتج', 'sub_name AS القسم الفرعي', 'prod_price AS السعر', 'product.state','product.fakeId')
            ->get();
        $columns = ['اسم المنتج', 'القسم الفرعي', 'السعر', 'fakeId'];
        return view('master_tables_view',['pagename' => $pagename])->with('rows', $qry)->with
        ('columns', $columns)->with('tables', $tables)->with('addNew', $addNew)->with
        ('showRecords', $showRecords)->with('formPage', $formPage)->with('recordPage', $recordPage);
    }

    public function display(){
        // for details

        $pagename = "عرض التفاصيل";

        $tables = 'products';

        $qry = \DB::table('product')
            ->join('sub_section', 'product.sub_id', '=', 'sub_section.sub_id')
            ->join('media_library', 'product.medl_id', '=', 'media_library.medl_id')
            ->join('prod_avil_in', 'product.prod_id', '=', 'prod_avil_in.prod_id')
            ->join('measure', 'prod_avil_in.mesu_id', '=', 'measure.mesu_id')
            ->join('product_prod_avil_color AS color', 'product.prod_id', '=', 'color.prod_id')

            ->select('product.prod_name AS اسم المنتج' , 'sub_section.sub_name AS القسم الفرعي', 'product.prod_price AS السعر',
                'media_library.medl_img_ved AS الصورة','prod_avil_amount AS الكمية المتوفرة حاليًا','measure.mesu_value AS المقاسات',
                'color.prod_avil_color AS الألوان المتاحة','product.prod_desc_img AS معلومات الصورة','product.state','product.fakeId')
            ->get();
        $columns=['اسم المنتج','القسم الفرعي','السعر','الصورة','الكمية المتوفرة حاليًا','المقاسات','الألوان المتاحة','معلومات الصورة','fakeId'];

        return view('master_tables_view',['pagename' => $pagename])->with('rows', $qry)->with
        ('columns', $columns)->with('tables', $tables);

    }

        function store(Request $request)
    {
        $product = new Product();
        $prod_avil_color = new ProductProdAvilColor();
        $measure = new Measure();
        $product->prod_name = $request->prod_name;
        $product->prod_price = $request->prod_price;
        $product->prod_avil_amount = $request->prod_avil_amount;
        $product->sub_id = $request->sub_id;
        $measure->mesu_value = $request->mesu_value;
        $product->medl_id = $request->medl_id;
        $product->prod_desc_img = $request->prod_desc_img;
        $max = Product::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max? $max->fakeId + 1 : 1;
        $product->fakeId = $maxFakeId;
        $product->save();
        $prod_avil_color->save();
        return redirect('/home');
   }

    public function enableordisable($id)
    {
        $data = Product::where("fakeId","=","$id")->first();
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
        $data = Product::where("fakeId","=","$id")->first();;
        $data->delete();
        return redirect()->back();
    }
///
    public function update(Request $request, manager $manager,$id)
    {
        $positions = Position::all();
        $currentValues = Manager::where("fakeId","=","$id")->first();
        $CurrentPosition = Position::find($currentValues->pos_id);

        return view('new-manager-form',['positions' => $positions, 'CurrentPosition' =>$CurrentPosition])->with('currentValues' , $currentValues)
            ->with('id', $id);
    }



    public function store_update(Request $request, $id){
        $data = Manager::where("fakeId","=","$id")->first();
        $data->update($request->all());
        return redirect('/manager');
    }

}
