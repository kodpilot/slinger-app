<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\infos;
use App\Models\companies;
use App\Models\categories;
use App\Models\photos;
use Image;
use ImageOptimizer;

class photoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id,$iswatermark)
    {



        
        $fileName = $request->file->getClientOriginalName();

        $imageName = editFileName($fileName) . '.' . $request->file->getClientOriginalExtension();
        $img = Image::make($request->file->getRealPath());
        
        list($width, $height) = getimagesize($request->file->getRealPath());

        if($width <2200 || $height <2200){
            $size_mb= (float) number_format(filesize($request->file->getRealPath())/1000000,2);
            
            if($size_mb < 2.2){
                $img_real = $img->resize(1024, null, function ($constraint) {$constraint->aspectRatio();});  
                $img_real->save(public_path('/assets/images/photos/'.$imageName),60);
                $img_icon = $img->resize(300, null, function ($constraint) {$constraint->aspectRatio();}); 
                $img_icon->save(public_path('/assets/images/photos/icon/'.$imageName),60);
                $path = public_path('assets/images/photos/') . $imageName;
                $path_icon = public_path('assets/images/photos/icon/') . $imageName;
                ImageOptimizer::optimize($path);
                ImageOptimizer::optimize($path_icon);
                $_POST['file'] =  $imageName;
                if( isset($_POST['is_watermark']) && $_POST['is_watermark']==1 && getinfos()->watermark != null){
                    $watermark =  Image::make(public_path('assets/images/logos/'.getinfos()->watermark));
                    $img_ = Image::make(public_path('assets/images/photos/'.$imageName));
                    $img_icon_ = Image::make(public_path('assets/images/photos/icon/'.$imageName));
                    $resizePercentage = 100 - $_POST['watermark_size'];
                    $watermarkSize = round($img_->width() * ((100 - $resizePercentage) / 100), 2);
                    $watermark->opacity($_POST['watermark_opacity']);
                    $watermark->rotate($_POST['watermark_rotate']);
                    $watermark->resize($watermarkSize, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img_->insert($watermark, $_POST['watermark_position']);
                    $img_->save(public_path('assets/images/photos/'.$imageName));
                    
                    $watermarkSize = round($img_icon_->width() * ((100 - $resizePercentage) / 100), 2);
                    $watermark->resize($watermarkSize, null, function ($constraint) {
                    $constraint->aspectRatio();
                    });
                    $img_icon_->insert($watermark, $_POST['watermark_position']);
                    $img_icon_->save(public_path('assets/images/photos/icon/'.$imageName));
                }   
            }
            else{
                return response(['status'=>0],400);
            }
        }
        else{
            return response(['status'=>0],400);
        }
    unset($_POST['watermark_position']);
    unset($_POST['watermark_size']);
    unset($_POST['watermark_opacity']);
    unset($_POST['watermark_rotate']);
    unset($_POST['is_watermark']);
    array_shift($_POST);
    $ekle = photos::insert(
        ['file' => $imageName, 'company_id' => $id]
    );
    return response(['status'=>1],200);
    }


    public function order(Request $request)
    {

        parse_str($request->value, $order);
        $data = $order['item'];



        foreach ($data as $get => $id) {
            $update=photos::find($id);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$destroy = photos::find($id);


    	toastr()->success( 'İşlem başarı ile sonuçlandı!', 'Başarılı');

    	$path = public_path('assets/images/photos/').$destroy->file;
    	File::delete($path);

    	$destroy->delete();

      return redirect()->back();
  }
}
