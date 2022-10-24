<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\users;
use App\Models\categories;
use App\Models\products;
use App\Models\shifts;
use App\Models\photos;
use App\Models\job_users;
use App\Models\addresses; 
use App\Models\notifications;
use Illuminate\Support\Facades\Hash;



class apiController extends Controller
{
    public function index()
    {
        return response(['status'=>1,'message'=>"welcome to mobile api"]);
    }

    public function register(Request $request)
    {
        $name = $request->name;
        if ($name == null || $name == "") {
            return response(['status'=>0,'message'=>"name is required"]);
        }

        $surname = $request->surname;
        if ($surname == null || $surname == "") {
            return response(['status'=>0,'message'=>"surname is required"]);
        }
        
        $gender = $request->gender;

        $email = $request->email;
        if ($email == null || $email == "") {
            return response(['status'=>0,'message'=>"email is required"]);
        }

        $password = $request->password;
        if ($password == null || $password == "") {
            return response(['status'=>0,'message'=>"password is required"]);
        }

        $repassword = $request->repassword;
        if ($repassword == null || $repassword == "") {
            return response(['status'=>0,'message'=>"repassword is required"]);
        }

        if ($password != $repassword) {
            return response(['status'=>0,'message'=>"password and repassword not match"]);
        }

        $postcode = $request->postcode;
        if ($postcode == null || $postcode == "") {
            return response(['status'=>0,'message'=>"postcode is required"]);
        }

        $city = $request->city;
        if ($city == null || $city == "") {
            return response(['status'=>0,'message'=>"closest city is required"]);
        }
        
        $banksort = $request->banksort;
        if ($banksort == null || $banksort == "") {
            return response(['status'=>0,'message'=>"bank sort is required"]);
        }else{
            $banksort_count = strlen($banksort);
            $banksort_witout_space = strlen(str_replace(" ","",$banksort));
            if ($banksort_count != $banksort_witout_space) {
                return response(['status'=>0,'message'=>"you cant use space in bank sort"]);
            }else {
                if ($banksort_count > 6) {
                    return response(['status'=>0,'message'=>"you cannot enter more than 6 numbers."]);
                }
                if ($banksort_count < 6) {
                    return response(['status'=>0,'message'=>"you cannot enter less than 6 numbers."]);
                }
            }
        }

        $banknumber = $request->banknumber;
        if ($banknumber == null || $banknumber == "") {
            return response(['status'=>0,'message'=>"bank number is required"]);
        }else{
            $banknumber_count = strlen($banknumber);
            $banknumber_witout_space = strlen(str_replace(" ","",$banknumber));
            if ($banknumber_count != $banknumber_witout_space) {
                return response(['status'=>0,'message'=>"you cant use space in bank number"]);
            }else {
                if ($banknumber_count > 8) {
                    return response(['status'=>0,'message'=>"you cannot enter more than 8 numbers."]);
                }
                if ($banknumber_count < 8) {
                    return response(['status'=>0,'message'=>"you cannot enter less than 8 numbers."]);
                }
            }
        }

        $finder = $request->finder;
        if ($finder == null || $finder == "") {
            return response(['status'=>0,'message'=>"find about is required"]);
        }

        $tokenId = substr(uniqid(),0,8);
        $usr =  User::create([
            'name'      => $name,
            'surname'   => $surname,
            'email'     => $email,
            'gender'    => $gender,
            'password'  => Hash::make($password),
            'postcode'  => $postcode,
            'city'      => $city,
            'banksort'  => $banksort,
            'banknumber'=> $banknumber,
            'finder'    => $finder,
            'token'     => $tokenId
        ]);
        $usr->api_private = $usr->id .'-' .uniqid();
        $usr->api_public = Hash::make($usr->api_private);
        $usr->save();
        return response(['status'=>1,'message'=>"successfully registered",'user_id'=>$usr->id,'user_key'=>$usr->api_public]);
    }

