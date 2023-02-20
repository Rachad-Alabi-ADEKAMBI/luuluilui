<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Ad;

class HomeController extends Controller
{
    public function view()
    {
        $data = Ad::limit(3)->get();

        return view('home', compact('data'));
    }

    static function formatText($text)
    {
        return Str::limit($text, 20, ' ...');
    }

    public function ads()
    {
        $data = Ad::all();

        return view('ads', compact('data'));
    }

    public function dashboard()
    {
        $data = Ad::all();

        return view('dashboard', compact('data'));
    }

    public function ad($id)
    {
        $data = Ad::find($id);

        return view('ad', compact('data'));
    }

    public function myAds()
    {
        $id = 3;

        //  $data = Ad::where('seller_id', $id)->get();
        $data = Ad::find($id);
        $datas = compact('data');

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        //   echo json_encode($datas, JSON_UNESCAPED_UNICODE);
        return $datas;
    }

    public function upload(Request $request)
    {
        $ad = new Ad();

        $ad->name = $request->name;
        $ad->price = $request->price;
        $ad->rate = $request->rate;
        $ad->category = $request->category;
        $ad->year = $request->year;
        $ad->color = $request->color;
        $ad->brand_name = $request->brand_name;
        $ad->status = 'Disponible';

        /*   $image = $request->file('image');

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->file->move('student', $imagename);
            $ad->image = $imagename;
        }
        */

        $ad->save();

        return redirect()->back();
    }

    /*
    public function index()
    {
        return View('home');
    }

    public function welcome()
    {
        return View('welcome');
    }





    public function delete($id)
    {
        $data = student::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $data = student::where('name', 'Like', '%' . $search . '%')
            ->orWhere('email', 'Like', '%' . $search . '%')
            ->get();
        return view('display', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $student = student::find($id);

        $student->name = $request->name;
        $student->email = $request->email;

        $image = $request->file;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->file->move('student', $imagename);

            $student->image = $imagename;
        }

        $student->save();

        return redirect()->back();
    }
    */
}