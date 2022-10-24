<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\infos;
use App\Models\categories;
use ImageOptimizer;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories      = categories::orderBy('order')->get();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->hasFile('file')) {
            $imageName = uniqid().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('assets/images/categories/') ,$imageName);
            $_POST['file'] =  $imageName;
            $path= public_path('assets/images/categories/').$imageName;
            ImageOptimizer::optimize($path);
        }
        array_shift($_POST);
        categories::create($_POST);

        toastr()->success( 'İşlem başarı ile sonuçlandı!', 'Başarılı');
        return redirect()->back();
    }


    public function order(Request $request)
    {

        parse_str($request->value, $order);
        $data = $order['item'];



        foreach ($data as $get => $id) {
            $update=categories::find($id);
            $update->order = $get;
            $update->save();

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        if (!$request->file == null) {
    # code...

            $path = public_path('assets/images/categories/').$request->fileSil;
            File::delete($path);

        }
        else{
            unset($_POST['file']);
        }

        if ($request->hasFile('file') && $request->file != null ) {
            $imageName = uniqid().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('assets/images/categories/') ,$imageName);
            $_POST['file'] =  $imageName;
            $path= public_path('assets/images/categories/').$imageName;
            ImageOptimizer::optimize($path);
        }

        $update = categories::find($id);
        array_shift($_POST);
        unset($_POST['fileSil']);

        foreach ($_POST as $key => $value) {
            $update->$key = $value;
        }

        $update->save();

        toastr()->success( 'İşlem başarı ile sonuçlandı!', 'Başarılı');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = categories::find($id);
        if ($destroy->status == '1') {
            $destroy->status = '0';
            }
            else{
            $destroy->status = '1';
            }
            $destroy->save();


        toastr()->success( 'İşlem başarı ile sonuçlandı!', 'Başarılı');
        return redirect()->back();
    }

    public function sort(Request $request)
    {
        if (isset($request->order) ) {
            $order =  explode(',', $request->order);
        }
        
        $categories =  categories::orderBy($order[0],$order[1])->where('categories.status','1')->get()->append('order',$request->order);
        return view('admin.categories.index',compact('categories','order'));
    }
}
