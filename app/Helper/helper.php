<?php

use App\Models\products;
use App\Models\carts;
use App\Models\sub_menus;
use App\Models\menus;
use App\Models\panelMenus;
use App\Models\subPanelMenus;
use App\Models\banners;
use App\Models\categories;
use App\Models\infos;
use App\Models\reviews;
use App\Models\favorites;
use App\Models\contracts;
use App\Models\permissions;
use App\Models\colors;
use App\Models\photos;
use App\Models\asistans;
use App\Models\orderUpdates;
use App\Models\variationValues;
use App\Models\roles;
use App\Models\category_options;
use App\Models\User;
use App\Models\blogs;
use App\Models\payments;
use App\Models\currencies;
use App\Models\popups;
use App\Models\sub_categories;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

function getPopup(){
    $popups = popups::where('status','1')->orderByDesc('id')->get();
    return $popups;
}
function getRoleActions($id){
    $permissions = permissions::where('role_id', $id)->get();
    return $permissions;
}
function getRoleActionName($menu_id,$status_id){
    if($status_id==1){
        return panelMenus::where('id',$menu_id)->first()->name;
    }
    if ($status_id==2) {
        if (subPanelMenus::where('id',$menu_id)->first() == null) {
        }
        return subPanelMenus::where('id',$menu_id)->first()->name;

    }
}
function getRoleAction($menu_id,$status_id){
    if($status_id==1){
        return panelMenus::where('id',$menu_id)->first();
    }
    if ($status_id==2) {
        if (subPanelMenus::where('id',$menu_id)->first() == null) {
        }
        return subPanelMenus::where('id',$menu_id)->first();

    }
}

function getRoleName($role_id){
    $role = roles::where('id',$role_id)->first();
    return $role != null ? $role->name : 'NaN';
}

function getPhotos($id){
    return photos::where('product_id',$id)->get();
}

function checkHaveSub($id){
    $check = subPanelMenus::where('is_dropdown','1')->where('subpanelmenus_id',$id)->get();
    return $check;
}

function menuPermission($menu_id)
{
    $permissions = permissions::where('menuStatu', '1')->where('role_id', Auth::user()->admin)->where('menu_id', $menu_id)->count();
    if ($permissions > 0) {
        return true;
    } else {
        return false;
    }
}


function subMenuPermission($menu_id)
{

    $permissions = permissions::where('menuStatu', '2')->where('role_id', Auth::user()->admin)->where('menu_id', $menu_id)->count();
    if ($permissions > 0) {
        return true;
    } else {
        return false;
    }
}

function getRole()
{

    $role = roles::find(Auth::user()->admin);

    return $role->name;
}

function getRating($rate = 0, $dark = 'fa fa-star', $light='fa fa-star-o')
{

    if ($rate == 0) {
        return '<li style="list-style:none"><i class="'.$light.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$light.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$light.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$light.'"aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$light.'" aria-hidden="true"></i></li>';
    } elseif ($rate == 1) {
        return '<li style="list-style:none"><i class="'.$dark.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$light.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$light.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$light.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$light.'" aria-hidden="true"></i></li>';
    } elseif ($rate == 2) {
        return '<li style="list-style:none"><i class="'.$dark.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$dark.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$light.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$light.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$light.'" aria-hidden="true"></i></li>';
    } elseif ($rate == 3) {
        return '<li style="list-style:none"><i class="'.$dark.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$dark.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$dark.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$light.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$light.'" aria-hidden="true"></i></li>';
    } elseif ($rate == 4) {
        return '<li style="list-style:none"><i class="'.$dark.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$dark.'"aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$dark.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$dark.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$light.'" aria-hidden="true"></i></li>';
    } else {
        return '<li style="list-style:none"><i class="'.$dark.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$dark.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$dark.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$dark.'" aria-hidden="true"></i></li>
		<li style="list-style:none"><i class="'.$dark.'" aria-hidden="true"></i></li>';
    }
}

function getCaptcha(){

    $captcha = '<div class="g-recaptcha" data-sitekey="'.getinfos()->recaptcha_sitekey.'"> </div><script src="https://www.google.com/recaptcha/api.js" async defer></script>';

    return $captcha;
}

function editFileName($str)
{
    $str = pathinfo($str, PATHINFO_FILENAME);
    $str = strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'),
  array('', '-', ''), $str));
    $date = date('d-m-Y-H-i-s');
    return $date.'_'.$str;
}


function getReviews($id,$limit=null)
{
    if ($limit != null and $id==0) {
        $reviews      = reviews::select(
            'reviews.subject as subject',
            'reviews.description as description',
            'reviews.rating as rating',
            'users.name as name',
            'users.surname as surname',
            'reviews.created_at as created_date',
        )->join('users', 'users.id', '=', 'reviews.user_id')->orderByDesc('reviews.id')->limit($limit)->get();
    }else{
        $reviews      = reviews::select(
            'reviews.subject as subject',
            'reviews.description as description',
            'reviews.rating as rating',
            'users.name as name',
            'users.surname as surname',
            'reviews.created_at as created_date',
        )->where('product_id', $id)->join('users', 'users.id', '=', 'reviews.user_id')->orderByDesc('reviews.id')->get();

    }

   

    return $reviews;
}


function getRate($rate)
{
    $result = $rate * 100 / 5;

    return $result . '%';
}

function getTotalRate($id)
{
    $rateTotal      = reviews::where('product_id', $id)->avg('rating');
    return $rateTotal;
}


function getTags($tag)
{

    $tags = explode(',', $tag);
    return $tags;
}



function getInfos()
{
    $infos = infos::find(1);

    return $infos;
}

function sendMail($path, $mailArray, $subject)
{

    if ($subject == 'order') {

        Mail::send($path, $mailArray, function ($message) {
            $message->from("mail@kodpilot.com", config('app.name'));
            $message->subject('Sipariş Geldi!');
            $message->to(getInfos()->mail1, config('app.name'));
            // $message->to('ens.do@hotmail.com', config('app.name'));

        });
    }

    if ($subject == 'user') {

        Mail::send($path, $mailArray, function ($message) {
            $message->from("mail@kodpilot.com", config('app.name'));
            $message->subject('Yeni Bir Üyeniz Var!');
            $message->to(getInfos()->mail1, config('app.name'));
            //$message->to('ens.do@hotmail.com', config('app.name'));

        });
    }
}

// BEGIN:ADMIN GET SINGLE
function getSingleProduct($id)
{
    return products::where('id', $id)->get()->first();
}
function getSingleProductid($name)
{
    return products::where('name', $name)->get()->first();
}
function getSingleCategory($id)
{
    return categories::where('id', $id)->get()->first();
}
function getSingleSubCategory($id)
{
    return sub_categories::where('id', $id)->get()->first();
}
function getSingleUser($id)
{
    return User::where('id', $id)->get()->first();
}
function getSingleUserid($name)
{
    return User::where('name', $name)->get()->first();
}
function getSingleBlogid($title)
{
    return blogs::where('title', $title)->get()->first();
}
function getSingleBlog($id)
{
    return blogs::where('id', $id)->get()->first();
}
// END:ADMIN GET SINGLE


function getProduct($id){
    return products::where('id',$id)->first();
}



function getBanners($page, $position, $limit)
{


    return banners::where('page', $page)->where('position', $position)->limit($limit)->orderBy('order')->where('status','1')->get();
}

