<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\addresses;
use App\Models\users;
use App\Models\asistans;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        toastr()->success('Giriş yapıldı.', 'Başarılı');
        $tokenId = substr(uniqid(),0,8);
        $mailArray = [ 
            'name'    => $data['name'].' '.$data['surname'],
            'tel'     => $data['tel'],
            'mail'    => $data['email'],
            'token'   => $tokenId
        ];

        sendMail('admin.mail.userMail', $mailArray, 'user');

        Mail::send('admin.mail.registerMail', $mailArray, function ($message) use ($data) {
            $message->from(env('MAIL_FROM_ADDRESS'), config('app.name'));
            $message->subject('Hesap Doğrulama');
            $message->to($data['email'], config('app.name'));
            // $message->to('ens.do@hotmail.com', config('app.name'));

        });

        $asistans = array([
            'description' => 'Yeni bir kullanıcı aramıza katıldı'.'<br>',
            'description2' => $data['name'].' '.$data['surname']
        ]);
        asistans::insert($asistans);

        $get = users::latest('id')->first();

        return User::create([
            'name'      => $data['name'],
            'surname'   => $data['surname'],
            'email'     => $data['email'],
            'tel'       => $data['tel'],
            'password'  => Hash::make($data['password']),
            'token'     => $tokenId
        ]);

         
    }
    
}
