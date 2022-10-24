	@extends('profile.layouts.master')
	@section('content')

	<div class="flex-row-fluid ml-lg-8">
		<!--begin::Card-->
		<form action="{{ route('updatePassword') }}" method="post" class="form">
			@csrf
			<div class="card card-custom">
				<!--begin::Header-->
				<div class="card-header py-3">
					<div class="card-title align-items-start flex-column">
						<h3 class="card-label font-weight-bolder text-dark">Şifre Değiştir</h3>
						<span class="text-muted font-weight-bold font-size-sm mt-1">Şifrenizi değiştirin...</span>
					</div>
					<div class="card-toolbar">
						<button type="submit" class="btn btn-success mr-2">Kaydet</button>
						<a href="{{ route('profile.orders') }}" class="btn btn-secondary">İptal</a>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Form-->

				<div class="card-body">
					<!--begin::Alert-->
					@if ($errors->any())
					<div class="alert alert-custom alert-light-danger fade show mb-10" role="alert">
						<div class="alert-icon">
							<span class="svg-icon svg-icon-3x svg-icon-danger">
								<!--begin::Svg Icon | path:/metronic/theme/html/demo11/dist/assets/media/svg/icons/Code/Info-circle.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
										<rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
										<rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</div>
						

						<ul>
						@foreach ($errors->all() as $error)
						<li class="alert-text font-weight-bold">{{ $error }} </li><br>
							@endforeach
							</ul>
							<div class="alert-close">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">
										<i class="ki ki-close"></i>
									</span>
								</button>
							</div>
						</div>
							@endif
						<!--end::Alert-->
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 col-form-label text-alert">Mevcut Şifre</label>
							<div class="col-lg-9 col-xl-6">
								<input name="oldPassword" type="password" class="form-control form-control-lg form-control-solid mb-2" value="" placeholder="Mevcut Şifre" />
								{{-- <a href="#" class="text-sm font-weight-bold">Şifremi unuttum ?</a> --}}
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 col-form-label text-alert">Yeni Şifre</label>
							<div class="col-lg-9 col-xl-6">
								<input name="password" type="password" class="form-control form-control-lg form-control-solid" value="" placeholder="Yeni Şifre" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xl-3 col-lg-3 col-form-label text-alert">Şifre Tekrarı</label>
							<div class="col-lg-9 col-xl-6">
								<input name="password_confirmation"  type="password" class="form-control form-control-lg form-control-solid" value="" placeholder="Şifre Tekrarı" />
							</div>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>
		</div>
	</div>
	<!--end::Profile Change Password-->
</div>
<!--end::Content-->
</div>
<!--begin::Content Wrapper-->
</div>
@endsection