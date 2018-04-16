<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
/*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     *
     *
     * get login page
     * @return html
     * @access public
     * @author Tran Thien Nhan- VietVang JSC
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Check login
     * @return true/false
     * @access public
     * @author Tran Thien Nhan - VietVang JSC
     */
    public function postLogin(Request $request)
    {
        #validate usename and password
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required|min:8|max:32'
        ]);

        #check username password in database
        if (Auth::attempt(['username'=>$request->username,'password'=>$request->password]))
        {
            return redirect()->route('order');
        }

        #login fail
        else
        {
            return redirect()->route('login.html')->with('message','Login fail!');
        }
    }
}
