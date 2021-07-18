<?php

namespace App\Http\Controllers;

use App\Models\MainSection;
use App\Models\Measure;
use App\Models\MediaLibrary;
use App\Models\ProdAvilIn;
use App\Models\prodHasMedia;
use App\Models\Product;
use App\Models\ProductProdAvilColor;
use App\Models\SubSection;
//use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Images;
//use Intervention\Image;

//use Image;
use Intervention\Image\Facades\Image;


class productController extends Controller
{

    public $medl_id = null;

    public function index()
    {
        $displayDetailes = 1;
        $pagename = "المنتجات";
        $recordPage = "product_details";
        $formPage = "new-product-form";
        $addNew = "إضافة منتج جديد";
        $tables = 'products';
        $qry = \DB::table('product')
            ->join('sub_section', 'product.sub_id', '=', 'sub_section.sub_id')
            ->select('prod_name AS اسم المنتج', 'sub_name AS القسم الفرعي', 'prod_price AS السعر', 'product.state', 'product.fakeId')
            ->get();
        $columns = ['اسم المنتج', 'القسم الفرعي', 'السعر', 'fakeId'];
        return view('master_tables_view', ['pagename' => $pagename, 'displayDetailes' => $displayDetailes])->with('rows', $qry)->with
        ('columns', $columns)->with('tables', $tables)->with('addNew', $addNew)->with
        ('formPage', $formPage)->with('recordPage', $recordPage);
    }

    public function displayDetailes($id)
    {
        // for details

        $pagename = "عرض التفاصيل";

        $tables = 'products';

        $currentValues = Product::where("fakeId", "=", "$id")->first();
        $measures = Measure::all();
        $currentSections = SubSection::find($currentValues->sub_id);
        $sections = SubSection::all();
        $productProdAvilColor = ProductProdAvilColor::all()->where("prod_id", "=", "$currentValues->prod_id");
        $currentMeasures = ProdAvilIn::all()->where("prod_id", "=", "$currentValues->prod_id");

//        $rows = \DB::table('product')
//            ->join('sub_section', 'product.sub_id', '=', 'sub_section.sub_id')
//            ->join('media_library', 'product.medl_id', '=', 'media_library.medl_id')
//            ->join('prod_avil_in', 'product.prod_id', '=', 'prod_avil_in.prod_id')
//            ->join('measure', 'prod_avil_in.mesu_id', '=', 'measure.mesu_id')
//            ->join('product_prod_avil_color AS color', 'product.prod_id', '=', 'color.prod_id')
//            ->select('product.prod_name AS اسم المنتج', 'sub_section.sub_name AS القسم الفرعي', 'product.prod_price AS السعر',
//                'media_library.medl_img_ved AS الصورة', 'prod_avil_amount AS الكمية المتوفرة حاليًا', 'measure.mesu_value AS المقاسات',
//                'color.prod_avil_color AS الألوان', 'product.prod_desc_img AS معلومات الصورة', 'product.state', 'product.fakeId')
//            ->where("product.fakeId", "=", "$id")
//            ->get();
//        $rows = \DB::table('product')
//            ->join('sub_section', 'product.sub_id', '=', 'sub_section.sub_id')
//            ->join('prod_has_media', 'prod_has_media.prod_id' , 'product.prod_id')
//            ->join('media_library', 'prod_has_media.medl_id', '=', 'media_library.medl_id')
//            ->join('prod_avil_in', 'product.prod_id', '=', 'prod_avil_in.prod_id')
//            ->join('measure', 'prod_avil_in.mesu_id', '=', 'measure.mesu_id')
//            ->join('product_prod_avil_color AS color', 'product.prod_id', '=', 'color.prod_id')
//            ->select('product.prod_name AS اسم المنتج', 'sub_section.sub_name AS القسم الفرعي', 'product.prod_price AS السعر',
//                'media_library.medl_id AS الصورة', 'prod_avil_amount AS الكمية المتوفرة حاليًا', 'measure.mesu_value AS المقاسات',
//                'color.prod_avil_color AS الألوان', 'product.prod_desc_img AS معلومات الصورة', 'product.state', 'product.fakeId')
//            ->where("product.fakeId", "=", "$id")
//            ->groupby('اسم المنتج', 'القسم الفرعي', 'السعر','الكمية المتوفرة حاليًا','المقاسات',)
//            ->get();
//        dd($rows);

        $rows = \DB::table('product')
            ->join('prod_has_media', 'prod_has_media.prod_id' , 'product.prod_id')
            ->join('media_library', 'prod_has_media.medl_id', '=', 'media_library.medl_id')
            ->select('product.prod_name', 'media_library.medl_id')
            ->where("product.fakeId", "=", "$id")
            ->groupby('product.prod_name','media_library.medl_id')
            ->get();
//        dd($rows);
        $columns = ['اسم المنتج', 'القسم الفرعي', 'السعر', 'الصورة', 'الكمية المتوفرة حاليًا', 'المقاسات', 'الألوان', 'معلومات الصورة', 'fakeId'];

        return view('displayDetailes', ['tables' => $tables, 'pagename' => $pagename, 'measures' => $measures, 'currentMeasures' => $currentMeasures,
            'sections' => $sections, 'columns' => $columns, 'rows' => $rows, 'currentSections' => $currentSections,
            'productProdAvilColor' => $productProdAvilColor])->with('currentValues', $currentValues)->with('id', $id);
    }

