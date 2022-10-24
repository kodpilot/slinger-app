<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\infos;
use ImageOptimizer;

class infoController extends Controller
{


     /**
     * Display a listing of the resource.


     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {

     	$infos        = infos::where('id',1)->first();
     	return view('admin.infos',compact('infos'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    	if (!$request->logo == null) {
    # code...

    		$path = public_path('assets/images/logos/').$request->logoDelete;
    		File::delete($path);

    	}
    	if (!$request->favicon == null) {
    # code...

    		$path = public_path('assets/images/logos/').$request->faviconDelete;
    		File::delete($path);

    	}

    	if ($request->hasFile('logo') && $request->logo != null) {
    		$imageName = uniqid().'.'.$request->logo->getClientOriginalExtension();
    		$request->logo->move(public_path('assets/images/logos/') ,$imageName);
    		$_POST['logo'] =  $imageName;
    		$path= public_path('assets/images/logos/').$imageName;
    		ImageOptimizer::optimize($path);
    	}

    	if ($request->hasFile('favicon') && $request->favicon != null) {

    		$imageName = uniqid().'.'.$request->favicon->getClientOriginalExtension();

    		$request->favicon->move(public_path('assets/images/logos/') ,$imageName);
    		$_POST['favicon'] =  $imageName;

    		$path= public_path('assets/images/logos/').$imageName;
    		ImageOptimizer::optimize($path);
    	}
        if ($request->hasFile('watermark') && $request->watermark != null) {

    		$imageName = uniqid().'.'.$request->watermark->getClientOriginalExtension();

    		$request->watermark->move(public_path('assets/images/logos/') ,$imageName);
    		$_POST['watermark'] =  $imageName;

    		$path= public_path('assets/images/logos/').$imageName;
    		ImageOptimizer::optimize($path);
    	}

    	$update = infos::find(1);

    	if ($update->status == 1 && $request->status == true) {
    		$_POST['status'] = '0';
    	}elseif($update->status == 0 && $request->status == false){
    		$_POST['status'] = '1';
    	}else{
    		unset($_POST['status']);
    	}

        if(isset($request->status)=="on"){
            $update->status = '0';
        }
        else{
            $update->status = '1';
        }
    	array_shift($_POST);
    	unset($_POST['faviconDelete']);
    	unset($_POST['status']);
    	unset($_POST['logoDelete']);
        unset($_POST['watermarkDelete']);

    	foreach ($_POST as $key => $value) {
    		$update->$key = $value;
    	}

    	$update->save();

    	toastr()->success( 'İşlem başarı ile sonuçlandı!', 'Başarılı');
    	$infos   = infos::where('id',1)->first();
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
        //
    }
}
