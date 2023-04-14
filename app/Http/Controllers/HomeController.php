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

        // $data2 = Ad::where('category', 'Electronics')->get();

        return view('ads', compact('data'));
    }

    public function adsApi()
    {
        $data = Ad::all();

        return $data;
    }

    public function footerAds()
    {
        $data = Ad::orderBy('id', 'desc')
            ->limit(2)
            ->get();

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function dashboard()
    {
        $data = Ad::all();

        return view('dashboard', compact('data'));
    }

    public function ad($id)
    {
        $data = Ad::find($id);

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function adView($id)
    {
        $data = Ad::find($id);

        return view('ad', compact('data'));
    }

    public function myAds()
    {
        $userId = auth()->id();

        $data = Ad::where('seller_id', $userId)->get();

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        return json_encode($data, JSON_UNESCAPED_UNICODE);
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

    public function about()
    {
        return View('about');
    }

    public function contact()
    {
        return View('contact');
    }

    public function cgu()
    {
        return View('cgu');
    }

    public function policy()
    {
        return View('policy');
    }

    /*
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