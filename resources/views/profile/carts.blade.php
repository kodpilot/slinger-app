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


		<!--begin::Row-->
		<div class="row gy-5 g-xl-10">
			<!--begin::Col-->
			<div class="col-xl-12">
				<!--begin::Table Widget 5-->
				<div class="card card-flush h-xl-100">
					<!--begin::Card header-->
					<div class="card-header pt-7">
						<!--begin::Title-->
						<h3 class="card-title align-items-start flex-column">
							<span class="card-label fw-bolder text-dark">Sepetim</span>
							<span class="text-gray-400 mt-1 fw-bold fs-6">{{count(getCarts())}} Çeşit Ürün</span>
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
									<th class="min-w-100px">Ürün Adı</th>
									<th class="text-end pe-3 min-w-100px">Ürün Adedi</th>
									<th class="text-end pe-3 min-w-150px">Sepete Eklenen Tarih</th>
									<th class="text-end pe-3 min-w-100px">Toplam</th>
								</tr>
								<!--end::Table row-->
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody class="fw-bolder text-gray-600">
								@foreach (getCarts() as $cart)
								<tr>
									<!--begin::Item-->
									<td class="text-begin"> {{$cart->name}}</td>
									<!--end::Item-->
									<!--begin::Product ID-->
									
									<form method="post" action="{{ route('cart.update', ['id' => $cart->cart_id]) }}">
										@csrf
										<td class="text-end w-20px"><input onchange="this.form.submit()" class="form-control " name="qty" type="number"
												value="{{ $cart->qty }}"></td>
									</form>
									
									<!--end::Product ID-->
									<!--begin::Date added-->
									<td class="text-end">{{date('d.m.Y H:i', strtotime($cart->created_at))}}</td>
									<!--end::Date added-->
									<!--begin::Price-->
									<td class="text-end">{{$cart->total}}₺</td>
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
        		<!--begin::details View-->
		<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
            <div class="row">
     
			<!--begin::Card body-->
			<div class="card-body p-9 col-6">
				<!--begin::Row-->
				<div class="row mb-5">
					<!--begin::Label-->
					<label class="col-lg-6 fw-bold text-muted">Sepet Toplamı</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-6">
						<span class="fw-bolder fs-6 text-gray-800">{{number_format(cartTotal(),2,',','.')}}₺</span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
				
				<!--begin::Input group-->
				<div class="row mb-5">
					<!--begin::Label-->
					<label class="col-lg-6 fw-bold text-muted">Telefon No 
					<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-6 d-flex align-items-center">
						<span class="fw-bolder fs-6 text-gray-800 me-2">{{ Auth::user()->tel }}</span>

					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->

				<!--begin::Input group-->
				<div class="row mb-5">
					<!--begin::Label-->
					<label class="col-lg-6 fw-bold text-muted">Email Adres
					<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-6 d-flex align-items-center">
						<span class="fw-bolder fs-6 text-gray-800 me-2">{{ Auth::user()->email }}</span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->
				
				
				<!--begin::Input group-->
				<div class="row mb-5">
					<!--begin::Label-->
					<label class="col-lg-6 fw-bold text-muted">İletişim Tercihi</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-6">
						<span class="fw-bolder fs-6 text-gray-800">Email, Telefon</span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Input group-->
			</div>
			<!--end::Card body-->
            
            <div class="card-body p-9 col-6">
				<form action="{{route('checkout.create')}}" method="post">
					@csrf
					<input type="hidden" id="totalPrice_h" name="total" value="{{cartTotal()}}">
                    <input type="hidden" name="user_id"  value="{{Auth::check() ? Auth::id() : 0}}">
					<button type="submit" class="btn btn-light-primary"> Ödeme Yap</button>
				</form>
            
            <a href="{{route('products')}}" class="btn btn-light-info"> Alışverişe Devam Et</a>
           </div>
        </div>
		</div>
		<!--end::details View-->
	</div>
	<!--end::Post-->
</div>
<!--end::Container-->
@endsection
