<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function index()
    {
        $active='dashboard';
        return view('admin.index',compact('active'));
    }
    public function LoginView()
    {
        return view('admin.login');
    }
    public function AdminLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);
        // create our user data for the authentication
		$userdata = array(
				'email' => $request->get('email'),
				'password' => $request->get('password')
            );
            return view('admin/dashboard');
            $remember_me = (!empty($request->remember)) ? true : false;
        // attempt to do the login
        if (Auth::attempt($userdata, $remember_me)) {
            $user = auth()->user();
            return redirect('admin/dashboard');
        } else {
            return back()->with('error', 'Error! Invalid Email or Password.');
        }
    }
}
