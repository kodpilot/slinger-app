@extends('profile.layouts.master')
@section('mainTitle', 'Ürünler')
@section('path1', 'Panel')
@section('footer_js')


<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{url('panel/assets/plugins/custom/datatables/datatables.bundle.js') }} "></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{url('panel/assets/js/widgets.bundle.js') }} "></script>
<script src="{{url('panel/assets/js/custom/widgets.js') }} "></script>
<script src="{{url('panel/assets/js/custom/apps/chat/chat.js') }} "></script>
<script src="{{url('panel/assets/js/custom/intro.js') }} "></script>
<script src="{{url('panel/assets/js/custom/utilities/modals/upgrade-plan.js') }} "></script>
<script src="{{url('panel/assets/js/custom/utilities/modals/create-campaign.js') }} "></script>
<script src="{{url('panel/assets/js/custom/utilities/modals/create-app.js') }} "></script>
<script src="{{url('panel/assets/js/custom/utilities/modals/offer-a-deal/type.js') }} "></script>
<script src="{{url('panel/assets/js/custom/utilities/modals/offer-a-deal/details.js') }} "></script>
<script src="{{url('panel/assets/js/custom/utilities/modals/offer-a-deal/finance.js') }} "></script>
<script src="{{url('panel/assets/js/custom/utilities/modals/offer-a-deal/complete.js') }} "></script>
<script src="{{url('panel/assets/js/custom/utilities/modals/offer-a-deal/main.js') }} "></script>
<script src="{{url('panel/assets/js/custom/utilities/modals/users-search.js') }} "></script>
<!--end::Page Custom Javascript-->

