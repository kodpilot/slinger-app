<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\sessionPopups;
use App\Models\sub_categories;


class postController extends Controller
{
    public function index(Request $request){
        
        array_shift($_POST);
        $ekle = sessionPopups::insert($_POST);

        return redirect()->back();
    }
    public function getsubCategory(Request $request){
        $subs = sub_categories::where('category_id',$request->categoryID2)->where('status',1)->orderby('order')->get();
        return response($subs,200);
    }
}
