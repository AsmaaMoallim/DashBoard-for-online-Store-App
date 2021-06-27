<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\manager;
use phpDocumentor\Reflection\Types\Void_;
class testController extends Controller
{
    public function index()
    {
        $manager = manager::all();
        return view('test-form', ['managers' => $manager]);
        // return view('test-form')->with('managers', $manager);
    }
}
