<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\users;
use App\Models\roles;
use ImageOptimizer;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users           = users::orderByDesc('id')->where('active', '1')->paginate(80);
        $roles           = roles::get();

    	return view('admin.users.users',compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */






    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);


    	if ($request->password == $request->password_confirmation) {
    		$_POST['password'] = Hash::make($_POST['password']);
    		unset($_POST['password_confirmation']);

    		if ($request->hasFile('file')) {
    			$imageName = uniqid().'.'.$request->file->getClientOriginalExtension();
    			$request->file->move(public_path('assets/images/users/') ,$imageName);
    			$_POST['file'] =  $imageName;
    			$path= public_path('assets/images/users/').$imageName;
    			ImageOptimizer::optimize($path);
    		}

            if (isset($_POST['status'])) {
              $_POST['status']='1';
            }

    		array_shift($_POST);

    		users::insert($_POST);


    		toastr()->success( 'İşlem başarı ile sonuçlandı!', 'Başarılı');
    	}else{

    		toastr()->warning( 'Şifreler uyuşmuyor', 'Başarısız');

    	}

        return redirect()->back();
    }


    public function order(Request $request)
    {




    }

    public function active($mail, $token)
    { 
      $user = users::where('email', $mail)->where('token', $token)->first();
      $tokenId = substr(uniqid(),0,8);
      if ($user!= null) {
        $user->status = '1';
        $user->token = $tokenId;
        $user->save();
      }
      toastr()->success('Email adresiniz onaylandı...','Teşekkürler!');
      return redirect()->route('index');
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

    		$path = public_path('assets/images/users/').$request->fileSil;
    		File::delete($path);

    	}
    	else{
    		unset($_POST['file']);
    	}

    	if ($request->hasFile('file') && $request->file != null ) {
    		$imageName = uniqid().'.'.$request->file->getClientOriginalExtension();
    		$request->file->move(public_path('assets/images/users/') ,$imageName);
    		$_POST['file'] =  $imageName;
    		$path= public_path('assets/images/users/').$imageName;
    		ImageOptimizer::optimize($path);
    	}



    	$update = users::find($id);
    	if ($update->status == 0 && $request->status == true) {
    		$_POST['status'] = '1';
    	}elseif($update->status == 1 && $request->status == false){
    		$_POST['status'] = '0';
    	}else{
    		unset($_POST['status']);
    	}

        if ($update->admin == 0 && $request->admin == true) {
            $_POST['admin'] = '1';
        }elseif($update->admin == 1 && $request->admin == false){
            $_POST['admin'] = '0';
        }else{
            unset($_POST['admin']);
        }

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
   	$destroy = users::find($id);
   	if ($destroy->active == '1') {
           $destroy->active = '0';
           }
           else{
           $destroy->active = '1';
           }
           $destroy->save();
   	toastr()->success( 'İşlem başarı ile sonuçlandı!', 'Başarılı');
       return redirect()->back();
   }
   public function filter(Request $request)
   {
     $roles     = roles::get();
     if (isset($request->filter_date)) {
       $newDate = explode(' - ', $request->filter_date);

       $firstTime =  date('Y/m/d H:i:s', strtotime($newDate[0]));
       $secondTime = date('Y/m/d H:i:s', strtotime("+1 day", strtotime($newDate[1])));
       $users     = users::whereBetween('created_at',[$firstTime,$secondTime])->get();
     }
     elseif (isset($request->filter_name)) {
       $users     = users::where('status','1')
       ->where('name',   'like', '%' . $request->filter_name . '%')
       ->orWhere('surname', 'like', '%' . $request->filter_name . '%')
       ->orWhere('email', 'like', '%' . $request->filter_name . '%')
       ->get();
     }else{
       $users     = users::get();
     }
     
     return view('admin.users.users',compact('users','roles'));
   }
   public function collectiveDelete(Request $request)
   {
     
     if (isset($_POST['total_check'])) {
       foreach ($_POST['total_check'] as $key => $value) {
         $destroy = users::find($value);
         if ($destroy->active == '1') {
         $destroy->active = '0';
         }
         else{
         $destroy->active = '1';
         }
         $destroy->save();
       }
     }
     toastr()->success('İşlem başarı ile sonuçlandı!', 'Başarılı');
     return redirect()->back();
   }
   public function sort(Request $request)
   {
    $roles           = roles::get();
    if (isset($request->order) ) {
      $order =  explode(',', $request->order);
    }
    
      $users =  users::orderBy($order[0],$order[1])->where('users.active','1')->get()->append('order',$request->order);
      return view('admin.users.users',compact('users','roles','order'));
   }

   public function getLimitedUser(Request $request)

   {
      $limit = $request->limit;
      $users = users::where('active','1')->limit($request->limit)->orderByDesc('id')->get();
      $roles           = roles::get();

    	return view('admin.users.users',compact('users','roles','limit'));
   }
}