    public function registerCompany(Request $request)
    {
        $name = $request->name;
        if ($name == null || $name == "") {
            return response(['status'=>0,'message'=>"name is required"]);
        }
        $description = $request->description;
        if ($description == null || $description == "") {
            return response(['status'=>0,'message'=>"description is required"]);
        }
        $text = $request->text;
        if ($text == null || $text == "") {
            return response(['status'=>0,'message'=>"long description is required"]);
        }
        $photos = $request->photos;
        if ($photos == null || $photos == "") {
            return response(['status'=>0,'message'=>"photos is required"]);
        }
        $file = $request->file;
        if ($file == null || $file == "") {
            return response(['status'=>0,'message'=>"file is required"]);
        }
        $company = products::create([
            'name' => $name,
            'description' => $description,
            'text' => $text,
            'file' => $file,
        ]);
        $company->save();

        foreach ($photos as $photo) {
            $photos = photos::create([
                'file' => $photo,
                'product_id' => $company->id,
            ]);
        }
        

    }

    public function login(Request $request)
    {
        $email = $request->email;
        if($email == null || $email == ""){
            return response(['status'=>0,'message'=>"email is required"]);
        }
        $pwd = $request->password;
        if($pwd == null || $pwd == ""){
            return response(['status'=>0,'message'=>"password is required"]);
        }
        $user = User::where('email',$email)->first();
        if($user == null){
            return response(['status'=>0,'message'=>"user not found"]);
        }
        if(!Hash::check($pwd, $user->password)){
            return response(['status'=>0,'message'=>"password is incorrect"]);
        }
        $user->api_private = $user->id .'-' .uniqid();
        $user->api_public = Hash::make($user->api_private);
        $user->save();
        return response(['status'=>1,'message'=>"Login Succeessfully",'user_id'=>$user->id,'user_key'=>$user->api_public]);
    }  

