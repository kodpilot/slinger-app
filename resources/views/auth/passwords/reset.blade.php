{{-- 
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 10 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<head>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
	<!-- End Google Tag Manager -->
	<meta charset="utf-8" />
	<title>Baby Shop | Üye Giriş</title>
	<meta name="description" content="Singin page example" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="https://keenthemes.com/metronic" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Custom Styles(used by this page)-->
	<link href="{{ url('/assets/css/login-4_v=7.1.1.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ url('/assets/css/styles.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Page Custom Styles-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="{{ url('/assets/css/plugins.bundle_v=7.1.1.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ url('/assets/css/prismjs.bundle_v=7.1.1.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ url('/assets/css/style.bundle_v=7.1.1.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="{{ url('/assets/images/logos/favicon.ico') }}" />
	<!-- Hotjar Tracking Code for keenthemes.com -->
	<script>(function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)}; h._hjSettings={hjid:1070954,hjsv:6}; a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv; a.appendChild(r); })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');</script>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">
	<!-- Google Tag Manager (noscript) -->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript) -->
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid wizard" id="kt_login">
			<!--begin::Content-->
			<div class="login-container d-flex flex-center flex-row flex-row-fluid order-2 order-lg-1 flex-row-fluid bg-white py-lg-0 pb-lg-0 pt-15 pb-12">
				<!--begin::Container-->
				0000====CONTENT====0000
				<div class="login-content d-flex flex-column pt-lg-0 pt-12 container">
					<!--begin::Logo-->
					<a href="#" class="login-logo pb-xl-20 pb-15">
						<img src="{{ url('/assets/images/logos/logo.svg') }}" class="max-h-70px" alt="" />
					</a>
					<!--end::Logo-->
					<!--begin::Signin-->
					<div class="login-form">
						<!--begin::Form-->
						<form class="form" action="{{ route('password.update') }}" method="POST">
							@csrf
							<!--begin::Title-->
							<input type="hidden" name="token" value="{{ $token }}">
							<div class="pb-5 pb-lg-15">
								<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">
								{{__('Şifre Sıfırlama')}}</h3>
								<div class="text-muted font-weight-bold font-size-h4">{{__('Hesabınız mı yok?')}}
									<a href="{{ route('register.page') }}" class="text-primary font-weight-bolder">
									{{__('Kayıt Olun')}}</a>
								</div>
							</div>
							<!--begin::Title-->
							<!--begin::Form group-->
							<div class="form-group">
								<label class="font-size-h6 font-weight-bolder text-dark">{{__('Email Adres')}}</label>

								<input id="email" type="email" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>

							<div class="form-group">
								<label class="font-size-h6 font-weight-bolder text-dark">{{__('Şifre')}}</label>

								<input id="password" type="password" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror

							</div>

							<div class="form-group">
								<label class="font-size-h6 font-weight-bolder text-dark">{{__('Şifre Tekrarla')}}</label>

								<input id="password-confirm" type="password" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" name="password_confirmation" required autocomplete="new-password">

							</div>


							<!--end::Form group-->
							<!--begin::Form group-->

							<!--end::Form group-->
							<!--begin::Action-->
							<div class="pb-lg-0 pb-5">
								<button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">{{__('Şifre Değiştir')}}
								</button>
								<a href="{{ route('login.page') }}" class="btn btn-light-primary font-weight-bolder px-8 py-4 my-3 font-size-lg">
									<span class="svg-icon svg-icon-md">
										<!--begin::Svg Icon | path:/metronic/theme/html/demo11/dist/assets/media/svg/social-icons/google.svg-->

										<!--end::Svg Icon-->
									</span>İptal</a>
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->
					</div>
				</div>
				<!--begin::Content-->
				<!--begin::Aside-->
				<div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
					<div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom" style="background-image: url({{ url('assets/images/logos/logo.svg') }});">
						<!--begin::Aside title-->
						<h3 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">
							{{__(('Kajuto'))}}'ya<br />Hoşgeldiniz!
						</h3>
						<!--end::Aside title-->
					</div>
				</div>
				<!--end::Aside-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{ url('/assets/js/plugins.bundle_v=7.1.1.js') }}"></script>
		<script src="{{ url('/assets/js/prismjs.bundle_v=7.1.1.js') }}"></script>
		<script src="{{ url('/assets/js/scripts.bundle_v=7.1.1.js') }}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ url('/assets/js/login-4_v=7.1.1.js') }}"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
	</html> --}}
@extends('auth.layouts.header')
@section('log-reg')

<!--begin::Root-->
<div class="d-flex flex-column flex-root">
	<!--begin::Authentication - New password -->
	<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/metronic8/demo20/assets/media/illustrations/sketchy-1/14.png">
		<!--begin::Content-->
		<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
			<!--begin::Logo-->
			<a href="{{route('index')}}" class="mb-12">
				<img alt="Logo" src="{{url('assets/images/logos/'.getInfos()->logo)}}" class="h-100px" />
			</a>
			<!--end::Logo-->
			<!--begin::Wrapper-->
			<div class="w-lg-550px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
				<!--begin::Form-->
				<form class="form w-100" action="{{ route('create-password') }}" method="POST">
					@csrf
					<!--begin::Heading-->
					<div class="text-center mb-10">
						<!--begin::Title-->
						<h1 class="text-dark mb-3">Yeni Şifre Belirleyin</h1>
						<!--end::Title-->
						<!--begin::Link-->
						<div class="text-gray-400 fw-bold fs-4">Şifrenizi belirlediniz mi? 
						<a href="{{route('login')}}" class="link-primary fw-bolder">Giriş Yap</a></div>
						<!--end::Link-->
					</div>
					<!--begin::Heading-->
					<!--begin::Input group-->
					<div class="mb-10 fv-row" data-kt-password-meter="true">
						<!--begin::Wrapper-->
						<div class="mb-1">
							<!--begin::Label-->
							<label class="form-label fw-bolder text-dark fs-6">Şifre</label>
							<!--end::Label-->
							<!--begin::Input wrapper-->
							<div class="position-relative mb-3">
								<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
								<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
									<i class="bi bi-eye-slash fs-2"></i>
									<i class="bi bi-eye fs-2 d-none"></i>
								</span>
							</div>
							<!--end::Input wrapper-->
							<!--begin::Meter-->
							<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
								<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
							</div>
							<!--end::Meter-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Hint-->
						<div class="text-muted">En az 8 karakterli şifre belirlemelisinizç</div>
						<!--end::Hint-->
					</div>
					<!--end::Input group=-->
					<!--begin::Input group=-->
					<div class="fv-row mb-10">
						<label class="form-label fw-bolder text-dark fs-6">Şifre Tekrarı</label>
						<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off" />
					</div>
					<!--end::Input group=-->
					<input type="hidden" name="id" value="{{$id}}">
					<!--begin::Action-->
					<div class="text-center">
						<button type="submit" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder">
							<span class="indicator-label">Gönder</span>
							<span class="indicator-progress">Lütfen Bekleyin... 
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
					<!--end::Action-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Content-->
	</div>
	<!--end::Authentication - New password-->
</div>
<!--end::Root-->

@endsection