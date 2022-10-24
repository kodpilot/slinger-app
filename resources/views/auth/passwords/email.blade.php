@extends('auth.layouts.header')
@section('log-reg')
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Authentication - Password reset -->
		<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/metronic8/demo20/assets/media/illustrations/sketchy-1/14.png">
			<!--begin::Content-->
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
				<!--begin::Logo-->
				<a href="{{route('index')}}" class="mb-12">
					<img alt="Logo" src="{{url('assets/images/logos/'.getInfos()->logo)}}" class="h-100px" />
				</a>
				<!--end::Logo-->
				<!--begin::Wrapper-->
				<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
					<!--begin::Form-->
					<form class="form w-100" method="POST" action="{{route('resetPassword')}}">
						@csrf
						<!--begin::Heading-->
						<div class="text-center mb-10">
							<!--begin::Title-->
							<h1 class="text-dark mb-3">Şifrenizi mi unuttunuz?</h1>
							<!--end::Title-->
							<!--begin::Link-->
							<div class="text-gray-400 fw-bold fs-4">Gönderdiğimiz mailden şifrenizi sıfırlayın.</div>
							<!--end::Link-->
						</div>
						<!--begin::Heading-->
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
							<input class="form-control form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
						</div>
						<!--end::Input group-->
						<div class="fv-row mb-10">
							{!!getCaptcha()!!}
						</div>
						<!--begin::Actions-->
						<div class="d-flex flex-wrap justify-content-center pb-lg-0">
							<button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
								<span class="indicator-label">Gönder</span>
								<span class="indicator-progress">Lütfen Bekleyin... 
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
							<a href="{{route('login')}}" class="btn btn-lg btn-light-primary fw-bolder">İptal</a>
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Authentication - Password reset-->
	</div>
	<!--end::Root-->
@endsection