    public function categories(Request $request)
    {
        $user_id = $request->header('user-id');
        $categories = categories::get();
        return response(['status'=>1,'message'=>"category page",'user_id'=>$user_id,'categories'=>$categories]);
    }
    public function shiftCreate(Request $request)
    {
        $company_id = $request->company_id;
        if ($company_id == null || $company_id == "") {
            return response(['status'=>0,'message'=>"company id is required"]);
        }
        $name = $request->name;
        if ($name == null || $name == "") {
            return response(['status'=>0,'message'=>"name is required"]);
        }
        $location = $request->location;
        if ($location == null || $location == "") {
            return response(['status'=>0,'message'=>"location is required"]);
        }
        $start_time = $request->start_time;
        if ($start_time == null || $start_time == "") {
            return response(['status'=>0,'message'=>"start time is required"]);
        }
        $end_time = $request->end_time;
        if ($end_time == null || $end_time == "") {
            return response(['status'=>0,'message'=>"end time is required"]);
        }
        $shift_date = $request->shift_date;
        if ($shift_date == null || $shift_date == "") {
            return response(['status'=>0,'message'=>"shift date time is required"]);
        }
        $shift = shifts::create([
            'company_id' => $company_id,
            'name' => $name,
            'location' => $location,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'shift_date' => $shift_date
        ]);
    }
    public function shiftConfirm(Request $request)
    {
        $user_id = $request->user_id;
        if ($user_id == null || $user_id == "") {
            return response(['status'=>0,'message'=>"user id is required"]);
        }
        $shift_id = $request->shift_id;
        if ($shift_id == null || $shift_id == "") {
            return response(['status'=>0,'message'=>"shift id is required"]);
        }
        $shift = shifts::create([
            'user_id' => $user_id,
            'shift_id' => $shift_id
        ]);
    }
    public function shifts(Request $request)
    {
        return shifts::where('deleted','0')->where('status','0')->get();
    }
    public function userPasswordUpdate(Request $request)
    {
        $current_password = $request->current_password;
        if ($password == null || $password == "") {
            return response(['status'=>0,'message'=>"Current password is required"]);
        }

        $password = $request->password;
        if ($password == null || $password == "") {
            return response(['status'=>0,'message'=>"password is required"]);
        }

        $repassword = $request->repassword;
        if ($repassword == null || $repassword == "") { 
            return response(['status'=>0,'message'=>"repassword is required"]);
        }
        $user = users::where('id',$request->user_id)->first();
        if (!Hash::check($user->password,$request->current_password)) {
            return response(['status'=>0,'message'=>"Current password is wrong"]);
        }
        $user->password = Hash::make($request->password);
        $user->save();
    }
    public function userEmailUpdate(Request $request)
    {
        $current_email = $request->current_email;
        if ($current_email == null || $current_email == "") {
            return response(['status'=>0,'message'=>"Current email is required"]);
        }

        $new_email = $request->new_email;
        if ($new_email == null || $new_email == "") {
            return response(['status'=>0,'message'=>"New email is required"]);
        }
        $user = users::where('id',$request->user_id)->first();
        $password = $request->password;
        if ($password == null || $password == "") {
            return response(['status'=>0,'message'=>"Password is required"]);
        }
        if (!Hash::check($user->password,$request->password)) {
            return response(['status'=>0,'message'=>"Current password is wrong"]);
        }
        $user->mail = $request->email;
        $user->save();
    }
    public function userBankUpdate(Request $request)
    {
        $bank_number = $request->bank_number;
        if ($bank_number == null || $bank_number == "") {
            return response(['status'=>0,'message'=>"bank number is required"]);
        }
        $bank_sort = $request->bank_sort;
        if ($bank_sort == null || $bank_sort == "") {
            return response(['status'=>0,'message'=>"bank sort is required"]);
        }
        $user = users::where('id',$request->user_id)->first();
        $password = $request->password;
        if ($password == null || $password == "") {
            return response(['status'=>0,'message'=>"Password is required"]);
        }
        if (!Hash::check($user->password,$request->password)) {
            return response(['status'=>0,'message'=>"Current password is wrong"]);
        }
        $user->banksort = $request->bank_sort;
        $user->banknumber = $request->bank_number;
        $user->save();
    }
    public function userContactUpdate(Request $request)
    {
        $name = $request->name;
        if ($name == null || $name == "") {
            return response(['status'=>0,'message'=>"name is required"]);
        }
        $lastname = $request->lastname;
        if ($name == null || $name == "") {
            return response(['status'=>0,'message'=>"lastname is required"]);
        }
        $phone_number = $request->phone_number;
        if ($phone_number == null || $phone_number == "") {
            return response(['status'=>0,'message'=>"phone number is required"]);
        }
        $address = $request->address;
        if ($address == null || $address == "") {
            return response(['status'=>0,'message'=>"address is required"]);
        }
        $user = users::where('id',$request->user_id)->first();
        $user_address = addresses::where('user_id',$request->user_id)->first();
        $user_address->address = $request->address;
        $user_address->save();
        $user->name = $request->name;
        $user->surname = $request->lastname;
        $user->tel = $request->phone_number;
        $user->save();
    }
    public function userProfile(Request $request)
    {
        $user = users::where('id',$request->user_id)->first();
        $user_rating = users_rating::where('user_id',$request->user_id)->get();
        return response(['user_id'=>$usr->id,'user_key'=>$usr->api_public,'user'=>$user,'rating'=>$user_rating]);
    }
    public function notifications(Request $request)
    {
        $notifications = notifications::where('user_id',$request->user_id)->get();
        return response(['status'=>1,'notifications'=>$notifications]);
    }
    public function siteCreate(Request $request)
    {
        $site_name = $request->site_name;
        if ($site_name == null || $site_name == "") {
            return response(['status'=>0,'message'=>"site name is required"]);
        }
        $street_address = $request->street_address;
        if ($street_address == null || $street_address == "") {
            return response(['status'=>0,'message'=>"street address is required"]);
        }
        $postcode = $request->postcode;
        if ($postcode == null || $postcode == "") {
            return response(['status'=>0,'message'=>"postcode is required"]);
        }
        $uniform = $request->uniform;
        if ($uniform == null || $uniform == "") {
            return response(['status'=>0,'message'=>"uniform is required"]);
        }
        $cuisine = $request->cuisine;
        if ($cuisine == null || $cuisine == "") {
            return response(['status'=>0,'message'=>"cuisine is required"]);
        }
        $type_of_setup = $request->type_of_setup;
        if ($type_of_setup == null || $type_of_setup == "") {
            return response(['status'=>0,'message'=>"type of setup is required"]);
        }
        $notes = $request->notes;
        if ($notes == null || $notes == "") {
            return response(['status'=>0,'message'=>"notes is required"]);
        }

        $site = create::create([
            'site_name' => $site_name,
            'street_address' => $street_address,
            'postcode' => $postcode,
            'uniform' => $uniform,
            'cuisine' => $cuisine,
            'type_of_setup' => $type_of_setup,
            'notes' => $notes
        ]);
    }
    public function sites(Request $request)
    {
        $sites = sites::where('company_id',$company_id)->get();
        return response(['status'=>1,'user_id'=>$user_id,'sites'=>$sites]);
    } 
}
