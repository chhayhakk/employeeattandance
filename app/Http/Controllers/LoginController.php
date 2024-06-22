<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;
use File;

class LoginController extends Controller
{

    public  function index(Request $request)
    {
        $user = new User();
        $intended_url = $request->session()->get('url.intended');
        session()->put('intended_url',$intended_url);
        if (Auth::check()) {
            return redirect('/admin');
        } else {
            return view('login');
        }
    }

    public function do_login(Request $request)
    {
        $user = new User();
        $this->checkValidation($request);
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
          return redirect('/admin');
        } else {
          return redirect('/login')->with('status', 'Incorrect Username or password !');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    //check validation function
    public function checkValidation($data)
    {
        $this->validate($data, [
            'name' => 'required|max:100',
            'password' => 'required|max:100',
        ]);
    }
}
