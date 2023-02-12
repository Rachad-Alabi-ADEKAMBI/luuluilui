<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;

class HomeController extends Controller
{
    public function view()
    {
        $data = Ad::limit(3)->get();

        return view('pages/home', compact('data'));
    }

    public function ads()
    {
        $data = Ad::all();

        return view('pages/ads', compact('data'));
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

    public function upload(Request $request)
    {
        $student = new student();

        $student->name = $request->name;
        $student->email = $request->email;

        $image = $request->file('image');

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->file->move('student', $imagename);
            $student->image = $imagename;
        }

        $student->save();

        return redirect()->back();
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

    public function update_view($id)
    {
        $student = student::find($id);

        return view('update_page', compact('student'));
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