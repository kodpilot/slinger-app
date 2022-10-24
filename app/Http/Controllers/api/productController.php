<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\photos;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return products::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $product = products::create($input);

        return response([
            'data' => $product,
            'message' => 'success'
        ],201);


    }
    public function last($cat)
    {
        return products::where('categoryID', $cat)->limit('12')->orderByDesc('id')->get();


    }

    public function photos($id)
    {
        return photos::where('product_id',$id)->get();
    }

    public function select($cat)
    {
        return products::where('categoryID', $cat)->limit('12')->orderBy('id')->get();


    }

    public function limit($cat, $start, $limit)
    {
        $product =  products::where('categoryID', $cat)->skip($start)->take($limit)->get();


        return $product;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return products::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
