<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class clientController extends Controller
{
    public function index(Client $client)
    {
        $this->authorize('view', $client);

        $pagename = "العملاء";
        $formPage = "new-client-form";
        $addNew = "إضافة عميل جديد";
        $tables = 'clients';

        $qry = \DB::table('clients')
            ->select('cla_id',\DB::raw("CONCAT(cla_frist_name, ' ',  cla_last_name) AS الاسم"),
                'cla_phone_num AS رقم الجوال','cla_email AS البريد الالكتروني','clients.state','clients.fakeId')
            ->get();
        $columns= ['الاسم','الصورة الشخصية','رقم الجوال','البريد الالكتروني','fakeId'];

        return view('master_tables_view',['pagename' => $pagename])->with('rows',$qry)->with
        ('columns', $columns)->with('tables',$tables)->with('addNew',$addNew)->with
        ('formPage',$formPage);
    }

    public function enableordisable($id, Client $client)
    {
        $this->authorize('view', $client);

        $data = Client::where("fakeId","=","$id")->first();;
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
//    public function contactinfo(){
//
//        $this->authorize('view', $client);
//
//        $tables = 'clients';
//        $columns= DB::getSchemaBuilder()->getColumnListing('clients');
//        $rows = DB::table('clients')->get();
//        return view('master_tables_view')->with('rows',$rows)->with
//        ('columns', $columns)->with('tables',$tables);
//    }

    public function insertData(Client $client){
        $this->authorize('view', $client);

        return view('new-client-form');
    }

    public function delete($id,Client $client)
    {
        $this->authorize('view', $client);


        $data = Client::where("fakeId","=","$id")->first();;
        $data->delete();
        return redirect()->back();
    }

    function fetch_image($cla_id,Client $client)
    {
        $this->authorize('view', $client);

        $image = Client::findOrFail($cla_id);
        $image_file = Image::make($image->cla_img);
        $response = Response::make($image_file->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');
        return $response;
    }

    function store(Request $request,Client $client)
    {
        $this->authorize('view', $client);

        $image = Image::make($request->file('cla_img'))->encode('jpeg');

        $data= new client();
        $data->cla_frist_name = $request->cla_frist_name;
        $data->cla_last_name = $request->cla_last_name;
        $data->cla_img = $image;
        $data->cla_phone_num = $request->cla_phone_num;
        $data->cla_email = $request->cla_img;
        $max = Client::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max? $max->fakeId + 1 : 1;
        $data->fakeId =$maxFakeId;

        $data->save();
        return redirect('/clients');
    }

    public function update(Request $request, Client $client,$id)
    {
        $this->authorize('view', $client);

        $currentValues = Client::where("fakeId","=","$id")->first();
//        $CurrentPosition = Position::find($currentValues->pos_id);

        return view('new-client-form')->with('currentValues' , $currentValues)
            ->with('id', $id);
    }



    public function store_update(Request $request, $id, Client $client){
        $this->authorize('view', $client);

        $data = Client::where("fakeId","=","$id")->first();

        $image = Image::make($request->file('cla_img'))->encode('jpeg');

        $data->cla_frist_name = $request->cla_frist_name;
        $data->cla_last_name = $request->cla_last_name;
        $data->cla_img = $image;
        $data->cla_phone_num = $request->cla_phone_num;
        $data->cla_email = $request->cla_img;
        $max = Client::orderBy("fakeId", 'desc')->first(); // gets the whole row
        $maxFakeId = $max? $max->fakeId + 1 : 1;
        $data->fakeId =$maxFakeId;

        $data->update();
        return redirect('/clients');
    }

    public function search(Request $request, Client $client){
        $this->authorize('view', $client);

        $key = trim($request->get('search'));


        $pagename = "العملاء";
        $formPage = "new-client-form";
        $addNew = "إضافة عميل جديد";
        $tables = 'clients';

        $qry = \DB::table('clients')
            ->select(\DB::raw("CONCAT(cla_frist_name, ' ',  cla_last_name) AS الاسم"),'cla_img AS الصورة الشخصية',
                'cla_phone_num AS رقم الجوال','cla_email AS البريد الالكتروني','clients.state','clients.fakeId')
            ->Where('cla_frist_name', 'LIKE', "%{$key}%")
            ->orWhere('cla_last_name', 'LIKE', "%{$key}%")
            ->orWhere('cla_img', 'LIKE', "%{$key}%")
            ->orWhere('cla_phone_num', 'LIKE', "%{$key}%")
            ->orWhere('cla_email', 'LIKE', "%{$key}%")
            ->get();
        $col= ['الاسم','الصورة الشخصية','رقم الجوال','البريد الالكتروني','fakeId'];


        if (isset($_GET['btnSearch']) && $qry->isEmpty()){
            $qry = \DB::table('clients')
                ->select(\DB::raw("CONCAT(cla_frist_name, ' ',  cla_last_name) AS الاسم"),'cla_img AS الصورة الشخصية',
                    'cla_phone_num AS رقم الجوال','cla_email AS البريد الالكتروني','clients.state','clients.fakeId')
                ->get();
            $col= ['الاسم','الصورة الشخصية','رقم الجوال','البريد الالكتروني','fakeId'];

            $placeHolder = "لا توجد نتائج";
        } elseif (isset($_GET['btnCancel'])){
            $qry = \DB::table('clients')
                ->select(\DB::raw("CONCAT(cla_frist_name, ' ',  cla_last_name) AS الاسم"),'cla_img AS الصورة الشخصية',
                    'cla_phone_num AS رقم الجوال','cla_email AS البريد الالكتروني','clients.state','clients.fakeId')
                ->get();
            $col= ['الاسم','الصورة الشخصية','رقم الجوال','البريد الالكتروني','fakeId'];

            $placeHolder = 'Search';
        }
        else{
            $placeHolder = 'Search';
        }

        return view('master_tables_view' ,['pagename' => $pagename, 'placeHolder'=> $placeHolder])->with('rows',$qry)->with
        ('columns', $col)->with('tables',$tables)->with('addNew',$addNew)->with
        ('formPage',$formPage)->with('key', $key);

    }


}
