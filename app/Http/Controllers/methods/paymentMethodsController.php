<?php

namespace App\Http\Controllers\methods;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\infos;
use App\Models\menus;
use App\Models\carts;
use App\Models\categories;
use App\Models\variationValues;
use App\Models\payments;
use App\Models\addresses;
use App\Models\sliders;
use App\Models\products;
use App\Models\blogs;
use App\Models\cargos;
use App\Models\options;

class paymentMethodsController extends Controller
{
// VAKIFBANK PROVİZYON
	public function vakifProvizyon(Request $request){



		$vakif = payments::where('id', '3')->first();

$PostUrl      = 'https://onlineodeme.vakifbank.com.tr:4443/VposService/v3/Vposreq.aspx'; //Dokümanda yer alan Prod VPOS URL i. Testlerinizi test ortamýnda gerçekleþtiriyorsanýz dokümandaki test URL ini kullanmalýsýnýz.
$IsyeriNo     = $_POST["MerchantId"];
$TerminalNo   = $vakif->terminal_no;
$IsyeriSifre  = $vakif->merchant_password;
$Expiry		  = '20'.substr($_POST["Expiry"],0,2).substr($_POST["Expiry"],-2);
$Pan		  = $_POST["Pan"];
$CurrencyCode = $_POST["PurchCurrency"];
$CurrencyAmount = number_format(substr($_POST["PurchAmount"],0,-2),2);
$ECI       	  = $_POST["Eci"];
$CAVV         = $_POST["Cavv"];
$KartCvv	  = '793';
$SiparID      = uniqid();
$MpiTrans     = $_POST["VerifyEnrollmentRequestId"];
$IslemTipi    = 'Sale';
$cargoId 	  = $_POST["SessionInfo"];
$ClientIp     = $_SERVER["REMOTE_ADDR"];// ödemeyi gerçekleþtiren kullanýcýnýn IP bilgisi alýnarak bu alanda gönderilmelidir.
if ($_POST['InstallmentCount'] != null) {
	$Taksit     	= '<NumberOfInstallments>'.$_POST["InstallmentCount"].'</NumberOfInstallments>';
}else{
	$Taksit			= '';
}


$PosXML = 'prmstr=
<VposRequest><MerchantId>'.$IsyeriNo.'</MerchantId>
<Password>'.$IsyeriSifre.'</Password>
<TerminalNo>'.$TerminalNo.'</TerminalNo>
<Pan>'.$Pan.'</Pan>
<Expiry>'.$Expiry.'</Expiry>
<CurrencyAmount>'.$CurrencyAmount.'</CurrencyAmount>
<CurrencyCode>'.$CurrencyCode.'</CurrencyCode>
<TransactionType>'.$IslemTipi.'</TransactionType>
<ECI>'.$ECI.'</ECI>
<CAVV>'.$CAVV.'</CAVV>
<MpiTransactionId>'.$MpiTrans.'</MpiTransactionId>
'.$Taksit.'
<TransactionDeviceSource>0</TransactionDeviceSource>
<ClientIp>'.$ClientIp.'</ClientIp>
</VposRequest>';

'<h1>Vpos Request</h1>';
$PostUrl."<br>";
'<textarea rows="15" cols="60">'.$PosXML.'</textarea>';
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$PostUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$PosXML);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 5);
curl_setopt($ch, CURLOPT_TIMEOUT, 59);
// curl_setopt($ch, curl.options,array("CURLOPT_SSLVERSION"=>"CURL_SSLVERSION_TLSv1_1"));

// curl_setopt ($ch, CURLOPT_CAINFO, "c:/php/ext/cacert.pem");

$result = curl_exec($ch);





// Check for errors and display the error message
if($errno = curl_errno($ch)) {
	$error_message = curl_strerror($errno);
	echo "cURL error ({$errno}):\n {$error_message}";
}
curl_close($ch);