@endsection
@section('content')
<!--begin::Container-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
	<!--begin::Post-->
	<div class="content flex-row-fluid" id="kt_content">
	@include('profile.layouts.navbar')
		<!--begin::details View-->
		<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
			<!--begin::Card header-->
			<div class="card-header cursor-pointer">
				<!--begin::Card title-->
				<div class="card-title m-0">
					<h3 class="fw-bolder m-0">Profil Detayları</h3>
				</div>
				<!--end::Card title-->
				<!--begin::Action-->
				<a href="{{route('profile.editProfile')}}" class="btn btn-light align-self-center">Profil Düzenle</a>
				<!--end::Action-->
			</div>
			<!--begin::Card header-->
			<!--begin::Card body-->
			<div class="card-body p-9">
				<!--begin::Row-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-bold text-muted">Ad Soyad</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						<span class="fw-bolder fs-6 text-gray-800">{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
				
				<!--begin::Input group-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-bold text-muted">Telefon No</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 ">
						<span class="fw-bolder fs-6 text-gray-800 ">{{ Auth::user()->tel }}</span>
						{{-- <span class="badge badge-success">Doğrulandı</span> --}}
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->

				<!--begin::Input group-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-bold text-muted">Email Adres
					<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Emailiniz doğrulanmış olması gerekmektedir."></i></label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8 d-flex align-items-center">
						<span class="fw-bolder fs-6 text-gray-800 me-2">{{ Auth::user()->email }}</span>
						@if (Auth::user()->status == 0)
						<span class="badge badge-danger">Doğrulanmadı</span>
						@else
						<span class="badge badge-success">Doğrulandı</span>
						@endif
						
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->
				
				
				
				<!--begin::Input group-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-bold text-muted">İletişim Tercihi</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						<span class="fw-bolder fs-6 text-gray-800">Email, Telefon</span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->
				@if (Auth::user()->status == 0)
				{{-- begin:verification alert --}}
				<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
					<!--begin::Icon-->
					<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
					<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
							<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>
							<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>
						</svg>
					</span>
					<!--end::Svg Icon-->
					<!--end::Icon-->
					<!--begin::Wrapper-->
					<div class="d-flex flex-stack flex-grow-1">
						<!--begin::Content-->
						<div class="fw-bold">
							<h4 class="text-gray-900 fw-bolder">Hesabınızı doğrulamanız gerekmektedir!</h4>
							<div class="fs-6 text-gray-700">Üyeliğinize güvenebilmemiz için hesabınızı doğrulamanıza ihtiyacımız var.
							<a class="fw-bolder" href="{{route('profile.sendVerifyMail',['id'=>Auth::user()->id])}}">Doğrulama maili gönder</a>.</div>
						</div>
						<!--end::Content-->
					</div>
					<!--end::Wrapper-->
				</div>
				{{-- end:verification alert --}}
				@endif

				
			</div>
			<!--end::Card body-->
		</div>
		<!--end::details View-->
		<!--begin::Row-->
		<div class="row gy-5 g-xl-10">
			<!--begin::Col-->
			<div class="col-xl-4">
				<!--begin::List widget 5-->
				<div class="card card-flush h-xl-100">
					<!--begin::Header-->
					<div class="card-header pt-7">
						<!--begin::Title-->
						<h3 class="card-title align-items-start flex-column">
							<span class="card-label fw-bolder text-dark">Son Siparişim</span>
						</h3>
						<!--end::Title-->
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body">
						@if (isset($orderUpdates))
							<!--begin::Scroll-->
						<div class="hover-scroll-overlay-y pe-6 me-n6" style="height: 415px">
							@foreach ($orderUpdates as $orderUpdate)
								<!--begin::Item-->
								<div class="rounded border-gray-300 border-1 border-gray-300 border-dashed px-7 py-3 mb-6">
									<!--begin::Info-->
									<div class="d-flex flex-stack mb-3">
										<!--begin::Wrapper-->
										<div class="me-3">
											<!--begin::Icon-->
											<img src="{{url('panel/assets/media/stock/ecommerce/210.gif') }} " class="w-50px ms-n1 me-1" alt="" />
											<!--end::Icon-->
											<!--begin::Title-->
											<a href="../apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bolder">{{date('d.m.Y H:i',strtotime($orderUpdate->updated_at))}}</a>
											<!--end::Title-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::Info-->
									<!--begin::Customer-->
									<div class="d-flex flex-stack">
										<!--begin::Name-->
										<span class="text-gray-400 fw-bolder">
										<a class="text-gray-800 text-hover-primary fw-bolder">{{Auth::user()->name}}</a></span>
										<!--end::Name-->
										<!--begin::Label-->
										@if ($orderUpdate->status == 'Bekleniyor')
										<span class="badge badge-light-dark">Bekleniyor</span>
										@elseif($orderUpdate->status == 'Hazırlanıyor')
										<span class="badge badge-light-warning">Hazırlanıyor</span>
										@elseif($orderUpdate->status == 'Kargoya Verildi')
										<span class="badge badge-light-primary">Kargoya Verildi</span>
										@elseif($orderUpdate->status == 'Tamamlandı')
										<span class="badge badge-light-success">Tamamlandı</span>
										@elseif($orderUpdate->status == 'İptal Edildi')
										<span class="badge badge-light-danger">İptal Edildi</span>
										@else
										<span class="badge badge-light-danger">İade Edildi</span>
										@endif
	
										<!--end::Label-->
									</div>
									<!--end::Customer-->
								</div>
								<!--end::Item-->
							@endforeach
							</div>
							<!--end::Scroll-->
						@endif
					</div>
					<!--end::Body-->
				</div>
				<!--end::List widget 5-->
			</div>
			<!--end::Col-->
			<!--begin::Col-->
			<div class="col-xl-8">
				<!--begin::Table Widget 5-->
				<div class="card card-flush h-xl-100">
					<!--begin::Card header-->
					<div class="card-header pt-7">
						<!--begin::Title-->
						<h3 class="card-title align-items-start flex-column">
							<span class="card-label fw-bolder text-dark">Siparişlerim</span>
							<span class="text-gray-400 mt-1 fw-bold fs-6">{{count($orders)}} Adet</span>
						</h3>
						<!--end::Title-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body">
						<!--begin::Table-->
						<table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
							<!--begin::Table head-->
							<thead>
								<!--begin::Table row-->
								<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
									<th class="min-w-100px">Sipariş ID</th>
									<th class="text-end pe-3 min-w-100px">Sipariş Tarihi</th>
									<th class="text-end pe-3 min-w-100px">Toplam Fiyat</th>
									<th class="text-end pe-3 min-w-50px">Durumu</th>
									<th class="text-end pe-3 min-w-50px">Detay</th>
								</tr>
								<!--end::Table row-->
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody class="fw-bolder text-gray-600">
								@foreach ($orders as $order)
								<tr>
									<!--begin::Item-->
									<td class="text-begin">{{$order->order_id}}</td>
									<!--end::Item-->
									<!--begin::Product ID-->
									<td class="text-end"> {{date('d.m.Y H:i',strtotime($order->order_date))}}</td>
									<!--end::Product ID-->
									<!--begin::Date added-->
									<td class="text-end">{{$order->order_total}}₺</td>
									<!--end::Date added-->
									<!--begin::Price-->
									<td class="text-end">
										@if ($order->order_status == "Bekleniyor")
										<span class="badge py-3 px-4 fs-7 badge-light-dark">{{$order->order_status}}</span>
										@elseif ($order->order_status == "Hazırlanıyor")
										<span class="badge py-3 px-4 fs-7 badge-light-warning">{{$order->order_status}}</span>
										@elseif ($order->order_status == "Kargoya Verildi")
										<span class="badge py-3 px-4 fs-7 badge-light-primary">{{$order->order_status}}</span>
										@elseif ($order->order_status == "Tamamlandı")
										<span class="badge py-3 px-4 fs-7 badge-light-success">{{$order->order_status}}</span>
										@elseif ($order->order_status == "İptal Edildi")
										<span class="badge py-3 px-4 fs-7 badge-light-danger">{{$order->order_status}}</span>
										@else
										<span class="badge py-3 px-4 fs-7 badge-light-danger">{{$order->order_status}}</span>
										@endif
									</td>
									<td class="text-end">
										<a href="{{ route('profile.editOrders', ['id' => $order->order_id]) }}"
											class="btn btn-icon btn-light-primary btn-active-primary btn-sm me-1">
											<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg') }}-->
											<span class="svg-icon svg-icon-1">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
													viewBox="0 0 24 24" fill="none">
													<path opacity="0.3"
														d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
														fill="black" />
													<rect x="7" y="17" width="6" height="2" rx="1" fill="black" />
													<rect x="7" y="12" width="10" height="2" rx="1" fill="black" />
													<rect x="7" y="7" width="6" height="2" rx="1" fill="black" />
													<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</a>
									</td>
									<!--end::Price-->
								</tr>
								@endforeach
							</tbody>
							<!--end::Table body-->
						</table>
						<!--end::Table-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Table Widget 5-->
			</div>
			<!--end::Col-->
		</div>
		<!--end::Row-->
	</div>
	<!--end::Post-->
</div>
<!--end::Container-->
@endsection
