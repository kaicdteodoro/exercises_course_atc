<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use phpDocumentor\Reflection\Types\Never_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function photo(Request $request)
    {
        $request->validate(['photo' => 'required|mimes:jpg,png']);
        $path = $request->photo->storeAs('public', 'file.jpg');
        Storage::url($path);
        return redirect()->route('home');
//        (["success" => true, "data" => $data], 302);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function photoForm()
    {
        return view('photo-save');
    }

    /**
     * Show the application hello view.
     *
     * @param string|null $name
     * @return View
     */
    public function hello(string $name = null): View
    {
        return view('hello', compact('name'));
    }

    /**
     * Verify a energy calculate and return response on the application dbz view.
     *
     * @param float|null $energy
     * @return View
     */
    public function energy(float $energy = null): View
    {
        return view('dbz', compact('energy'));
    }
}
