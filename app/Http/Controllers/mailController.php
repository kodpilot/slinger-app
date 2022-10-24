<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\users;

class mailController extends Controller
{
    public function sendMail(Request $request)
    {
        
        $mailArray = [
            'name'		=>$request->name,
            'mail'		=>$request->mail,
            'tel'		=>$request->tel,
            'messages'	=>$request->messages
        ];

        Mail::send('mail.contactForm', $mailArray, function ($message) {
            $message->from("mail@kodpilot.com",  config('app.name'));
            $message->subject("İLETİŞİM FORMU");
            $message->to(getInfos()->mail1, config('app.name'));
            });
            toastr()->success('Mail gönderildi.', 'Başarılı!');

        return redirect()->route('index');
    }

    public function orderMail()
    {

        return view('admin.mail.orderMail');
    }


    public function resetPassword(Request $request){
        $user = users::where('email',$request->email)->first();
        if($user==null){
            toastr()->warning('Kullanıcı bulunamadı', 'Uyarı!');
            return redirect()->back();
        }
        $mailArray = [
            'mail'		=>$user->email,
            'token'     =>$user->token
        ];
        Mail::send('admin.mail.forgotMail', $mailArray, function ($message) use ($user) {
            $message->from("mail@kodpilot.com",  config('app.name'));
            $message->subject("Şifre yenileme");
            $message->to($user->email, config('app.name'));
        });
        toastr()->success('Mail gönderildi.', 'Başarılı!');
        return redirect()->route('login');
    }
}