    function store(Request $request)
    {
        $product = new Product();
        $measure = new Measure();

        $product->prod_name = $request->prod_name;
        $product->prod_price = $request->prod_price;
        $product->prod_avil_amount = $request->prod_avil_amount;
        $product->sub_id = $request->sub_id;
        $product->prod_desc_img = $request->prod_desc_img;
        $measure->mesu_value = $request->mesu_value;
        $max = Product::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max ? $max->fakeId + 1 : 1;
        $product->fakeId = $maxFakeId;
        $product->save();

        //*** MED SAVE **
        $medl_id = $request->input('medl_id');
        foreach ($medl_id as $medl_id) {
            $prodMedia = new prodHasMedia();
            $prodMedia->prod_id = $product->prod_id;
            $max = prodHasMedia::orderBy("fakeId", 'desc')->first(); // gets the whole row
            $maxFakeIdProdHas = $max? $max->fakeId + 1 : 1;
            $prodMedia->fakeId = $maxFakeIdProdHas;
            $prodMedia->medl_id = $medl_id;
            $prodMedia->save();
        }

        //** measure SAVE */
        $mesu_id = $request->input('mesu_id');
        foreach ($mesu_id as $mesu_id){
         $prodMesu = new ProdAvilIn();
         $prodMesu->prod_id = $product->prod_id;
         $max = ProdAvilIn::orderBy("fakeId", 'desc')->first();
         $maxFakeIdProdAvil = $max ? $max->fakeId + 1 : 1;
         $prodMesu->fakeId = $maxFakeIdProdAvil;
         $prodMesu->mesu_id = $mesu_id;
         $prodMesu->save();
        }

        return redirect('/products');
    }

    public function enableordisable($id)
    {
        $data = Product::where("fakeId", "=", "$id")->first();
        if ($data->state == false) {
            $data->state = true;
            $data->save();
        } else {
            $data->state = false;
            $data->save();
        }
        return redirect()->back();
    }

    public function insertData(Product $product){
        $measures = Measure::all();
        $sections = SubSection::all();
        $mediaLibrary = MediaLibrary::all();

        return view('new-product-form', ['measures' => $measures,
            'sections' => $sections])->with( compact('mediaLibrary'));
    }

    public function fetch_image($id, $medl_id = null)
    {
        if ($medl_id){
            $image = MediaLibrary::findOrFail($medl_id);
            $image_file = Image::make($image->medl_img_ved)->resize(60, 60);
            $response = Response::make($image_file->encode('jpeg'));
            $response->header('Content-Type', 'image/jpeg');
            return $response;
        }
        else{
            $image = MediaLibrary::findOrFail($id);
            $image_file = Image::make($image->medl_img_ved)->resize(60, 60);
            $response = Response::make($image_file->encode('jpeg'));
            $response->header('Content-Type', 'image/jpeg');
            return $response;
        }

    }


    public function delete($id)
    {
        $data = Product::where("fakeId", "=", "$id")->first();;
        $data->delete();
        return redirect('/products');
    }

///
    public function update(Request $request, Product $product, $id )
    {
        $currentValues = Product::where("fakeId", "=", "$id")->first();
        $measures = Measure::all();
        $currentSections = SubSection::find($currentValues->sub_id);
        $sections = SubSection::all();
        $productProdAvilColor = ProductProdAvilColor::all()->where("prod_id", "=", "$currentValues->prod_id");
        $currentMeasures = ProdAvilIn::all()->where("prod_id", "=", "$currentValues->prod_id");
        $mediaLibrary = MediaLibrary::all();
        $currentMedia = prodHasMedia::all()->where('prod_id','=',"$currentValues->prod_id");
//        dd($currentMedia);
//        dd($currentMedia);
//        foreach($productProdAvilColor as $productProdAvilColor){
//            dd($productProdAvilColor->prod_avil_color);
//        }
//        dd($productProdAvilColor);
//      $mediaImg = MediaLibrary::all();

        $columns = ['الصورة/رابط الفيديو'];

        $rows = \DB::table('media_library')
            ->select(\DB::raw('medl_img_ved AS "الصورة/رابط الفيديو" '))
            ->get();

        return view('new-product-form', ['measures' => $measures, 'currentMeasures' => $currentMeasures,
            'sections' => $sections, 'columns' => $columns, 'rows' => $rows, 'currentSections' => $currentSections,
            'productProdAvilColor' => $productProdAvilColor,'mediaLibrary'=>$mediaLibrary])
            ->with('currentValues', $currentValues)->with('currentMedia',$currentMedia)->with('id', $id);
//        $positions = Position::all();
//        $CurrentPosition = Position::find($currentValues->pos_id);

    }