'<h1>Vpos Response</h1>';
'<textarea rows="15" cols="60">'.$result.'</textarea>';
$currencyGet			=  	explode('<ResultCode>', $result);
$currencyCode			= 	explode('</ResultDetail>', $currencyGet[0]);
$currencyDetail			= 	explode('</ResultDetail>', $currencyGet[1]);

$payStatus =  substr($currencyGet[1], 0,4);



if ($payStatus == '0000') {

	$orders               = orders::find($MpiTrans);
	$orders->pay_status   = '1';
	$orders->status   	  = 'Hazırlanıyor';
	$orders->payment_id   = '3';
	$orders->total        = $CurrencyAmount;
	$orders->save();


	

	if (Auth::check()) {
		$carts               = carts::where('user_id', $user_id)->where('status', '0')->get();
	}else{
		$carts               = carts::where('session_id', $orders->session_id)->where('status', '0')->get();
	}

	//Sepet Güncelle ve Stoktan Düş
	foreach ($carts as $cart ) {

		$options = explode(',',$cart->option);


		if ($cart->option != null) {
			$cart->option = 'Seçenekler';
			foreach ($options as $key => $value) {
				$option = options::find($value);
				$option->stock -= $cart->qty;
				$option->save();
				$cart->option   = $cart->option.','.$option->name;
			}
		}


		$cart->status   = '1';
		$cart->order_id = $MpiTrans ;
		$cart->save(); 

		$product = products::find($cart->product_id);
		$product->stock -= $cart->qty;
		$product->save();
	}

	if (Auth::check()) {
		$user = addresses::where('user_id', Auth::id())->first();
	}else{
		$user = addresses::where('session_id', $orders->session_id)->first();
	}
	$mailArray = [ 
		'name'    => $user->name.' '.$user->surname,
		'total'   => $CurrencyAmount,
		'tel'     => $user->tel,
		'mail'    => $user->mail,
		'address' => $request->address.' '.$request->city
	];

	sendMail('admin.mail.orderMail', $mailArray, 'order'); 


	$path = 'products';
	toastr()->success( 'İşlem başarı ile sonuçlandı!', 'Başarılı');


}else{
	$path = 'cart';
	toastr()->error( $currencyDetail[0].'. Hata Kodu:'.$currencyCode[0], 'Başarısız');

}






if (Auth::check()) {
	$carts        = carts::where('user_id', $_POST['user_id'])->where('carts.status', '0')->join('products',   'products.id', '=' , 'carts.product_id')->get();
}else{
	$carts        = carts::where('user_id',0)->join('products',   'products.id', '=' , 'carts.product_id')->get();
}

$cartTotal    = 0; foreach ($carts as $cart) { $cartTotal = $cartTotal +  $cart->newPrice * $cart->qty; }
$blogs        = blogs::all();
$sliders      = sliders::orderBy('order')->where('position', 'top')->get();
$leftBanners  = sliders::orderBy('order')->where('position', 'left')->get();
$bottomBanners = sliders::orderBy('order')->where('position', 'bottom')->get();
$products     = products::orderBy('order')->paginate(12);
$lastProducts = products::orderByDesc('id')->limit(3)->get();
$categories   = categories::limit('4')->orderBy('order')->get();
$categoriesAll= categories::orderBy('name')->get();
$infos        = infos::where('id',1)->first();
$menus        = menus::where('status','1')->orderBy('order')->get();
$cargos       = cargos::where('status','1')->orderBy('order')->get();
$id = null;
$id2=null;


return view($path)
->with('id', $id)
->with('id2', $id2)
->with('cartTotal', $cartTotal)
->with('carts', $carts)
->with('cargos', $cargos)
->with('blogs', $blogs)
->with('lastProducts', $lastProducts)
->with('products', $products)
->with('categories', $categories)
->with('categoriesAll', $categoriesAll)
->with('sliders', $sliders)
->with('leftBanners', $leftBanners)
->with('bottomBanners', $bottomBanners)
->with('infos', $infos)
->with('menus', $menus);





}


