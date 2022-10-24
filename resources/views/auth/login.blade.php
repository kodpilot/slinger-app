@extends('auth.layouts.header')
@section('log-reg')
{{-- <div class="login-content d-flex flex-column pt-lg-0 pt-12 container">
	<!--begin::Logo-->
	<a href="{{ route('index') }}" class="login-logo pb-xl-20 pb-15">
		<img src="{{ url('/assets/images/logos/'.getInfos()->logo) }}" class="max-h-70px" alt="" />
	</a>
	<!--end::Logo-->
	<!--begin::Signin-->
	<div class="login-form">
		<!--begin::Form-->
		<form class="form" action="{{ route('login') }}" method="POST">
			@csrf
			<!--begin::Title-->
			<div class="pb-5 pb-lg-15">
				<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">
				{{__('Giriş Yap')}}</h3>
				<div class="text-muted font-weight-bold font-size-h4">{{__('Hesabınız mı yok?')}}
					<a href="{{ route('register.page') }}" class="text-primary font-weight-bolder">
					{{__('Kayıt Olun')}}</a>
				</div>
			</div>
			<!--begin::Title-->
			<!--begin::Form group-->
			<div class="form-group">
				<label class="font-size-h6 font-weight-bolder text-dark">{{__('Email Adres')}}</label>

				<input id="email" type="email" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

				@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror

			</div>


			<!--end::Form group-->
			<!--begin::Form group-->
			<div class="form-group">
				<div class="d-flex justify-content-between mt-n5">
					<label class="font-size-h6 font-weight-bolder text-dark pt-5">
						{{__('Şifre')}}
					</label>
				</div>
				<input  id="password" type="password" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

				@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror



				@if (Route::has('password.request'))
				<a href="{{ route('password.request') }}" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">{{__('Şifremi Unuttum')}}</a>
				@endif
			</div>
			<div class="form-group">
				<div class="d-flex justify-content-between mt-n5">
					<div class="form-check">
						<input class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

						<label class="font-size-h6 font-weight-bolder text-dark pt-5" for="remember">
							{{ __('Beni Hatırla') }}
						</label>
					</div>
				</div>
			</div>
			<!--end::Form group-->
			<!--begin::Action-->
			<div class="pb-lg-0 pb-5">
				<button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">{{__('Giriş Yap')}}</button>
				<button type="button" class="btn btn-light-primary font-weight-bolder px-8 py-4 my-3 font-size-lg">
					<span class="svg-icon svg-icon-md">
						<!--begin::Svg Icon | path:/metronic/theme/html/demo11/dist/assets/media/svg/social-icons/google.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
							<path d="M19.9895 10.1871C19.9895 9.36767 19.9214 8.76973 19.7742 8.14966H10.1992V11.848H15.8195C15.7062 12.7671 15.0943 14.1512 13.7346 15.0813L13.7155 15.2051L16.7429 17.4969L16.9527 17.5174C18.879 15.7789 19.9895 13.221 19.9895 10.1871Z" fill="#4285F4" />
							<path d="M10.1993 19.9313C12.9527 19.9313 15.2643 19.0454 16.9527 17.5174L13.7346 15.0813C12.8734 15.6682 11.7176 16.0779 10.1993 16.0779C7.50243 16.0779 5.21352 14.3395 4.39759 11.9366L4.27799 11.9466L1.13003 14.3273L1.08887 14.4391C2.76588 17.6945 6.21061 19.9313 10.1993 19.9313Z" fill="#34A853" />
							<path d="M4.39748 11.9366C4.18219 11.3166 4.05759 10.6521 4.05759 9.96565C4.05759 9.27909 4.18219 8.61473 4.38615 7.99466L4.38045 7.8626L1.19304 5.44366L1.08875 5.49214C0.397576 6.84305 0.000976562 8.36008 0.000976562 9.96565C0.000976562 11.5712 0.397576 13.0882 1.08875 14.4391L4.39748 11.9366Z" fill="#FBBC05" />
							<path d="M10.1993 3.85336C12.1142 3.85336 13.406 4.66168 14.1425 5.33717L17.0207 2.59107C15.253 0.985496 12.9527 0 10.1993 0C6.2106 0 2.76588 2.23672 1.08887 5.49214L4.38626 7.99466C5.21352 5.59183 7.50242 3.85336 10.1993 3.85336Z" fill="#EB4335" />
						</svg>
						<!--end::Svg Icon-->
					</span>Google ile Giriş Yap
				</button>
				</div>
				<!--end::Action-->
			</form>
			<!--end::Form-->
		</div>
		<!--end::Signin-->
</div> --}}
<a href="{{route('index')}}" class="mb-12">
	<img alt="Logo" src="{{url('assets/images/logos/'.getInfos()->logo)}}" class="h-100px" />
</a>
<!--end::Logo-->
<!--begin::Wrapper-->
<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
	<!--begin::Form-->
	<form class="form w-100" action="{{route('login')}}" method="POST">
		@csrf
		<!--begin::Heading-->
		<div class="text-center mb-10">
			<!--begin::Title-->
			<h1 class="text-dark mb-3">Giriş Yap</h1>
			<!--end::Title-->
			<!--begin::Link-->
			<div class="text-gray-400 fw-bold fs-4">Hesabınız yok mu? 
			<a href="{{route('register.page')}}" class="link-primary fw-bolder">Kayıt Olun</a></div>
			<!--end::Link-->
		</div>
		<!--begin::Heading-->
		<!--begin::Input group-->
		<div class="fv-row mb-10">
			<!--begin::Label-->
			<label class="form-label fs-6 fw-bolder text-dark">Email Adres</label>
			<!--end::Label-->
			<!--begin::Input-->
			<input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" required  autocomplete="email" autofocus />
			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<!--end::Input-->
		</div>
		<!--end::Input group-->
		<!--begin::Input group-->
		<div class="fv-row mb-10">
			<!--begin::Wrapper-->
			<div class="d-flex flex-stack mb-2">
				<!--begin::Label-->
				<label class="form-label fw-bolder text-dark fs-6 mb-0">Şifre</label>
				<!--end::Label-->
				<!--begin::Link-->
				<a href="{{route('password.request')}}" class="link-primary fs-6 fw-bolder">Şifremi Unuttum ?</a>
				<!--end::Link-->
			</div>
			<!--end::Wrapper-->
			<!--begin::Input-->
			<input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" name="password" autocomplete="current-password" />
			@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<!--end::Input-->
		</div>
		{{-- begin::recaphta --}}
		<div class="g-recaptcha" style="margin-bottom:15px" data-sitekey="{{getinfos()->recaptcha_sitekey}}"></div>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		{{-- end::recaphta --}}
		<!--end::Input group-->
		<!--begin::Actions-->
		<div class="text-center">
			<!--begin::Submit button-->
			<button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
				<span class="indicator-label">Giriş Yap</span>
				<span class="indicator-progress">Lütfen Bekleyin...
				<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
			</button>
			<!--end::Submit button-->
		</div>
		<!--end::Actions-->
	</form>
	<!--end::Form-->
</div>
@endsection
	<!--end::Signin-->
