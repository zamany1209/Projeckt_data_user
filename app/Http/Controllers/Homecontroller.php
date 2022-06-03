<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\user_s_;
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

    public function new_user()
    {
        return view('New_user');
    }

    public function new_user_save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'family' => 'required',
            'phone' => 'required|min:11|max:13'
        ],[
            'name.required' => 'لطفا نام خود را وارد کنید',
            'family.required' => 'لطفا نام خانوادگی خود را وارد کنید',
            'phone.required' => 'لطفا شماره تلفن خود را وارد کنید',
            'phone.min' => 'شماره تلفن شما کمتر از حد مجاز است',
            'phone.max' => 'شماره تلفن شما بیشتر از حد مجاز است',
        ]);
    }
}
