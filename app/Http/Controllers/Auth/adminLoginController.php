<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class adminLoginController extends Controller
{


    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    public function admin(request $request)
    {
    		

    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

    		return redirect('/admin');
    	}
    	toastr()->warning('Email veya şifre yanlış', 'Başarısız!');
    	return redirect('admin-giris');
    	
    }
}
