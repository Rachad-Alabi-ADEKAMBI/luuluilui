<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Ad;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function view()
    {
        $lastAds = Ad::orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $mostViewedAds = Ad::orderBy('views', 'desc')
            ->take(3)
            ->get();
        $highestRatedAds = Ad::orderBy('stars', 'desc')
            ->take(3)
            ->get();

        return view(
            'home',
            compact('lastAds', 'mostViewedAds', 'highestRatedAds')
        );
    }
    static function formatText($text)
    {
        return Str::limit($text, 20, ' ...');
    }

    public function adsApi()
    {
        $data = Ad::all();

        return $data;
    }

    public function carsToSellApi()
    {
        $data = Ad::where('category', 'A vendre')->get();

        return $data;
    }

    public function carsToRentApi()
    {
        $data = Ad::where('category', 'A louer')->get();

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
        $data = DB::table('ads')
            ->select('ads.*', 'users.*')
            ->leftJoin('users', 'ads.seller_id', '=', 'users.id')
            ->where('ads.id', '=', $id)
            ->first();

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

        $ad->name = $request->input('name');
        $ad->price = $request->input('price');
        $ad->rate = $request->input('rate');
        $ad->category = $request->input('category');
        $ad->year = $request->input('year');
        $ad->color = $request->input('color');
        $ad->brand_name = $request->input('brand_name');
        $ad->description = $request->input('description');
        $ad->seller_id = auth()->id();
        $ad->status = 'Disponible';
        $ad->views = 0;
        $ad->shares = 0;

        $pic1 = $request->file('pic1');

        if ($pic1) {
            $imagename = time() . '.' . $pic1->getClientOriginalExtension();
            $pic1->move(public_path('ads'), $imagename);
            $ad->pic1 = $imagename;
        }

        for ($i = 2; $i < 8; $i++) {
            $pic = 'pic' . $i;
            $file = $request->file($pic);

            if ($file) {
                $imagename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('ads'), $imagename);
                $ad->$pic = $imagename;
            }
        }

        $ad->save();

        return redirect('/dashboard')->with(
            'success',
            'Nouvelle annonce enregistrée avec succès !'
        );
    }

    public function about()
    {
        return View('about');
    }

    public function marketplace()
    {
        return View('marketplace');
    }

    public function newAd()
    {
        return View('newAd');
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