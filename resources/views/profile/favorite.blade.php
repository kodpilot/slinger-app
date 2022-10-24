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
							<span class="card-label fw-bolder text-dark">Favorilerim</span>
							<span class="text-gray-400 mt-1 fw-bold fs-6">{{count($favorites)}} Adet</span>
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
									<th class="min-w-100px">Resim</th>
									<th class="text-center min-w-100px">İsim</th>
									<th class="text-center pe-3 min-w-100px">Fiyatı</th>
									<th class="text-center pe-3 min-w-100px">Eklenme Tarihi</th>
									<th class="text-center pe-3 min-w-50px">Buton</th>
								</tr>
								<!--end::Table row-->
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody class="fw-bolder text-gray-600">
								@foreach ($favorites as $favorite)
								<tr>
									<!--begin::Item-->
									<td class="text-begin">
                                        <div class="symbol symbol-45px me-5">
                                            <img src="{{ url('assets/images/products/' . ($favorite->product_file != null ? $favorite->product_file : 'empty.png') ) }}" loading="lazy" alt="" />
                                        </div>
                                    </td>
									<!--end::Item-->
									<!--begin::payment status-->
									<td class="text-center">
										<a href="{{route('product',['id'=>$favorite->product_slug])}}">{{$favorite->product_name}}</a>
									</td>
									<!--end::payment status-->
									<!--begin::Product ID-->
									<td class="text-center">{{ number_format($favorite->product_price, 2, '.', ',') }} ₺</td>
									<!--end::Product ID-->
									<!--begin::Date added-->
									<td class="text-center">{{ date('d/m/Y H:i', strtotime($favorite->favorite_date)) }}</td>
									<!--end::Date added-->
									<td class="text-center">
										<a href="{{ route('profile.favoriteDestroy', ['id' => $favorite->id]) }}" title="Sil"
                                            class="btn btn-icon btn-light-danger btn-active-danger btn-sm">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg') }}-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                        fill="black" />
                                                    <path opacity="0.5"
                                                        d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                        fill="black" />
                                                    <path opacity="0.5"
                                                        d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                        fill="black" />
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