function getFilterVariations($products){
    $collections = collect();
    $variation_name = collect();
    foreach ($products as $product) {
       
       $variations =  getVariations($product->id);
       foreach ($variations as $variation) {
        $collections->push($variation);
       }
      
    }

    $dizi = json_decode($collections->groupBy('variation_name'));
    foreach ($dizi  as $key => $value) {

        $variation_name->push($key);
    }


    return $variation_name;

}
function getFilterVariationValues($variation_name){

    return variationValues::where('variation_name', $variation_name)->select('value')->groupBy('value')->get();

}


function getVariations($product_id)
{
    
    $variations =  variationValues::where('product_id', $product_id)->select('variation_name')->groupBy('variation_name')->get();

     return $variations;

}

function getVariationValues($product_id, $variation_name)
{

    return variationValues::where('product_id', $product_id)->where('variation_name', $variation_name)->get();
}


// BEGIN::GET PRODUCTS FUNCTIONS

function lastProducts($limit)
{


    return products::limit($limit)->orderByDesc('id')->where('status','1')->get();
}
function choosenProducts($limit)
{


    return products::where('choosen', '1')->limit($limit)->orderByDesc('id')->where('status','1')->get();
}
function bestsellersProducts($limit)
{


    return products::where('bestsellers', '1')->limit($limit)->orderByDesc('id')->where('status','1')->get();
}
function discountProducts($limit)
{


    return products::where('discount', '1')->limit($limit)->orderByDesc('id')->where('status','1')->get();
}
function topratedProducts($limit)
{


    return products::where('toprated', '1')->limit($limit)->orderByDesc('id')->where('status','1')->get();
}

function getProducts($limit, $id = null ,$id2 = null)
{

    if ($id2 != null) {
        return  category_options::where('subcategory_id',$id2)->join('products', 'products.id', '=' , 'category_options.product_id')->limit($limit)->where('products.status','1')->get();
    }elseif($id != null){
        
        return  category_options::where('category_id',$id)->join('products', 'products.id', '=' , 'category_options.product_id')->limit($limit)->where('products.status','1')->get();
    }else{
        
        return  products::where('status','1')->orderByDesc('id')->where('products.status','1')->get();
    }
 
}

// END::GET PRODUCTS FUNCTIONS

// BEGIN:: COLOR FUNCTIONS
function getColorCode($color){
    $obj = colors::where('color',$color)->first();
    if(isset($obj) && $obj != null){
        return $obj->code;
    }
    else{
        return '';
    }
}
// END:: COLOR FUNCTIONS

// BEGIN:: ANALYTİCS FUNCTIONS

function convertHowToJoin($str){
    switch ($str) {
        case "cpc":
            return "Reklam";
            break;
        case "referral":
            return "Yönlendirme";
            break;
        case "organic":
            return "Organik";
            break;
        default:
            return "Direkt";
            break;
    }
}

function whichSiteRedirected($str){
    switch ($str) {
        case "google":
            return "Google";
            break;
        case "youtube.com":
            return "Youtube";
            break;
        case "l.instagram.com":
            return "İnstagram";
            break;
        case "t.co":
            return "Twitter";
            break;
        case "yandex":
            return "Yandex";
            break;
        case "youtube.com":
            return "Youtube";
            break;
        default:
            return "Direkt";
            break;
    }
}

