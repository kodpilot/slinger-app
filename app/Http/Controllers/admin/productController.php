<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\products;
use App\Models\categories;
use App\Models\infos;
use App\Models\sub_categories;
use App\Models\category_options;
use App\Models\photos;
use ImageOptimizer;
use PDF;
use Image;
class productController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $products        = products::orderBy('order')->where('status', '1')->get();
    $categories      = categories::orderBy('name')->get();
    $subcategories   = sub_categories::orderBy('name')->get();
    return view('admin.products.index', compact('products', 'categories', 'subcategories'));
    
  }
  
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  { 
    
    // KEY UNSET POST
    array_shift($_POST);
    //END
    if ($request->name =='' || $request->taxPrice == '') {
      toastr()->warning('Ürün ismi ve fiyatı zorunludur', 'Uyarı');
      return redirect()->back();
    }
    // FILE PROCESS
    if ($request->hasFile('file')) {
      $fileName = $request->file->getClientOriginalName();

      $imageName = editFileName($fileName) . '.' . $request->file->getClientOriginalExtension();
      $img = Image::make($request->file->getRealPath());
      list($width, $height) = getimagesize($request->file->getRealPath());

      if($width <2200 || $height <2200){
        $size_mb= (float) number_format(filesize($request->file->getRealPath())/1000000,2);
          if($size_mb < 2.2){
            $img_real = $img->resize(1024, null, function ($constraint) {$constraint->aspectRatio();});  
            $img_real->save(public_path('/assets/images/products/'.$imageName),60);
            $img_icon = $img->resize(300, null, function ($constraint) {$constraint->aspectRatio();}); 
            $img_icon->save(public_path('/assets/images/products/icon/'.$imageName),60);
            $path = public_path('assets/images/products/') . $imageName;
            $path_icon = public_path('assets/images/products/icon/') . $imageName;
            ImageOptimizer::optimize($path);
            ImageOptimizer::optimize($path_icon);
            $_POST['file'] =  $imageName;

            if( isset($_POST['watermark']) && $_POST['watermark']==1 && getinfos()->watermark != null){
              $watermark =  Image::make(public_path('assets/images/logos/'.getinfos()->watermark));
              $img_ = Image::make(public_path('assets/images/products/'.$imageName));
              $img_icon_ = Image::make(public_path('assets/images/products/icon/'.$imageName));
              $resizePercentage = 100 - $_POST['watermark_size'];
              $watermarkSize = round($img_->width() * ((100 - $resizePercentage) / 100), 2);
              $watermark->opacity($_POST['watermark_opacity']);
              $watermark->rotate($_POST['watermark_rotate']);
              $watermark->resize($watermarkSize, null, function ($constraint) {
                  $constraint->aspectRatio();
              });

              $img_->insert($watermark, $_POST['watermark_position']);
              $img_->save(public_path('assets/images/products/'.$imageName));
              
              $watermarkSize = round($img_icon_->width() * ((100 - $resizePercentage) / 100), 2);
              $watermark->resize($watermarkSize, null, function ($constraint) {
              $constraint->aspectRatio();
              });
              $img_icon_->insert($watermark, $_POST['watermark_position']);
              $img_icon_->save(public_path('assets/images/products/icon/'.$imageName));
            }
          }
          else{
            toastr()->error('Fotoğraf Boyutu Çok Büyük < 2.2mb', 'Hata');
            return redirect()->back();
          }
      }
      else{
        toastr()->error('Fotoğraf Çözünürlüğü Çok Büyük < 2000px', 'Hata');
        return redirect()->back();
      }
      
    }


    //END

    // VARIATIONS PROCESS
    
    //END

    // CATEGORY PROCESS
    if ( isset($_POST['categories']) && $_POST['categories'] != null) {
      $last = products::orderByDesc('id')->first();
      $lastID = isset($last) ? $last->id + 1 : 1;
      foreach ($_POST['categories'] as $key) {
        $sub = isset($key['subcategory_id']) ? $key['subcategory_id'] : 0;
        if(isset( $key['category_id']) &&  $key['category_id'] != null &&  $key['category_id'] != "null"){
        $variations = array([
          'product_id'          =>  $lastID,
          'category_id'         =>  $key['category_id'],
          'subcategory_id'      =>  $sub
        ]);
        category_options::insert($variations);
      }
      }
    }
    //END
       

    


   

    // TAGS ARRAY TO STRING
    if ($_POST['tags'] != null) {
      $tags = json_decode($_POST['tags']);
      foreach ($tags as $tag => $tagValues) {
        foreach ($tagValues as $tagValue => $values) {
          $tags = array($values);
        }
      }
      $_POST['tags'] =  json_encode($tags);
    }
    //END

   


    if (isset($_POST['remember_watermark']) && $_POST['remember_watermark'] == 1 ) {
      $infos = infos::where('id',1)->first();
      $infos->watermark_opacity = $_POST['watermark_opacity'];
      $infos->watermark_position = $_POST['watermark_position'];
      $infos->watermark_size = $_POST['watermark_size'];
      $infos->watermark_rotate = $_POST['watermark_rotate'];
      $infos->save();
    }
    
    // The products table does not have these columns
    unset($_POST['iswatermark_photo']);
    unset($_POST['categories']);
    unset($_POST['watermark']);
    unset($_POST['taxPrice']);
    

    unset($_POST['watermark_position']);
    unset($_POST['watermark_size']);
    unset($_POST['watermark_opacity']);
    unset($_POST['watermark_rotate']);
    unset($_POST['remember_watermark']);


    //END
    // dd($_POST);

    $p_id = products::create($_POST);

    $last = products::orderByDesc('id')->first();
    $lastID = isset($last) ? $last->id + 1 : 1;
    $category_check = category_options::where('product_id',$p_id->id)->get();
  

    toastr()->success('İşlem başarı ile sonuçlandı!', 'Başarılı');
    return redirect()->route('product.index');
  }




  public function order(Request $request)
  {
    parse_str($request->value, $order);
    $data = $order['item'];

    foreach ($data as $get => $id) {
      $update = products::find($id);
      $update->order = $get;
      $update->save();
    }
    return response(['status'=>1],200);
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

  public function filter(Request $request,$filter_date = '2021/12/01 - 712681923')
  {

    $categories   = categories::orderBy('name')->get();
    
    if (isset($request->filter_date)) {

      $newDate = explode(' - ', $request->filter_date);
      $firstTime =  date('Y/m/d H:i:s', strtotime($newDate[0]));
      $secondTime = date('Y/m/d H:i:s', strtotime("+1 day", strtotime($newDate[1])));
      $products = products::where('status','1')->whereBetween('created_at', [$firstTime, $secondTime])->get();
    } elseif (isset($request->filter_category)) {
    
      if ($request->filter_subCategory != 0) {
    
        $products = category_options::where('subcategory_id', $request->filter_subCategory)->join('products', 'products.id', '=', 'category_options.product_id')
        ->where('products.status', '1')->get();
      } else {
        $products = category_options::where('category_id', $request->filter_category)->join('products', 'products.id', '=', 'category_options.product_id')
        ->where('products.status', '1')->get();
      }

    } elseif (isset($request->filter_name)) {
      $keyword_filter = $request->filter_name;
      $products   = products::orderBy('order')
        ->where('status','1')
        ->where(function ($query) use ($keyword_filter) {
          $query->orWhere('name', 'like', '%' . $keyword_filter . '%');
          $query->orWhere('id', 'like', '%' . $keyword_filter . '%');
          $query->orWhere('description', 'like', '%' . $keyword_filter . '%');
        })
        ->get();
    }



    return view('admin.products.index', compact('products', 'categories'));
  }



  public function add()
  {

    $last             = products::orderByDesc('id')->first();
    $new_id           = isset($last) ? $last->id + 1 : 1;
    $photos           = photos::where('product_id', $new_id)->orderBy('order')->get();
    $categories       = categories::orderBy('name')->get();

    return view('admin.products.add', compact('categories', 'new_id', 'photos'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $category_options      = category_options::where('product_id',$id)->get();
    $products              = products::orderBy('order')->get();
    $photos                = photos::where('product_id', $id)->orderBy('order')->get();
    $show                  = products::where('id', $id)->first();
    $categories            = categories::orderBy('name')->get();
    $subcategories         = sub_categories::orderBy('name')->get();

    //dd($variations);

    return view('admin.products.edit', compact('products', 'photos', 'show', 'categories','subcategories','category_options'));
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
    // dd($_POST);

    if (isset($_POST['price']) and $_POST['price'] == '') {
      $_POST['price'] = null;
    }

    if (!$request->file == null) {
      # code...

      $path = public_path('assets/images/products/') . $request->fileDelete;
      File::delete($path);
    } else {
      unset($_POST['file']);
    }

    if ($request->hasFile('file') && $request->file != null) {
      $fileName = $request->file->getClientOriginalName();

      $imageName = editFileName($fileName) . '.' . $request->file->getClientOriginalExtension();
      $img = Image::make($request->file->getRealPath());
      list($width, $height) = getimagesize($request->file->getRealPath());

      if($width <2200 || $height <2200){
        $size_mb= (float) number_format(filesize($request->file->getRealPath())/1000000,2);
          if($size_mb < 2.2){
            $img_real = $img->resize(1024, null, function ($constraint) {$constraint->aspectRatio();});  
            $img_real->save(public_path('/assets/images/products/'.$imageName),60);
            $img_icon = $img->resize(300, null, function ($constraint) {$constraint->aspectRatio();}); 
            $img_icon->save(public_path('/assets/images/products/icon/'.$imageName),60);
            $path = public_path('assets/images/products/') . $imageName;
            $path_icon = public_path('assets/images/products/icon/') . $imageName;
            ImageOptimizer::optimize($path);
            ImageOptimizer::optimize($path_icon);
            $_POST['file'] =  $imageName;
            if( isset($_POST['watermark']) && $_POST['watermark']==1 && getinfos()->watermark != null){
              $watermark =  Image::make(public_path('assets/images/logos/'.getinfos()->watermark));
              $img_ = Image::make(public_path('assets/images/products/'.$imageName));
              $img_icon_ = Image::make(public_path('assets/images/products/icon/'.$imageName));
              $resizePercentage = 100 - $_POST['watermark_size'];
              $watermarkSize = round($img_->width() * ((100 - $resizePercentage) / 100), 2);
              $watermark->opacity($_POST['watermark_opacity']);
              $watermark->rotate($_POST['watermark_rotate']);
              $watermark->resize($watermarkSize, null, function ($constraint) {
              $constraint->aspectRatio();
              });
        
              $img_->insert($watermark, $_POST['watermark_position']);
              $img_->save(public_path('assets/images/products/'.$imageName));
              $watermarkSize = round($img_icon_->width() * ((100 - $resizePercentage) / 100), 2);
              $watermark->resize($watermarkSize, null, function ($constraint) {
              $constraint->aspectRatio();
              });
              $img_icon_->insert($watermark, $_POST['watermark_position']);
              $img_icon_->save(public_path('assets/images/products/icon/'.$imageName));
            }
          }
          else{
            toastr()->error('Fotoğraf Boyutu Çok Büyük <2.2mb', 'Hata');
            return redirect()->back();
          }
      }
      else{
        toastr()->error('Fotoğraf Çözünürlüğü Çok Büyük <2000px', 'Hata');
        return redirect()->back();
      }
    }


    

    // dd($_POST);


    // dd($_POST['categories']);
    // CATEGORY PROCESS
    if ( isset($_POST['categories']) && $_POST['categories'] != null) {
      foreach ($_POST['categories'] as $key) {
        if($key['category_id']!=null){
            $sub = isset($key['subcategory_id']) ? $key['subcategory_id'] : 0;
            if( isset($key['category_option_id']) && $key['category_option_id'] !=''){
            $optionUpdate = category_options::where('id',$key['category_option_id'])->first();
            $optionUpdate->product_id = $_POST['id'];
            $optionUpdate->category_id=$key['category_id'];
            $optionUpdate->subcategory_id= $sub ;
            $optionUpdate->save();
            }
            else{
              if(isset( $key['category_id']) &&  $key['category_id'] != null &&  $key['category_id'] != "null"){
              $variations = array([
                'product_id'          =>  $_POST['id'],
                'category_id'         =>  $key['category_id'],
                'subcategory_id'      =>  $sub
              ]);
              category_options::insert($variations);
            }
            }
        }
      }
    }
    //END


   
   
    
    $update = products::find($id);
    if( isset($_POST['watermark']) && $_POST['watermark']==1 && getinfos()->watermark != null){
      $watermark =  Image::make(public_path('assets/images/logos/'.getinfos()->watermark));
      $img_ = Image::make(public_path('assets/images/products/'.$update->file));
      $img_icon_ = Image::make(public_path('assets/images/products/icon/'.$update->file));
      $resizePercentage = 100 - $_POST['watermark_size'];
      $watermarkSize = round($img_->width() * ((100 - $resizePercentage) / 100), 2);
      $watermark->opacity($_POST['watermark_opacity']);
      $watermark->rotate($_POST['watermark_rotate']);
      $watermark->resize($watermarkSize, null, function ($constraint) {
      $constraint->aspectRatio();
      });

      $img_->insert($watermark, $_POST['watermark_position']);
      $img_->save(public_path('assets/images/products/'.$update->file));
      $watermarkSize = round($img_icon_->width() * ((100 - $resizePercentage) / 100), 2);
      $watermark->resize($watermarkSize, null, function ($constraint) {
      $constraint->aspectRatio();
      });
      $img_icon_->insert($watermark, $_POST['watermark_position']);
      $img_icon_->save(public_path('assets/images/products/icon/'.$update->file));
    }

    if (isset($_POST['remember_watermark']) && $_POST['remember_watermark'] == 1 ) {
      $infos = infos::where('id',1)->first();
      $infos->watermark_opacity = $_POST['watermark_opacity'];
      $infos->watermark_position = $_POST['watermark_position'];
      $infos->watermark_size = $_POST['watermark_size'];
      $infos->watermark_rotate = $_POST['watermark_rotate'];
      $infos->save();
    }

    array_shift($_POST);
    unset($_POST['fileDelete']);
    unset($_POST['iswatermark_photo']);
    unset($_POST['categories']);
    unset($_POST['watermark']);
    unset($_POST['taxPrice']);


    unset($_POST['watermark_position']);
    unset($_POST['watermark_size']);
    unset($_POST['watermark_opacity']);
    unset($_POST['watermark_rotate']);
    unset($_POST['remember_watermark']);
    

    $update->save();

    toastr()->success('İşlem başarı ile sonuçlandı!', 'Başarılı');
    return redirect()->route('product.index');
  }

  public function deleteCategoryValue(Request $request){
    $deleteObject = category_options::where('id',$request->id)->first();
    $status = $deleteObject->delete();
    if($status){
      return response(['status'=>1],200);
    }
    else{
      return response(['status'=>0],400);
    }
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $destroy = products::find($id);

      $destroy->status = '0';
  
    $destroy->save();

    //   $path = public_path('assets/images/products/').$destroy->file;
    //   File::delete($path);

    //   $photo =photos::where('product_id',$id)->get();
    //   foreach ($photo as  $key) {
    //    $get = photos::find($key->id);
    //    $get->delete();
    //    $path = public_path('assets/images/photos/').$get->file;
    //    File::delete($path);

    //  }

    toastr()->success('İşlem başarı ile sonuçlandı!', 'Başarılı');
    return redirect()->route('product.index');
  }

  public function sort(Request $request)
  {
    $categories      = categories::orderBy('name')->get();
    $subcategories   = sub_categories::orderBy('name')->get();

    if (isset($request->order) ) {
      $order =  explode(',', $request->order);
    }
    
      $products =  products::orderBy($order[0],$order[1])->where('products.status','1')->get()->append('order',$request->order);
      return view('admin.products.index',compact('products','order','categories','subcategories'));
  }

}