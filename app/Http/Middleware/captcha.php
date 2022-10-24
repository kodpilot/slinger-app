<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class captcha
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(isset($_POST['g-recaptcha-response'])){
            $captcha=$_POST['g-recaptcha-response'];
        }
    
        if(!$captcha){
            toastr()->warning('reCaptcha failed', 'Uyarı!');
            return redirect()->back();
            }
        $secretKey = getinfos()->recaptcha_secretKey;
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        if($responseKeys["success"]) {
            return $next($request);
            }
        else{
            toastr()->warning('reCaptcha failed', 'Uyarı!');
            return redirect()->back();
            }
        
        
    }
}