function RedirectedSiteIcon($str){
    switch ($str) {
        case "Youtube":
            return '<!--begin::Svg Icon | path: assets/media/icons/duotune/social/soc007.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M21 6.30005C20.5 5.30005 19.9 5.19998 18.7 5.09998C17.5 4.99998 14.5 5 11.9 5C9.29999 5 6.29998 4.99998 5.09998 5.09998C3.89998 5.19998 3.29999 5.30005 2.79999 6.30005C2.19999 7.30005 2 8.90002 2 11.9C2 14.8 2.29999 16.5 2.79999 17.5C3.29999 18.5 3.89998 18.6001 5.09998 18.7001C6.29998 18.8001 9.29999 18.8 11.9 18.8C14.5 18.8 17.5 18.8001 18.7 18.7001C19.9 18.6001 20.5 18.4 21 17.5C21.6 16.5 21.8 14.9 21.8 11.9C21.8 9.00002 21.5 7.30005 21 6.30005ZM9.89999 15.7001V8.20007L14.5 11C15.3 11.5 15.3 12.5 14.5 13L9.89999 15.7001Z" fill="black"/>
            </svg></span>
            <!--end::Svg Icon-->';
            break;
        case "Facebook":
            return '<!--begin::Svg Icon | path: assets/media/icons/duotune/social/soc004.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="black"/>
            <path d="M13.643 9.36206C13.6427 9.05034 13.7663 8.75122 13.9864 8.53052C14.2065 8.30982 14.5053 8.18559 14.817 8.18506H15.992V5.23999H13.643C13.1796 5.24052 12.7209 5.33229 12.293 5.51013C11.8651 5.68798 11.4764 5.94841 11.1491 6.27649C10.8219 6.60457 10.5625 6.99389 10.3857 7.42224C10.209 7.85059 10.1183 8.30956 10.119 8.77295V11.718H7.769V14.663H10.119V21.817C11.2812 22.0479 12.4762 22.0604 13.643 21.854V14.663H15.992L17.167 11.718H13.643V9.36206Z" fill="black"/>
            </svg></span>
            <!--end::Svg Icon-->';
            break;

        case "İnstagram":
            return '<!--begin::Svg Icon | path: assets/media/icons/duotune/social/soc005.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3" d="M22 8.20267V15.7027C22 19.1027 19.2 22.0026 15.7 22.0026H8.2C4.8 22.0026 2 19.2027 2 15.7027V8.20267C2 4.80267 4.8 2.0026 8.2 2.0026H15.7C19.2 1.9026 22 4.70267 22 8.20267ZM12 7.30265C9.5 7.30265 7.39999 9.40262 7.39999 11.9026C7.39999 14.4026 9.5 16.5026 12 16.5026C14.5 16.5026 16.6 14.4026 16.6 11.9026C16.6 9.30262 14.5 7.30265 12 7.30265ZM17.9 5.0026C17.3 5.0026 16.9 5.4026 16.9 6.0026C16.9 6.6026 17.3 7.0026 17.9 7.0026C18.5 7.0026 18.9 6.6026 18.9 6.0026C18.9 5.5026 18.4 5.0026 17.9 5.0026Z" fill="black"/>
            <path d="M12 17.5026C8.9 17.5026 6.39999 15.0026 6.39999 11.9026C6.39999 8.80259 8.9 6.30261 12 6.30261C15.1 6.30261 17.6 8.80259 17.6 11.9026C17.6 15.0026 15.1 17.5026 12 17.5026ZM12 8.30261C10 8.30261 8.39999 9.90259 8.39999 11.9026C8.39999 13.9026 10 15.5026 12 15.5026C14 15.5026 15.6 13.9026 15.6 11.9026C15.6 9.90259 14 8.30261 12 8.30261Z" fill="black"/>
            </svg></span>
            <!--end::Svg Icon-->';
            break;
        case "Twitter":
            return '<!--begin::Svg Icon | path: assets/media/icons/duotune/social/soc006.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3" d="M19.0003 4.40002C18.2003 3.50002 17.1003 3 15.8003 3C14.1003 3 12.5003 3.99998 11.8003 5.59998C11.0003 7.39998 11.9004 9.49993 11.2004 11.2999C10.1004 14.2999 7.80034 16.9 4.90034 17.9C4.50034 18 3.80035 18.2 3.10035 18.2C2.60035 18.3 2.40034 19 2.90034 19.2C4.40034 19.8 6.00033 20.2 7.80033 20.2C15.8003 20.2 20.2004 13.5999 20.2004 7.79993C20.2004 7.59993 20.2004 7.39995 20.2004 7.19995C20.8004 6.69995 21.4003 6.09993 21.9003 5.29993C22.2003 4.79993 21.9003 4.19998 21.4003 4.09998C20.5003 4.19998 19.7003 4.20002 19.0003 4.40002Z" fill="black"/>
            <path d="M11.5004 8.29997C8.30036 8.09997 5.60034 6.80004 3.30034 4.50004C2.90034 4.10004 2.30037 4.29997 2.20037 4.79997C1.60037 6.59997 2.40035 8.40002 3.90035 9.60002C3.50035 9.60002 3.10037 9.50007 2.70037 9.40007C2.40037 9.30007 2.00036 9.60004 2.10036 10C2.50036 11.8 3.60035 12.9001 5.40035 13.4001C5.10035 13.5001 4.70034 13.5 4.30034 13.6C3.90034 13.6 3.70035 14.1001 3.90035 14.4001C4.70035 15.7001 5.90036 16.5 7.50036 16.5C8.80036 16.5 10.1004 16.5 11.2004 15.8C12.7004 14.9 13.9003 13.2001 13.8003 11.4001C13.9003 10.0001 13.1004 8.39997 11.5004 8.29997Z" fill="black"/>
            </svg></span>
            <!--end::Svg Icon-->';
            break;
        case "Google":
            return '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="30" height="30"
            viewBox="0 0 30 30"
            style=" fill:#000000;">    <path d="M 15.003906 3 C 8.3749062 3 3 8.373 3 15 C 3 21.627 8.3749062 27 15.003906 27 C 25.013906 27 27.269078 17.707 26.330078 13 L 25 13 L 22.732422 13 L 15 13 L 15 17 L 22.738281 17 C 21.848702 20.448251 18.725955 23 15 23 C 10.582 23 7 19.418 7 15 C 7 10.582 10.582 7 15 7 C 17.009 7 18.839141 7.74575 20.244141 8.96875 L 23.085938 6.1289062 C 20.951937 4.1849063 18.116906 3 15.003906 3 z"></path></svg>';
            break;
        case "Yandex":
            return '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="48" height="48"
            viewBox="0 0 48 48"
            style=" fill:#000000;"><path fill="#ed2224" d="M21.413,47.315c1.685,0.076,3.206-0.076,4.891,0c-0.383-4.097,0.719-8.451,0.297-12.544 c-0.118-1.142,0.076-2.779,0.171-3.924c0.102-1.229,1.069-3.553,1.533-4.696c3.541-8.731,5.77-15.742,8.924-24.62 c-1.548-0.029-3.702,0.029-5.25,0c-2.934,7.419-5.846,15.183-8.022,22.859c-3.659-6.121-5.157-12.182-7.055-18.386 c-0.13-0.424-0.284-0.885-0.66-1.12c-0.247-0.154-0.549-0.183-0.839-0.205c-1.56-0.118-3.126-0.149-4.689-0.09 c3.636,7.742,6.793,16.44,9.267,24.628c0.411,1.36,0.806,2.729,1.013,4.134c0.218,1.48,0.447,2.718,0.453,4.213 C21.456,40.451,21.403,44.429,21.413,47.315z"></path><path fill="#010101" d="M37.228,1.033c-1.75-0.028-3.5,0.028-5.25,0C31.74,1.029,31.577,1.194,31.496,1.4 c-2.823,7.142-5.525,14.344-7.685,21.717c-2.11-3.802-3.592-7.875-4.862-12.033c-0.335-1.095-0.659-2.193-0.986-3.291 c-0.27-0.904-0.439-2.011-0.95-2.815c-0.522-0.821-1.483-0.798-2.35-0.848c-1.315-0.076-2.633-0.086-3.95-0.041 c-0.401,0.014-0.593,0.409-0.432,0.752c2.538,5.416,4.725,10.992,6.675,16.645c1.884,5.463,3.992,11.069,3.99,16.917 c0,2.97-0.043,5.941-0.034,8.911c0.001,0.199,0.102,0.33,0.234,0.406c0.072,0.051,0.156,0.09,0.266,0.094 c1.631,0.063,3.261-0.063,4.891,0c0.253,0.01,0.523-0.238,0.5-0.5c-0.29-3.347,0.333-6.672,0.39-10.014 c0.026-1.503-0.185-2.988-0.088-4.49c0.082-1.276,0.2-2.483,0.603-3.701c0.908-2.743,2.12-5.396,3.142-8.098 c1.122-2.965,2.185-5.951,3.229-8.944c1.21-3.467,2.4-6.941,3.629-10.402C37.822,1.351,37.533,1.038,37.228,1.033z M30.286,19.685 c-1.051,2.814-2.242,5.576-3.274,8.396c-0.426,1.163-0.695,2.274-0.806,3.505c-0.061,0.682-0.122,1.366-0.138,2.051 c-0.018,0.764,0.083,1.516,0.114,2.278c0.148,3.64-0.621,7.255-0.403,10.893c-1.288-0.021-2.575,0.037-3.862,0.015 c0.012-5.353,0.438-10.808-0.961-16.031c-1.566-5.848-3.647-11.615-5.86-17.245c-1.123-2.857-2.331-5.681-3.617-8.468 c0.98-0.018,1.96-0.013,2.939,0.038c0.445,0.023,1.19-0.067,1.573,0.2c0.355,0.247,0.446,0.872,0.561,1.249 c0.612,2.017,1.195,4.043,1.828,6.053c1.316,4.174,2.906,8.253,5.146,12.025c0.22,0.371,0.796,0.295,0.914-0.119 c2.174-7.647,4.961-15.101,7.878-22.492c1.403,0.014,2.805-0.007,4.208,0C34.444,7.916,32.47,13.838,30.286,19.685z"></path></svg>';
            break;
        case "Direkt":
            return '<!--begin::Svg Icon | path: assets/media/icons/duotune/coding/cod007.svg-->
            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3" d="M18.4 5.59998C18.7766 5.9772 18.9881 6.48846 18.9881 7.02148C18.9881 7.55451 18.7766 8.06577 18.4 8.44299L14.843 12C14.466 12.377 13.9547 12.5887 13.4215 12.5887C12.8883 12.5887 12.377 12.377 12 12C11.623 11.623 11.4112 11.1117 11.4112 10.5785C11.4112 10.0453 11.623 9.53399 12 9.15698L15.553 5.604C15.9302 5.22741 16.4415 5.01587 16.9745 5.01587C17.5075 5.01587 18.0188 5.22741 18.396 5.604L18.4 5.59998ZM20.528 3.47205C20.0614 3.00535 19.5074 2.63503 18.8977 2.38245C18.288 2.12987 17.6344 1.99988 16.9745 1.99988C16.3145 1.99988 15.661 2.12987 15.0513 2.38245C14.4416 2.63503 13.8876 3.00535 13.421 3.47205L9.86801 7.02502C9.40136 7.49168 9.03118 8.04568 8.77863 8.6554C8.52608 9.26511 8.39609 9.91855 8.39609 10.5785C8.39609 11.2384 8.52608 11.8919 8.77863 12.5016C9.03118 13.1113 9.40136 13.6653 9.86801 14.132C10.3347 14.5986 10.8886 14.9688 11.4984 15.2213C12.1081 15.4739 12.7616 15.6039 13.4215 15.6039C14.0815 15.6039 14.7349 15.4739 15.3446 15.2213C15.9543 14.9688 16.5084 14.5986 16.975 14.132L20.528 10.579C20.9947 10.1124 21.3649 9.55844 21.6175 8.94873C21.8701 8.33902 22.0001 7.68547 22.0001 7.02551C22.0001 6.36555 21.8701 5.71201 21.6175 5.10229C21.3649 4.49258 20.9947 3.93867 20.528 3.47205Z" fill="black"/>
            <path d="M14.132 9.86804C13.6421 9.37931 13.0561 8.99749 12.411 8.74695L12 9.15698C11.6234 9.53421 11.4119 10.0455 11.4119 10.5785C11.4119 11.1115 11.6234 11.6228 12 12C12.3766 12.3772 12.5881 12.8885 12.5881 13.4215C12.5881 13.9545 12.3766 14.4658 12 14.843L8.44699 18.396C8.06999 18.773 7.55868 18.9849 7.02551 18.9849C6.49235 18.9849 5.98101 18.773 5.604 18.396C5.227 18.019 5.0152 17.5077 5.0152 16.9745C5.0152 16.4413 5.227 15.93 5.604 15.553L8.74701 12.411C8.28705 11.233 8.28705 9.92498 8.74701 8.74695C8.10159 8.99737 7.5152 9.37919 7.02499 9.86804L3.47198 13.421C2.52954 14.3635 2.00009 15.6417 2.00009 16.9745C2.00009 18.3073 2.52957 19.5855 3.47202 20.528C4.41446 21.4704 5.69269 21.9999 7.02551 21.9999C8.35833 21.9999 9.63656 21.4704 10.579 20.528L14.132 16.975C14.5987 16.5084 14.9689 15.9544 15.2215 15.3447C15.4741 14.735 15.6041 14.0815 15.6041 13.4215C15.6041 12.7615 15.4741 12.108 15.2215 11.4983C14.9689 10.8886 14.5987 10.3347 14.132 9.86804Z" fill="black"/>
            </svg></span>
            <!--end::Svg Icon-->';
            break;
        default:
            return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3" d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z" fill="black" />
            <path d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z" fill="black" />
        </svg>';
            break;
    }
}
function code_to_country( $code ){

    $code = strtoupper($code);

    $countryList = array(
        "AFGHANISTAN" => "AF",
        "ALAND ISLANDS" => "AX",
        "ALBANIA" => "AL",
        "ALGERIA" => "DZ",
        "AMERICAN SAMOA" => "AS",
        "ANDORRA" => "AD",
        "ANGOLA" => "AO",
        "ANGUILLA" => "AI",
        "ANTARCTICA" => "AQ",
        "ANTIGUA AND BARBUDA" => "AG",
        "ARGENTINA" => "AR",
        "ARMENIA" => "AM",
        "ARUBA" => "AW",
        "AUSTRALIA" => "AU",
        "AUSTRIA" => "AT",
        "AZERBAIJAN" => "AZ",
        "BAHAMAS THE" => "BS",
        "BAHRAIN" => "BH",
        "BANGLADESH" => "BD",
        "BARBADOS" => "BB",
        "BELARUS" => "BY",
        "BELGIUM" => "BE",
        "BELIZE" => "BZ",
        "BENIN" => "BJ",
        "BERMUDA" => "BM",
        "BHUTAN" => "BT",
        "BOLIVIA" => "BO",
        "BOSNIA AND HERZEGOVINA" => "BA",
        "BOTSWANA" => "BW",
        "BOUVET ISLAND (BOUVETOYA)" => "BV",
        "BRAZIL" => "BR",
        "BRITISH INDIAN OCEAN TERRITORY (CHAGOS ARCHIPELAGO)" => "IO",
        "BRITISH VIRGIN ISLANDS" => "VG",
        "BRUNEI DARUSSALAM" => "BN",
        "BULGARIA" => "BG",
        "BURKINA FASO" => "BF",
        "BURUNDI" => "BI",
        "CAMBODIA" => "KH",
        "CAMEROON" => "CM",
        "CANADA" => "CA",
        "CAPE VERDE" => "CV",
        "CAYMAN ISLANDS" => "KY",
        "CENTRAL AFRICAN REPUBLIC" => "CF",
        "CHAD" => "TD",
        "CHILE" => "CL",
        "CHINA" => "CN",
        "CHRISTMAS ISLAND" => "CX",
        "COCOS (KEELING) ISLANDS" => "CC",
        "COLOMBIA" => "CO",
        "COMOROS THE" => "KM",
        "CONGO" => "CD",
        "CONGO THE" => "CG",
        "COOK ISLANDS" => "CK",
        "COSTA RICA" => "CR",
        "COTE D'IVOIRE" => "CI",
        "CROATIA" => "HR",
        "CUBA" => "CU",
        "CYPRUS" => "CY",
        "CZECH REPUBLIC" => "CZ",
        "DENMARK" => "DK",
        "DJIBOUTI" => "DJ",
        "DOMINICA" => "DM",
        "DOMINICAN REPUBLIC" => "DO",
        "ECUADOR" => "EC",
        "EGYPT" => "EG",
        "EL SALVADOR" => "SV",
        "EQUATORIAL GUINEA" => "GQ",
        "ERITREA" => "ER",
        "ESTONIA" => "EE",
        "ETHIOPIA" => "ET",
        "FAROE ISLANDS" => "FO",
        "FALKLAND ISLANDS (MALVINAS)" => "FK",
        "FIJI THE FIJI ISLANDS" => "FJ",
        "FINLAND" => "FI",
        "FRANCE, FRENCH REPUBLIC" => "FR",
        "FRENCH GUIANA" => "GF",
        "FRENCH POLYNESIA" => "PF",
        "FRENCH SOUTHERN TERRITORIES" => "TF",
        "GABON" => "GA",
        "GAMBIA THE" => "GM",
        "GEORGIA" => "GE",
        "GERMANY" => "DE",
        "GHANA" => "GH",
        "GIBRALTAR" => "GI",
        "GREECE" => "GR",
        "GREENLAND" => "GL",
        "GRENADA" => "GD",
        "GUADELOUPE" => "GP",
        "GUAM" => "GU",
        "GUATEMALA" => "GT",
        "GUERNSEY" => "GG",
        "GUINEA" => "GN",
        "GUINEA-BISSAU" => "GW",
        "GUYANA" => "GY",
        "HAITI" => "HT",
        "HEARD ISLAND AND MCDONALD ISLANDS" => "HM",
        "HOLY SEE (VATICAN CITY STATE)" => "VA",
        "HONDURAS" => "HN",
        "HONG KONG" => "HK",
        "HUNGARY" => "HU",
        "ICELAND" => "IS",
        "INDIA" => "IN",
        "INDONESIA" => "ID",
        "IRAN" => "IR",
        "IRAQ" => "IQ",
        "IRELAND" => "IE",
        "ISLE OF MAN" => "IM",
        "ISRAEL" => "IL",
        "ITALY" => "IT",
        "JAMAICA" => "JM",
        "JAPAN" => "JP",
        "JERSEY" => "JE",
        "JORDAN" => "JO",
        "KAZAKHSTAN" => "KZ",
        "KENYA" => "KE",
        "KIRIBATI" => "KI",
        "KOREA" => "KR",
        "KUWAIT" => "KW",
        "KYRGYZ REPUBLIC" => "KG",
        "LAO" => "LA",
        "LATVIA" => "LV",
        "LEBANON" => "LB",
        "LESOTHO" => "LS",
        "LIBERIA" => "LR",
        "LIBYA" => "LY",
        "LIECHTENSTEIN" => "LI",
        "LITHUANIA" => "LT",
        "LUXEMBOURG" => "LU",
        "MACAO" => "MO",
        "MACEDONIA" => "MK",
        "MADAGASCAR" => "MG",
        "MALAWI" => "MW",
        "MALAYSIA" => "MY",
        "MALDIVES" => "MV",
        "MALI" => "ML",
        "MALTA" => "MT",
        "MARSHALL ISLANDS" => "MH",
        "MARTINIQUE" => "MQ",
        "MAURITANIA" => "MR",
        "MAURITIUS" => "MU",
        "MAYOTTE" => "YT",
        "MEXICO" => "MX",
        "MICRONESIA" => "FM",
        "MOLDOVA" => "MD",
        "MONACO" => "MC",
        "MONGOLIA" => "MN",
        "MONTENEGRO" => "ME",
        "MONTSERRAT" => "MS",
        "MOROCCO" => "MA",
        "MOZAMBIQUE" => "MZ",
        "MYANMAR" => "MM",
        "NAMIBIA" => "NA",
        "NAURU" => "NR",
        "NEPAL" => "NP",
        "NETHERLANDS ANTILLES" => "AN",
        "NETHERLANDS THE" => "NL",
        "NEW CALEDONIA" => "NC",
        "NEW ZEALAND" => "NZ",
        "NICARAGUA" => "NI",
        "NIGER" => "NE",
        "NIGERIA" => "NG",
        "NIUE" => "NU",
        "NORFOLK ISLAND" => "NF",
        "NORTHERN MARIANA ISLANDS" => "MP",
        "NORWAY" => "NO",
        "OMAN" => "OM",
        "PAKISTAN" => "PK",
        "PALAU" => "PW",
        "PALESTINIAN TERRITORY" => "PS",
        "PANAMA" => "PA",
        "PAPUA NEW GUINEA" => "PG",
        "PARAGUAY" => "PY",
        "PERU" => "PE",
        "PHILIPPINES" => "PH",
        "PITCAIRN ISLANDS" => "PN",
        "POLAND" => "PL",
        "PORTUGAL, PORTUGUESE REPUBLIC" => "PT",
        "PUERTO RICO" => "PR",
        "QATAR" => "QA",
        "REUNION" => "RE",
        "ROMANIA" => "RO",
        "RUSSIAN FEDERATION" => "RU",
        "RWANDA" => "RW",
        "SAINT BARTHELEMY" => "BL",
        "SAINT HELENA" => "SH",
        "SAINT KITTS AND NEVIS" => "KN",
        "SAINT LUCIA" => "LC",
        "SAINT MARTIN" => "MF",
        "SAINT PIERRE AND MIQUELON" => "PM",
        "SAINT VINCENT AND THE GRENADINES" => "VC",
        "SAMOA" => "WS",
        "SAN MARINO" => "SM",
        "SAO TOME AND PRINCIPE" => "ST",
        "SAUDI ARABIA" => "SA",
        "SENEGAL" => "SN",
        "SERBIA" => "RS",
        "SEYCHELLES" => "SC",
        "SIERRA LEONE" => "SL",
        "SINGAPORE" => "SG",
        "SLOVAKIA (SLOVAK REPUBLIC)" => "SK",
        "SLOVENIA" => "SI",
        "SOLOMON ISLANDS" => "SB",
        "SOMALIA, SOMALI REPUBLIC" => "SO",
        "SOUTH AFRICA" => "ZA",
        "SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS" => "GS",
        "SPAIN" => "ES",
        "SRI LANKA" => "LK",
        "SUDAN" => "SD",
        "SURINAME" => "SR",
        "SVALBARD & JAN MAYEN ISLANDS" => "SJ",
        "SWAZILAND" => "SZ",
        "SWEDEN" => "SE",
        "SWITZERLAND, SWISS CONFEDERATION" => "CH",
        "SYRIAN ARAB REPUBLIC" => "SY",
        "TAIWAN" => "TW",
        "TAJIKISTAN" => "TJ",
        "TANZANIA" => "TZ",
        "THAILAND" => "TH",
        "TIMOR-LESTE" => "TL",
        "TOGO" => "TG",
        "TOKELAU" => "TK",
        "TONGA" => "TO",
        "TRINIDAD AND TOBAGO" => "TT",
        "TUNISIA" => "TN",
        "TURKEY" => "TR",
        "TURKMENISTAN" => "TM",
        "TURKS AND CAICOS ISLANDS" => "TC",
        "TUVALU" => "TV",
        "UGANDA" => "UG",
        "UKRAINE" => "UA",
        "UNITED ARAB EMIRATES" => "AE",
        "UNITED KINGDOM" => "GB",
        "UNITED STATES OF AMERICA" => "US",
        "UNITED STATES MINOR OUTLYING ISLANDS" => "UM",
        "UNITED STATES VIRGIN ISLANDS" => "VI",
        "URUGUAY, EASTERN REPUBLIC OF" => "UY",
        "UZBEKISTAN" => "UZ",
        "VANUATU" => "VU",
        "VENEZUELA" => "VE",
        "VIETNAM" => "VN",
        "WALLIS AND FUTUNA" => "WF",
        "WESTERN SAHARA" => "EH",
        "YEMEN" => "YE",
        "ZAMBIA" => "ZM",
        "ZIMBABWE" => "ZW",
    );

    if( !isset($countryList[$code])  ) return $code;

    else return $countryList[$code];
    }