    public function store_update(Request $request, $id)
    {
        $data = Product::where("fakeId", "=", "$id")->first();
        $color = $request->input('ColorBox');

        $all_colors = ProductProdAvilColor::all("prod_avil_color");
//        dd($all_colors);
        foreach ($all_colors as $all_colors) {
//            dd($all_colors);
            if (ProductProdAvilColor::where("prod_id", "=", "$data->prod_id")->where("prod_avil_color", "=", "$all_colors->prod_avil_color")->first() != null) {
                ProductProdAvilColor::where("prod_id", "=", "$data->prod_id")->where("prod_avil_color", "=", "$all_colors->prod_avil_color")->delete();
            }

        }

        $color2 = $request->input('ColorBox');
//        dd($color2);
        foreach ($color2 as $colors) {
            $maxFakeIdPosIN = 0;
            $productProdAvilColor = new ProductProdAvilColor();
            $productProdAvilColor->prod_id = $data->prod_id;
            $max = ProductProdAvilColor::orderBy("fakeId", 'desc')->first(); // gets the whole row
            $maxFakeIdProdColo = $max ? $max->fakeId + 1 : 1;
            $productProdAvilColor->fakeId = $maxFakeIdProdColo;
            $productProdAvilColor->prod_avil_color = $colors;
            $productProdAvilColor->save();
        }

        $mesu_id = $request->input('mesu_id');

        $all_mesu_id = Measure::all("mesu_id");

        foreach ($all_mesu_id as $all_mesu_id) {

            if (ProdAvilIn::where("prod_id", "=", "$data->prod_id")->where("mesu_id", "=", "$all_mesu_id->mesu_id")->first() != null) {
                ProdAvilIn::where("prod_id", "=", "$data->prod_id")->where("mesu_id", "=", "$all_mesu_id->mesu_id")->delete();
            }

        }

        $mesu_id2 = $request->input('mesu_id');
        foreach ($mesu_id2 as $mesu_id2) {
            $maxFakeIdPosIN = 0;
            $prodAvilIn = new ProdAvilIn();
            $prodAvilIn->prod_id = $data->prod_id;
            $max = ProdAvilIn::orderBy("fakeId", 'desc')->first(); // gets the whole row
            $maxFakeIdMeasure = $max ? $max->fakeId + 1 : 1;
            $prodAvilIn->fakeId = $maxFakeIdMeasure;
            $prodAvilIn->mesu_id = $mesu_id2;
            $prodAvilIn->save();
        }


        $data->update($request->all());


        return redirect('/products');
    }


    public function search(Request $request)
    {
        $key = trim($request->get('search'));


        $displayDetailes = 1;
        $pagename = "المنتجات";
        $recordPage = "product_details";
        $formPage = "new-product-form";
        $addNew = "إضافة منتج جديد";

        $tables = 'products';

        $qry = \DB::table('product')
            ->join('sub_section', 'product.sub_id', '=', 'sub_section.sub_id')
            ->select('prod_name AS اسم المنتج', 'sub_name AS القسم الفرعي', 'prod_price AS السعر', 'product.state', 'product.fakeId')
            ->Where('prod_name', 'LIKE', "%{$key}%")
            ->orWhere('sub_name', 'LIKE', "%{$key}%")
            ->orWhere('prod_price', 'LIKE', "%{$key}%")
            ->get();
        $col = ['اسم المنتج', 'القسم الفرعي', 'السعر', 'fakeId'];


        if (isset($_GET['btnSearch']) && $qry->isEmpty()) {
            $qry = \DB::table('product')
                ->join('sub_section', 'product.sub_id', '=', 'sub_section.sub_id')
                ->select('prod_name AS اسم المنتج', 'sub_name AS القسم الفرعي', 'prod_price AS السعر', 'product.state', 'product.fakeId')
                ->get();
            $col = ['اسم المنتج', 'القسم الفرعي', 'السعر', 'fakeId'];

            $placeHolder = "لا توجد نتائج";
        } elseif (isset($_GET['btnCancel'])) {
            $qry = \DB::table('product')
                ->join('sub_section', 'product.sub_id', '=', 'sub_section.sub_id')
                ->select('prod_name AS اسم المنتج', 'sub_name AS القسم الفرعي', 'prod_price AS السعر', 'product.state', 'product.fakeId')
                ->get();
            $col = ['اسم المنتج', 'القسم الفرعي', 'السعر', 'fakeId'];

            $placeHolder = 'Search';
        } else {
            $placeHolder = 'Search';
        }

        return view('master_tables_view', ['pagename' => $pagename, 'placeHolder' => $placeHolder,
            'displayDetailes' => $displayDetailes])->with('rows', $qry)->with
        ('columns', $col)->with('tables', $tables)->with('addNew', $addNew)->with
        ('formPage', $formPage)->with('recordPage', $recordPage)->with('key', $key);

//        return view('master_tables_view', ['pagename' => $pagename, 'placeHolder' => $placeHolder])->with('rows', $qry)->with
//        ('columns', $col)->with('tables', $tables)->with('addNew', $addNew)->with
//        ('showRecords', $showRecords)->with('formPage', $formPage)->with('recordPage', $recordPage)->with('key', $key);

    }


}
