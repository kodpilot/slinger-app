<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sliders;
use App\Models\User;
use App\Models\addresses;
use Illuminate\Support\Facades\Hash;

class ecommerceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function sliders()
    {
        return sliders::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

         $mailArray = [ 
            'name'    => $_POST['name'].' '.$_POST['surname'],
            'tel'     => $_POST['tel'],
            'mail'    => $_POST['email'],
            'address' => $_POST['address'].' '.$_POST['city']
        ];

        sendMail('admin.mail.userMail', $mailArray, 'user');
        $get = User::latest('id')->first();
        if (isset($_POST['address'])) {
        
        addresses::create([
            'name'      =>  $_POST['name'],
            'surname'   =>  $_POST['surname'],
            'address'   =>  $_POST['address'],
            'town'      =>  $_POST['town'],
            'city'      =>  $_POST['city'],
            'mail'      =>  $_POST['email'],
            'tel'       =>  $_POST['tel'],
            'user_id'   =>  $get->id+1,
            
        ]);
         }else{
            addresses::create([
            'name'      => $_POST['name'],
            'surname'   => $_POST['surname'],
            'user_id'   => $get->id+1
            
        ]);
         }

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

           

           User::create([
            'name'      => $_POST['name'],
            'surname'   => $_POST['surname'],
            'email'     => $_POST['email'],
            'password'  => Hash::make($_POST['password'])
        ]);

            
           $result = 1;
        }else{
            
            $result = 0;
            
        }

        $user        = User::latest('id')->first();


        return response([
            'data' => $user,
            'result' => $result
        ]);
    }

     public function login()
    {
        return sliders::all();
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