function countryCodes($array){
    foreach ($array as $key => $value) {
        $data[] = [
            'columnSettings'=> ['fill'=> ""],
            'id'=>code_to_country($value[0]),
            'value'=> $value[1]
        ];
    }
    return $data;
}

function socialNames($str){
    switch ($str) {
        case "youtube.com":
            return "Youtube";
            break;
        case "l.instagram.com":
            return "İnstagram";
            break;
        case "t.co":
            return "Twitter";
            break;
        default:
            return null;
            break;
    }
}
function getFileSoical($str){
    switch ($str) {
        case 'Youtube':
            return "youtube-3.svg" ;
            break;
        case 'İnstagram':
            return "instagram-2-1.svg" ;
            break;
        case 'Twitter':
            return "twitter-2.svg" ;
            break;
        default:
            return "";
            break;
    }
}

// END:: ANALYTİCS FUNCTIONS


// START : IYZICO FUNCTION
function getOptionsIyzıco($id,$password){
    $options = new \Iyzipay\Options();
    $options->setApiKey($id);
    $options->setSecretKey($password);
    $options->setBaseUrl("https://api.iyzipay.com");
    return $options;
}
function payIyzıco(){
    $options = getOptionsIyzıco();
    $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    // $request->setConversationId("123456789");
    $request->setPrice("3");//total price
    $request->setPaidPrice("3");//ödenecek tutar kdv dahil
    $request->setCurrency(\Iyzipay\Model\Currency::TL);
    $request->setBasketId("B67832"); //sepet id
    $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
    $request->setCallbackUrl(url("/")."/callback");//dönüş urlsi
    // $request->setEnabledInstallments(array(2, 3, 6, 9));

    $buyer = new \Iyzipay\Model\Buyer();
    $buyer->setId("BY789"); // user id
    $buyer->setName("John"); // user name
    $buyer->setSurname("Doe");// user surname
    $buyer->setGsmNumber("+905350000000"); // user phone
    $buyer->setEmail("email@email.com"); // user mail
    $buyer->setIdentityNumber("74300864791");
    $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");//açık adres
    $buyer->setIp("85.34.78.112");//user ip
    $buyer->setCity("Istanbul");//user şehir
    $buyer->setCountry("Turkey");//user ülke
    $buyer->setZipCode("34732");//user posta kodu

    $request->setBuyer($buyer);

    //teslim adres bilgileri
    $shippingAddress = new \Iyzipay\Model\Address();
    $shippingAddress->setContactName("Jane Doe");
    $shippingAddress->setCity("Istanbul");
    $shippingAddress->setCountry("Turkey");
    $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
    $shippingAddress->setZipCode("34742");
    $request->setShippingAddress($shippingAddress);

    //fatura adres bilgileri
    $billingAddress = new \Iyzipay\Model\Address();
    $billingAddress->setContactName("Jane Doe");
    $billingAddress->setCity("Istanbul");
    $billingAddress->setCountry("Turkey");
    $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
    $billingAddress->setZipCode("34742");
    $request->setBillingAddress($billingAddress);

    $basketItems = array();

    $firstBasketItem = new \Iyzipay\Model\BasketItem();
    $firstBasketItem->setId("BI101");
    $firstBasketItem->setName("Binocular");
    $firstBasketItem->setCategory1("Collectibles");
    $firstBasketItem->setCategory2("Accessories");
    $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
    $firstBasketItem->setPrice("0.3");
    $basketItems[0] = $firstBasketItem;
    
    $request->setBasketItems($basketItems);

    $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, $options);
    // dd($checkoutFormInitialize);
    return $checkoutFormInitialize;
}
// END: IYZICO FUNCTION


