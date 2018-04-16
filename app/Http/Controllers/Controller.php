<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->CheckLogin();
    }

    /**
     *
     * Check user logged/not logged in
     * @access public
     * @author Tran Thien Nhan- VietVang JSC
     */
    function checkLogin()
    {
        if (Auth::check())
        {
        }
        else{
            return redirect()->route('login.html');
        }
    }
}
