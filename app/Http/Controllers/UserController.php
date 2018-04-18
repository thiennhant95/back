<?php
/**
 * Created by Nhan Viet Vang
 * Date: 04/17/2018
 * Time: 1:13 PM
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
/**
 ***************************************************************************
 * Controller management User
 ***************************************************************************
 *
 * This is a controller management User
 *
 ***************************************************************************
 * @author: Nhan Viet Vang
 *****************************************
 **/
class UserController extends Controller
{

    protected $UserRepository;
    public function __construct()
    {
        $this->UserRepository = new UserRepository;
    }


    /**
     * return view login
     * @access public
     * @author Nhan- VietVang JSC
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Login
     * @access public
     * @author Nhan- VietVang JSC
     */
    public function postLogin(Request $request)
    {
        #validate
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required|min:6|max:100'
        ],[
            'username.required'=>'Username is not empty',
            'password.required'=>'Password is not empty',
            'password.min'     =>'Password of at least 6 characters',
            'password.max'     =>'Maximum password of 32 characters'
        ]);
        #check exist user true/ false
        $password = $request->password;
        if (Auth::attempt(['username'=>$request->username,'password'=>$password]))
        {
            return redirect('inquiries');
        }
        else
        {
            return redirect('login.html')->with('message','User or Password incorrect. Please enter again!');
        }
    }

    /**
     * Log out
     * @access public
     * @author Nhan- VietVang JSC
     */
    public function getLogOut()
    {
        Auth::logout();
        return Redirect::to('login.html');
    }
}