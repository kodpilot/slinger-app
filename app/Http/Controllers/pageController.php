<?php

namespace App\Http\Controllers;

use App\Models\infos;
use Illuminate\Http\Request;

class pageController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */

  public function __construct()
  {
    $infos = infos::where('id', 1)->first();
    if (getInfos()->status == 0) {
      $this->middleware('abort');
    }
  }
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */


  public function index(Request $request)
  {
    return view('themes.' . getInfos()->theme . '.index');
  }
}