// VAKIF PROVİZYON END


// ---------------------------------------------------------------------------------------

// SHOPİER PROVİZYON

public function shopierProvizyon(Request $request){

	

	//Shopierdan gelen postlar.
	$status 		= $_POST["status"];
	$invoiceId 		= $_POST["platform_order_id"];
	$transactionId 	= $_POST["payment_id"];
	$installment 	= $_POST["installment"];
	$signature 		= $_POST["signature"];
	$random_nr 		= $_POST['random_nr'];

	$orderArray		= explode('_', $invoiceId);
	$orderId 		= $orderArray[0];
	$cargoId 		= $orderArray[1];

	

	$status = strtolower($status);


	if ($status === "success") {
		
		$orders               = orders::find($orderId);
		$orders->pay_status   	= '1';
		$orders->status   		= 'Hazırlanıyor';
		$orders->save();
		$carts = carts::where('session_id',$orders->session_id)->get();
		foreach ($carts as $cart) {
		$cart->status="1";
		$cart->order_id=$orders->id;
		$product = products::where('id',$cart->product_id)->first();
		$product->stock -= $cart->qty;
		$product->save();
		$options = explode(',',$cart->option);
		if ($cart->option != null) {
			$options = explode(',', $cart->option);
			foreach ($options as $key => $value) {
			$variant = variationValues::where('id', $value)->first();
			$variant->stock -= $cart->qty;
			$variant->save();
			}
		}
		$cart->save();
		}
		orderMail($orders);


		

			
		

		if (Auth::check()) {
			$user = addresses::where('user_id', Auth::id())->first();
		}else{
			$user = addresses::where('session_id', $orders->session_id)->first();
		}


		orderMail($orders);

		$path = 'products';
		toastr()->success( 'İşlem başarı ile sonuçlandı!', 'Başarılı');
	}
	else{

		$path = 'cart';
		toastr()->error('Bir hata oluştu!', 'Başarısız');
	}

	if (Auth::check()) {
		$carts        = carts::where('user_id', Auth::id())->where('carts.status', '0')->join('products',   'products.id', '=' , 'carts.product_id')->get();
	}else{
		$carts        = carts::where('session_id', $orders->session_id)->join('products',   'products.id', '=' , 'carts.product_id')->get();
	}


	return redirect()->route('products');
	$cartTotal    = 0; foreach ($carts as $cart) { $cartTotal = $cartTotal +  $cart->newPrice * $cart->qty; }
	$blogs        = blogs::all();
	$sliders      = sliders::orderBy('order')->where('position', 'top')->get();
	$leftBanners  = sliders::orderBy('order')->where('position', 'left')->get();
	$bottomBanners = sliders::orderBy('order')->where('position', 'bottom')->get();
	$products     = products::orderBy('order')->paginate(12);
	$lastProducts = products::orderByDesc('id')->limit(3)->get();
	$categories   = categories::limit('4')->orderBy('order')->get();
	$categoriesAll= categories::orderBy('name')->get();
	$cargos       = cargos::where('status','1')->orderBy('order')->get();
	$infos        = infos::where('id',1)->first();

	$id=null;
	$id2=null;


	return view($path)
	->with('id', $id)
	->with('id2', $id2)
	->with('cartTotal', $cartTotal)
	->with('carts', $carts)
	->with('cargos', $cargos)
	->with('blogs', $blogs)
	->with('lastProducts', $lastProducts)
	->with('products', $products)
	->with('categories', $categories)
	->with('categoriesAll', $categoriesAll)
	->with('sliders', $sliders)
	->with('leftBanners', $leftBanners)
	->with('bottomBanners', $bottomBanners)
	->with('infos', $infos);


}

// SHOPİER PROVİZYON END
// ---------------------------------------------------------------------------------------



}
