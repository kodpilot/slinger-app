@extends('profile.layouts.master')
@section('mainTitle', 'Ürünler')
@section('path1', 'Panel')
@section('footer_js')
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ url('panel/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{url('panel/assets/js/particulars/profileAddAddress.js')}}"></script>
<script src="{{url('panel/assets/js/particulars/countrycitystate.js')}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ url('panel/assets/js/widgets.bundle.js') }}"></script> 
<script src="{{ url('panel/assets/js/custom/widgets.js') }}"></script>
<script src="{{ url('panel/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ url('panel/assets/js/custom/intro.js') }}"></script>
<script src="{{ url('panel/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ url('panel/assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
<script src="{{ url('panel/assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ url('panel/assets/js/custom/utilities/modals/offer-a-deal/type.js') }}"></script>
<script src="{{ url('panel/assets/js/custom/utilities/modals/offer-a-deal/details.js') }}"></script>
<script src="{{ url('panel/assets/js/custom/utilities/modals/offer-a-deal/finance.js') }}"></script>
<script src="{{ url('panel/assets/js/custom/utilities/modals/offer-a-deal/complete.js') }}"></script>
<script src="{{ url('panel/assets/js/custom/utilities/modals/offer-a-deal/main.js') }}"></script>
<script src="{{ url('panel/assets/js/custom/utilities/modals/new-card.js') }}"></script>
<script src="{{ url('panel/assets/js/custom/utilities/modals/users-search.js') }}"></script>
<!--end::Page Custom Javascript-->

@endsection
@section('content')
<!--begin::Container-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
	<!--begin::Post-->
	<div class="content flex-row-fluid" id="kt_content">
		@include('profile.layouts.navbar')
		<div class="card mb-12">
			<!--begin::Hero body-->
			<div class="card-body flex-column p-5">

				<!--begin::Hero nav-->
				<div class="d-flex flex-stack flex-wrap p-5">
					<!--begin::Nav-->
						<ul class="nav flex-wrap border-transparent fw-bolder">
							<!--begin::Nav item-->
							<li class="nav-item my-1">
								<h3>Adres Bilgileri </h3>
								
							</li>
							<!--end::Nav item-->				
						</ul>
					<!--end::Nav-->
					<!--begin::Action-->
					<a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">Yeni Adres Ekle</a>
					<!--end::Action-->
				</div>
				<!--end::Hero nav-->
			</div>
			<!--end::Hero body-->
		</div>
		<!--begin::Billing Address-->
		<div class="card mb-5 mb-xl-10">
			<!--begin::Card header-->
			
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body">
				<!--begin::Addresses-->
				<div class="row gx-9 gy-6">
					<!--begin::Col-->
					@foreach ($addresses as $address)
						<div class="col-xl-6">
							<!--begin::Address-->
							<div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
								<!--begin::Details-->
								<div class="d-flex flex-column py-2">
									<div class="d-flex align-items-center fs-5 fw-bolder mb-5">{{$address->addressName}}</div>
									<div class="fs-6 fw-bold text-gray-600">{{$address->address}}</div>
								</div>
								<!--end::Details-->
								<!--begin::Actions-->
								<div class="d-flex align-items-center py-2">
									<a href="{{route('address.destroy',['id'=>$address->id])}}" class="btn btn-sm btn-light btn-active-light-primary me-3">Sil</a>
									<button class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_address">Düzenle</button>
								</div>
								<!--end::Actions-->
							</div>
							<!--end::Address-->
						</div>
					@endforeach
					<!--end::Col-->
				</div>
				<!--end::Addresses-->
			</div>
			<!--end::Card body-->
		</div>
		<!--end::Billing Address-->
		<!--begin::Modals-->
		<!--begin::Modal - New Address-->
		<!--begin::Modal - New Address-->
		<div class="modal fade" id="kt_modal_new_address" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Form-->
					<form class="form" action="{{route('address.create_ajax')}}" method="POST" id="kt_modal_new_address_form">
						@csrf
						<!--begin::Modal header-->
						<div class="modal-header" id="kt_modal_new_address_header">
							<!--begin::Modal title-->
							<h2>Adres Ekle</h2>
							<!--end::Modal title-->
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
								<span class="svg-icon svg-icon-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
										<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</div>
							<!--end::Close-->
						</div>
						<!--end::Modal header-->
						<!--begin::Modal body-->
						<div class="modal-body py-10 px-lg-17">
							<!--begin::Scroll-->
							<div class="scroll-y me-n7 pe-7" id="addressRow" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
								<!--begin::Input group-->
								<div class="row mb-5">
									<!--begin::Col-->
									<div class="col-md-6 fv-row">
										<!--begin::Label-->
										<label class="required fs-5 fw-bold mb-2">Ad</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text" class="form-control form-control-solid" placeholder="" name="name" />
										<!--end::Input-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-6 fv-row">
										<!--end::Label-->
										<label class="required fs-5 fw-bold mb-2">Soyad</label>
										<!--end::Label-->
										<!--end::Input-->
										<input type="text" class="form-control form-control-solid" placeholder="" name="surname" />
										<!--end::Input-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="row mb-5">
									<!--begin::Col-->
									<div class="col-md-12 fv-row">
										<!--begin::Label-->
										<label class="required fs-5 fw-bold mb-2">Adres Adı</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text" class="form-control form-control-solid" placeholder="" name="adressName" />
										<!--end::Input-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-5 fv-row">
									<!--begin::Label-->
									<label class="d-flex align-items-center fs-5 fw-bold mb-2">
										<span class="required">Ülke</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Ödeme Yöntemlerinde Önemlidir!"></i>
									</label>
									<!--end::Label-->
									<!--begin::Select-->
									<select name="country" data-control="select2" data-dropdown-parent="#kt_modal_new_address" data-placeholder="Ülke Seçiniz" class="form-select form-select-solid">
										<option class="countrySelect" value="">Ülke Seçiniz</option>
									</select>
									<!--end::Select-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-5 fv-row">
									<!--begin::Label-->
									<label class="d-flex align-items-center fs-5 fw-bold mb-2">
										<span class="required">İl</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Ödeme Yöntemlerinde Önemlidir!"></i>
									</label>
									<!--end::Label-->
									<!--begin::Select-->
									<select name="city" data-control="select2" data-dropdown-parent="#kt_modal_new_address" data-placeholder="İl Seçiniz" class="form-select form-select-solid ">
										<option class="citys" value="">İl Seçiniz</option>
									</select>
									<!--end::Select-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="row g-9 mb-5">
									<!--begin::Col-->
									<div class="col-md-6 fv-row">
										<!--begin::Input group-->
										<div class="d-flex flex-column mb-5 fv-row">
											<!--begin::Label-->
											<label class="d-flex align-items-center fs-5 fw-bold mb-2">
												<span class="required">İlçe</span>
												<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Ödeme Yöntemlerinde Önemlidir!"></i>
											</label>
											<!--end::Label-->
											<!--begin::Select-->
											<select name="state" data-control="select2" data-dropdown-parent="#kt_modal_new_address" data-placeholder="İlçe Seçiniz" class="form-select form-select-solid ">
												<option class="states" value="">İlçe Seçiniz</option>
											</select>
											<!--end::Select-->
										</div>
										<!--end::Input group-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-6 fv-row">
										<!--begin::Label-->
										<label class="fs-5 fw-bold mb-2">Posta Kodu</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control form-control-solid" placeholder="" name="postcode" />
										<!--end::Input-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-5 fv-row">
									<!--begin::Label-->
									<label class="required fs-5 fw-bold mb-2">Adres</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input class="form-control form-control-solid" placeholder="" name="address" />
									<!--end::Input-->
								</div>
								<!--end::Input group-->
							</div>
							<!--end::Scroll-->
						</div>
						<!--end::Modal body-->
						<!--begin::Modal footer-->
						<div class="modal-footer flex-center">
							<!--begin::Button-->
							<button type="reset" id="kt_modal_new_address_cancel" class="btn btn-light me-3">İptal</button>
							<!--end::Button-->
							<!--begin::Button-->
							<button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
								<span class="indicator-label">Ekle</span>
								<span class="indicator-progress">Bekleyiniz... 
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
							<!--end::Button-->
						</div>
						<!--end::Modal footer-->
					</form>
					<!--end::Form-->
				</div>
			</div>
		</div>
		<!--end::Modal - New Address-->
		<!--end::Modal - New Address-->
		<!--end::Modals-->
	</div>
	<!--end::Post-->
</div>
<!--end::Container-->
@endsection
