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
							<span class="card-label fw-bolder text-dark">Yorumlarım</span>
							<span class="text-gray-400 mt-1 fw-bold fs-6">{{count($reviews)}} Adet</span>
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
									<th class="min-w-100px">Ürün/Blog</th>
									<th class="text-end pe-3 min-w-100px">Yorum Tarihi</th>
									<th class="text-end pe-3 min-w-100px">Başlık</th>
									<th class="text-end pe-3 min-w-50px">Yorum</th>
								</tr>
								<!--end::Table row-->
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody class="fw-bolder text-gray-600">
								@foreach ($reviews as $review)
								<tr>
									<!--begin::Item-->
									@if ($review->product_id != 0)
									<td class="text-begin">{{getSingleProduct($review->product_id)->name }} <span class="badge py-3 px-4 fs-7 badge-light-info"> Ürün Yorumu</span></td>
									@else
									<td class="text-begin">{{getSingleBlog($review->blog_id)->title}} <span class="badge py-3 px-4 fs-7 badge-light-primary"> Blog Yorumu</span></td>
									@endif
									
									<!--end::Item-->
									<!--begin::Product ID-->
									<td class="text-end">{{$review->created_at}}</td>
									<!--end::Product ID-->
									<!--begin::Date added-->
									<td class="text-end">{{$review->subject}}</td>
									<!--end::Date added-->
									<!--begin::Price-->
									<td class="text-end">{{$review->description}}</td>
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
