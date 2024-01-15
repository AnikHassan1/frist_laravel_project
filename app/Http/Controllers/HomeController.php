<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Facade\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
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
    public function passwordChange()
    {
        return view('layouts.passwordChange');
    }
    public function verificationresend()
    {
        return redirect('/home');
    }
    //_password-update_//
    public function update(Request $request)
    {
        $request->validate([
            'current_password' =>'required',
            'new_password' => 'required|string|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user=Auth::user();
        if(hash::check($request->current_password,$user->password)){
           $data=array([
            'password'=>hash::make($request->current_password),
           ]);
           DB::table("users")->where('id',Auth::id())->update($data);
            return redirect()->back()->with('success','success password change');
        }else{
            return redirect()->back()->with('error','current Password Not Match');
        }
    }
}