// START: PAYMENT FUNCTONS

function createpayment($payment_id,$data){
    dd($data);
return $res->status=="success";
}

// END: PAYMENT FUNCTIONS



function getContracts()
{



    return contracts::all();
}




function getCarts($id = null)
{
    if ($id != null) {
        return    carts::where('user_id', $id)->where('carts.status', '0')
        ->join('products',   'products.id', '=', 'carts.product_id')
        ->get();
    }else{
        return    carts::where('session_id', Session::get('id'))->where('carts.status', '0')
        ->join('products',   'products.id', '=', 'carts.product_id')->get();
    }
    
}

function getCartsUser()
{
    return    carts::where('user_id', Auth::user()->id)->where('carts.status', '0')->join('products',   'products.id', '=', 'carts.product_id')->get();
}


function cartCount()
{
    return    carts::where('session_id', Session::get('id'))->where('carts.status', '0')->sum('qty');
}




function cartTotal($carts=null)
{
    $cartTotal    = 0;
    if($carts == null){

        foreach (getCarts() as $cart) {
            $cartTotal = $cartTotal +  $cart->total * $cart->qty;
        }

    }else{
        
        foreach ($carts as $cart) {
            $cartTotal = $cartTotal +  $cart->total * $cart->qty;
        }
    }
    return $cartTotal;
}

