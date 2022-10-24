<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str; 
use App\Models\infos;
use App\Models\works;
use ImageOptimizer;

class workController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $works      	= works::orderBy('order')->get();
        $infos        	= infos::where('id',1)->first();


        return view('admin.works')
        ->with('works', $works)
        ->with('infos', $infos);
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
            $request->file->move(public_path('assets/images/works/') ,$imageName);
            $_POST['file'] =  $imageName;
            $path= public_path('assets/images/works/').$imageName;
            ImageOptimizer::optimize($path);
        }
        array_shift($_POST);

        $ekle = works::insert($_POST);
        
        toastr()->success( 'İşlem başarı ile sonuçlandı!', 'Başarılı');
        $works      = works::orderBy('order')->get();
        $infos        = infos::where('id',1)->first();


        return view('admin.works')
        ->with('works', $works)
        ->with('infos', $infos);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {

     parse_str($request->value, $order);
     $data = $order['item'];



     foreach ($data as $get => $id) {
        $update=works::find($id);
        $update->order = $get;
        $update->save();

    }

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
        $works      = works::orderBy('order')->get();
        $infos        = infos::where('id',1)->first();
        $show         = works::where('id',$id)->first();  
        return view('admin.works')
        ->with('show', $show)
        ->with('works', $works)
        ->with('infos', $infos);
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

            $path = public_path('assets/images/works/').$request->fileSil;
            File::delete($path);

        }
        else{
            unset($_POST['file']);
        }

        if ($request->hasFile('file') && $request->file != null ) {
            $imageName = uniqid().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('assets/images/works/') ,$imageName);
            $_POST['file'] =  $imageName;
            $path= public_path('assets/images/works/').$imageName;
            ImageOptimizer::optimize($path);
        }

        $update = works::find($id);
        array_shift($_POST);
        unset($_POST['fileSil']);

        foreach ($_POST as $key => $value) {
            $update->$key = $value;
        }

        $update->save();

        toastr()->success( 'İşlem başarı ile sonuçlandı!', 'Başarılı');

        $works      = works::orderBy('order')->get();
        $infos        = infos::where('id',1)->first();
        return view('admin.works')
        ->with('works', $works)
        ->with('infos', $infos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $destroy = works::find($id);
       $destroy->delete();

       toastr()->success( 'İşlem başarı ile sonuçlandı!', 'Başarılı');
       $works      = works::orderBy('order')->get();
       $infos        = infos::where('id',1)->first();
       return view('admin.works')
       ->with('works', $works)
       ->with('infos', $works);
   }
}