function getInstallment($price){

    $Iyzıco = payments::where('id', '6')->where('status','1')->first();
    if ($Iyzıco == null) {
        return null;
    }
    $options = getOptionsIyzıco($Iyzıco->merchant_id, $Iyzıco->merchant_password);
    $request = new \Iyzipay\Request\RetrieveInstallmentInfoRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setPrice($price);
    $installmentInfo = \Iyzipay\Model\InstallmentInfo::retrieve($request, $options);
    $data = $installmentInfo->getinstallmentDetails();

    $InstallmentData = array();

    foreach ($data as $key ) {
        $cartName = $key->getcardFamilyName();
        $installments = array();
        foreach ($key->getinstallmentPrices() as $installment) {
            array_push($installments,['installmentPrice'=>$installment->getinstallmentPrice(),'totalPrice'=>$installment->gettotalPrice(),'installmentCount'=>$installment->getinstallmentNumber()]);
        }
        array_push($InstallmentData,['name'=>$cartName,'file'=>$cartName.'.png',"installments"=>$installments]);
    }
    return $InstallmentData;
}




function getSubmenus()
{


    return  sub_menus::where('status', '1')->orderBy('order')->get();
}
function panelMenus()
{


    return  panelMenus::where('status', '1')->orderBy('order')->get();
}
function subPanelMenus($menu_id)
{


    return  subPanelMenus::where('status', '1')->orderBy('order')->where('menu_id', $menu_id)->get();
}


// BEGIN TURKISH MONTH CONVERTER
function getMonthTR($month){
	switch($month){
		case 'Jan':
			return 'Oca';
			break;
		case 'Feb':
			return 'Şub';
			break;
		case 'Mar':
			return 'Mar';
			break;
		case 'Apr':
			return 'Nis';
			break;
		case 'May':
			return 'May';
			break;
		case 'Jun':
			return 'Haz';
			break;
		case 'Jul':
			return 'Tem';
			break;
		case 'Aug':
			return 'Ağu';
			break;
		case 'Sep':
			return 'Eyl';
			break;
		case 'Oct':
			return 'Eki';
			break;
		case 'Nov':
			return 'Kas';
			break;
		case 'Dec':
			return 'Ara';
			break;
		default:
			return "-";
	}
}
// END TURKISH MONTH CONVERTERs


// BEGIN::GET CATEGORY

function getMenuCategories($id)
{

    if ($id == null) {
        return  categories::orderBy('order')->get();
    } else {
        return  categories::where('menu_id', $id)->orderBy('order')->get();
    }
}

function getCategories($limit = null, $limit2 = null)
{

    if ($limit == null) {
        return  categories::orderBy('order')->where('status','1')->get();
    } else {
        if($limit2 != null){
            return  categories::skip($limit)->take($limit2)->where('status','1')->orderBy('order')->get();
        }else{
            return  categories::limit($limit)->where('status','1')->orderBy('order')->get();
        }
       
    }
}
function getCategory($options = [])
{

    if (isset($options['id'])) {
        return  categories::find($options['id']);
    } elseif (isset($options['id2'])) {
        return  sub_categories::find($options['id2']);
    }
}

function getSubCategories($id)
{


    return  sub_categories::where('category_id', $id)->where('status','1')->orderBy('order')->get();
}

// END::GET CATEGORY




function getMenus()
{


    return  menus::where('status', '1')->orderBy('order')->get();
}


function getCitys()
{
    return  DB::table("geozone_cities")->get();
}

function getDistricts($city_id = null)
{
    if (isset($city_id)) {
        $datas = DB::table("geozone_city_districts")->where('city_id', $city_id)->get();
        $arr = array();
        $temp = "temp";
        foreach ($datas as $data) {
            if ($temp != $data->ilce) {
                array_push($arr, $data);
            }
            $temp = $data->ilce;
        }
        return  $arr;
    } else {
        return  null;
    }
}





function getVariationNames($array)
{
    $string = "";
    if($array != null){
        
        $variants = explode(',',$array);
    
        foreach ($variants as $variant_id) {
            $variant = variationValues::find($variant_id);
            $string .= $variant->value.' ';
        }
    }
  
    
    return $string;

    
}


// begin::orderMail
    function orderMail($order){
        if(!Auth::check()){
            $user = User::where('id',$order->user_id)->first();
            Auth::login($user);
        }
        $mailArray = [ 
            'name'    => Auth::user()->name,
            'tel'     => Auth::user()->tel,
            'email'    => Auth::user()->email,
            'date'    => $order->created_at,
            'total'   => $order->total,
            ];
            Mail::send('admin.mail.orderMail', $mailArray, function ($message) {
            $message->from("mail@kodpilot.com", config('app.name'));
            $message->subject('Sipariş Geldi:)');
            $message->to(getInfos()->mail1, config('app.name'));
            });
            toastr()->success( 'Siparişiniz oluşturuldu','Başarılı:)');
            $lastOrder = orderUpdates::where('user_id',Auth::user()->id)->get();
        
            if(!isset($lastOrder)){
                $values = [
                    'user_id' => Auth::user()->id,
                    'order_id' => $order->id,
                    'status' => 'Bekleniyor',
                ];
                orderUpdates::insert($values);
            }else{
                foreach ($lastOrder as $key) {
                    $key->delete();
                }
                $values = [
                'user_id' => Auth::user()->id,
                'order_id' => $order->id,
                'status' => "Bekleniyor",
                ];
            orderUpdates::insert($values);
            }
            return;
    }
// end::orderMail



class Shopier
{
    private $payment_url = 'https://www.shopier.com/ShowProduct/api_pay4.php';
    private
        $api_key,
        $api_secret,
        $module_version,
        $buyer = [],
        $currency = 'TRY';

    public function __construct($api_key, $api_secret, $module_version = ('1.0.4'))
    {
        $this->api_key = $api_key;
        $this->api_secret = $api_secret;
        $this->module_version = $module_version;
    }

    public function setBuyer(array $fields = [])
    {
        $this->buyerValidateAndLoad($this->buyerFields(), $fields);
    }

    public function setOrderBilling(array $fields = [])
    {
        $this->buyerValidateAndLoad($this->orderBillingFields(), $fields);
    }

    public function setOrderShipping(array $fields = [])
    {
        $this->buyerValidateAndLoad($this->orderShippingFields(), $fields);
    }

    private function buyerValidateAndLoad($validationFields, $fields)
    {
        $diff = array_diff_key($validationFields, $fields);

        if (count($diff) > 0)
            throw new Exception(implode(',', array_keys($diff)) . ' fields are required');

        foreach ($validationFields as $key => $buyerField) {
            $this->buyer[$key] = $fields[$key];
        }
    }

    public function generateFormObject($order_id, $order_total, $callback_url)
    {

        $diff = array_diff_key($this->buyerFields(), $this->buyer);

        if (count($diff) > 0)
            throw new Exception(implode(',', array_keys($diff)) . ' fields are required use "setBuyer()" method ');

        $diff = array_diff_key($this->orderBillingFields(), $this->buyer);

        if (count($diff) > 0)
            throw new Exception(implode(',', array_keys($diff)) . ' fields are required use "setOrderBilling()" method ');

        $diff = array_diff_key($this->orderShippingFields(), $this->buyer);

        if (count($diff) > 0)
            throw new Exception(implode(',', array_keys($diff)) . ' fields are required use "setOrderShipping()" method ');
        $args = array(
            'API_key' => $this->api_key,
            'website_index' => 1,
            'platform_order_id'     => $this->buyer['id'],
            'product_name'             => $this->buyer['product_name'],
            'product_type' => 0, //1 : downloadable-virtual 0:real object,2:default
            'buyer_name' => $this->buyer['first_name'],
            'buyer_surname' => $this->buyer['last_name'],
            'buyer_email' => $this->buyer['email'],
            'buyer_account_age' => 0,
            'buyer_id_nr' => $this->buyer['id'],
            'buyer_phone' => $this->buyer['phone'],
            'billing_address' => $this->buyer['billing_address'],
            'billing_city' => $this->buyer['billing_city'],
            'billing_country' => $this->buyer['billing_country'],
            'billing_postcode' => $this->buyer['billing_postcode'],
            'shipping_address' => $this->buyer['shipping_address'],
            'shipping_city' => $this->buyer['shipping_city'],
            'shipping_country' => $this->buyer['shipping_country'],
            'shipping_postcode' => $this->buyer['shipping_postcode'],
            'total_order_value' => $order_total,
            'currency' => $this->getCurrency(),
            'platform' => 0,
            'is_in_frame' => 0,
            'current_language' => $this->lang(),
            'modul_version' => $this->module_version,
            'random_nr' => rand(100000, 999999)
        );


        $data = $args["random_nr"] . $args["platform_order_id"] . $args["total_order_value"] . $args["currency"];
        $signature = hash_hmac('sha256', $data, $this->api_secret, true);
        $signature = base64_encode($signature);
        $args['signature'] = $signature;
        $args['callback'] = $callback_url;

        return [
            'elements' => [
                [
                    'tag' => 'form',
                    'attributes' => [
                        'id' => 'shopier_form_special',
                        'method' => 'post',
                        'action' => $this->payment_url
                    ],
                    'children' => array_map(function ($key, $value) {
                        return [
                            'tag' => 'input',
                            'attributes' => [
                                'name' => $key,
                                'value' => $value,
                                'type' => 'hidden',
                            ]
                        ];
                    }, array_keys($args), array_values($args))
                ]
            ]
        ];
    }


    public function generateForm($order_id, $order_total, $callback_url)
    {
        $obj = $this->generateFormObject($order_id, $order_total, $callback_url);

        return $this->recursiveHtmlStringGenerator($obj['elements']);
    }

    public function run($order_id, $order_total, $callback_url)
    {

        $form = $this->generateForm($order_id, $order_total, $callback_url);

        return '<!doctype html>
		<html lang="en">
		<head>
		<meta charset="UTF-8">
		<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title></title>
		</head>
		' . $form . '
		<body>
		<script type="text/javascript">
		document.getElementById("shopier_form_special").submit();
		</script>
		</body>
		</html>
		';
    }

    // generateFormObject() sınıfının verdiği formattaki arrayden structure çıkartan yapıdırı.
    private function recursiveHtmlStringGenerator(array $elements = [], $string = null)
    {
        foreach ($elements as $element) {
            $attributes = $element['attributes'];
            $attributes = array_map(function ($key, $value) {
                return $key . '="' . $value . '"';
            }, array_keys($attributes), array_values($attributes));
            $attribute_string = implode(' ', $attributes);
            // $html_in = $element['source'];
            // $string .= "<{$element['tag']} {$attribute_string} > " . $html_in;



            $string .= "<{$element['tag']} {$attribute_string} > ";

            if (isset($element['children']) && is_array($element['children']))
                $string = $this->recursiveHtmlStringGenerator($element['children'], $string);

            $string .= "</{$element['tag']}>";
        }
        return $string;
    }


    //shopierden gelen dataları kontrol eder.
    public function verifyShopierSignature($post_data)
    {

        if (isset($post_data['platform_order_id'])) {
            $order_id = $post_data['platform_order_id'];
            $random_nr = $post_data['random_nr'];
            if ($order_id != '') {
                $signature = base64_decode($_POST["signature"]);
                $expected = hash_hmac('sha256', $random_nr . $order_id, $this->api_secret, true);

                if ($signature == $expected)
                    return true;
            }
        }
        return false;
    }

    private function buyerFields()
    {
        return [
            'id' => true,
            'first_name' => true,
            'product_name' =>true,
            'last_name' => true,
            'email' => true,
            'phone' => true,
        ];
    }

    private function orderBillingFields()
    {
        return [
            'billing_address' => true,
            'billing_city' => true,
            'billing_country' => true,
            'billing_postcode' => true,
        ];
    }

    private function orderShippingFields()
    {
        return [
            'shipping_address' => true,
            'shipping_city' => true,
            'shipping_country' => true,
            'shipping_postcode' => true,
        ];
    }

    private function getCurrency()
    {
        $currencyList = [
            'TRY' => 0,
            'USD' => 1,
            'EUR' => 2,
        ];
        return $currencyList[strtoupper($this->currency)];
    }

    private function lang()
    {
        $current_language = "tr-TR";
        $current_lan = 1;
        if ($current_language == "tr-TR") {
            $current_lan = 0;
        }

        return $current_lan;
    }
}




class yurticiKargo
{

    public $liveRequest = 'http://webservices.yurticikargo.com:8080/KOPSWebServices/ShippingOrderDispatcherServices?wsdl';
    public $username;
    public $password;
    public $lang = 'TR';
    public $query;
    public $testMode = false;

    //TEST
    public $testRequest     = 'http://testwebservices.yurticikargo.com:9090/KOPSWebServices/ShippingOrderDispatcherServices?wsdl';
    public $testUsername    = 'YKTEST';
    public $testPassword    = 'YK';
    //TEST

    function __construct($data = [])
    {

        if (!class_exists('SoapClient')) {
            echo 'SoapClient Not Fount';
            exit;
        }

        if (isset($data['test']) and $data['test'] == true) {
            $this->username = $this->testUsername;
            $this->password = $this->testPassword;
        } else {
            $this->username = $data['username'];
            $this->password = $data['password'];
        }
        $this->lang     = $data['lang'] ?? $this->lang;
        $this->testMode = $data['test'] ?? $this->testMode;

        $this->query();
    }

    function query()
    {

        if ($this->testMode == false) {
            $url = $this->liveRequest;
        } else {
            $url = $this->testRequest;
        }

        $this->query = new \SoapClient($url);
    }

    function createCargo($data = [])
    {



        $defaults = [
            'cargoKey'          => null,
            'invoiceKey'        => null,
            'receiverCustName'  => null,
            'receiverAddress'   => null,
            'receiverPhone1'    => null,
            'receiverPhone2'    => null,
            'receiverPhone3'    => null,
            'cityName'          => null,
            'townName'          => null,
            'custProdId'        => null,
            'desi'              => null,
            'desiSpecified'     => false,
            'kg'                => false,
            'cargoCount'        => false,
            'waybillNo'         => false,
            'taxOfficeId'       => '340055',
            'ttDocumentId'      => 0,
            'dcSelectedCredit'  => 0,
            'dcCreditRule'      => 1,
        ];

        $data = array_merge($defaults, $data);

        $cargoData = [
            'wsUserName'        => $this->username,
            'wsPassword'        => $this->password,
            'userLanguage'      => $this->lang,
            'ShippingOrderVO'   => $data
        ];

        try {

            $result =  $this->query->createShipment($cargoData);
            return json_encode($result, true);
        } catch (Exception $e) {
            print_r('Hata : ' . $e->getMessage());
        }
    }

    function cancelCargo($data = [])
    {

        $cargoData = [
            'wsUserName'        => $this->username,
            'wsPassword'        => $this->password,
            'userLanguage'      => $this->lang,
            'cargoKeys'         => $data['cargoKeys']
        ];

        try {
            return $this->query->cancelShipment($cargoData);
        } catch (Exception $e) {
            print_r('Hata : ' . $e->getMessage());
        }
    }

    function cargoStatus($data)
    {

        $cargoData = [
            'wsUserName'        => $this->username,
            'wsPassword'        => $this->password,
            'wsLanguage'        => $this->lang,
            'keys'              => $data['cargoKeys'] ?? $data['invoiceKey'],
            'keyType'           => isset($data['cargoKeys']) ? 0 : 1,
            'addHistoricalData' => true,
            'onlyTracking' => true,
        ];

        try {
            return $this->query->queryShipment($cargoData);
        } catch (Exception $e) {
            print_r('Hata : ' . $e->getMessage());
        }
    }
}
function getFavorite()
{
    $favorites = favorites::select(
        'products.file as product_file',
        'products.name as product_name',
        'products.status as product_status',
        'products.newPrice as product_price',
        'favorites.created_at as favorite_date'
    )
    ->join('products','products.id','=','favorites.product_id')
    ->where('user_id',Auth::check() ? Auth::user()->id : '0')
    ->where('product_status','1')
    ->get();
    
    return $favorites;
}

function asistans()
{
    return asistans::where('status','1')->orderBy('id')->get();
}

function calculateKdv($id)
{
    $product = products::where('id',$id)->first();
    $withoutKdv = ($product->newPrice * 100) / (100 + $product->tax);
    return $withoutKdv;
}

function currency(){

    $currency = currencies::orderByDesc('id')->first();
    if (isset($currency)) {

        $firstTime = date('Y/m/d H:i:s', strtotime("-23 Hours -59 minute -59 second", strtotime(Carbon::now()->format('Y/m/d').' '.'15:40:00')));
        $secondTime = date('Y/m/d H:i:s', strtotime(Carbon::now()->format('Y/m/d').' '.'15:40:00'));
        $currency_date = currencies::whereBetween('created_at',[$firstTime,$secondTime])->first();

        if ($currency_date == null) {
            try {
                $xml = simplexml_load_file("https://www.tcmb.gov.tr/kurlar/today.xml");
                $json = json_encode($xml);
                $array = json_decode($json,TRUE);
                $dolar = $array['Currency'][0]['BanknoteSelling'];
                $euro = $array['Currency'][3]['BanknoteSelling'];
                $usd = number_format($dolar,2);
                $euro = number_format($euro,2);
                $new_currency = array([
                    'dolar' => $usd,
                    'euro'  => $euro,
                    'created_at' => Carbon::now()->format('Y/m/d').' '.'15:40:00',
                ]);
                currencies::insert($new_currency);

            } catch (\Throwable $th) {
                report($th);
            }
            
        }
    }else {
        try {
            $xml = simplexml_load_file("https://www.tcmb.gov.tr/kurlar/today.xml");
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);
            $dolar = $array['Currency'][0]['BanknoteSelling'];
            $euro = $array['Currency'][3]['BanknoteSelling'];
            $usd = number_format($dolar,2);
            $euro = number_format($euro,2);
            $new_currency = array([
                'dolar' => $usd,
                'euro'  => $euro,
                'created_at' => Carbon::now()->format('Y/m/d').' '.'15:40:00',
            ]);
            currencies::insert($new_currency);
        } catch (\Throwable $th) {
            report($th);
        }
    }
	
}

function getCurrencies()
{
    $currency = currencies::orderByDesc('id')->first(); 

    return $currency;
}


function teltoConverter(){
    $tel = getinfos()->tel1;
    $tel = str_replace(' ','',$tel);
    if($tel[0] != '+'){
        $tel = '+'.$tel;
    }
    return $tel;
}
function companyName($id){
    $company = prodcuts::where('id',$id)->first();
    return $company->name;
}

