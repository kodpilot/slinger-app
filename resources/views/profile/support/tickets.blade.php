@extends('profile.layouts.master')
@section('mainTitle', 'Destek Sistemi')
@section('path1', 'Panel')
@section('addModal') @include('profile.support.addModal') @endsection
@section('footer_js')
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{url('panel/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{url('panel/assets/js/custom/apps/support-center/tickets/create.js') }}"></script>
<script src="{{url('panel/assets/js/custom/documentation/documentation.js') }}"></script>
<script src="{{url('panel/assets/js/widgets.bundle.js') }}"></script>
<script src="{{url('panel/assets/js/custom/widgets.js') }}"></script>
<script src="{{url('panel/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{url('panel/assets/js/custom/intro.js') }}"></script>
<script src="{{url('panel/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{url('panel/assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
<script src="{{url('panel/assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{url('panel/assets/js/custom/utilities/modals/users-search.js') }}"></script>
<!--end::Page Custom Javascript-->

@endsection
@section('content')
<!--begin::Container-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
	<!--begin::Post-->
	<div class="content flex-row-fluid" id="kt_content">
		@include('profile.layouts.navbar')
		<!--begin::Hero card-->
		<div class="card mb-12">
			<!--begin::Hero body-->
			<div class="card-body flex-column p-5">

				<!--begin::Hero nav-->
				<div class="card-rounded bg-light d-flex flex-stack flex-wrap p-5">
					<!--begin::Nav-->
					<ul class="nav flex-wrap border-transparent fw-bolder">
						<!--begin::Nav item-->
						<li class="nav-item my-1">
							<a class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase {{ request()->is('hesabim/destek/biletler') ? 'active' : null }}" href="{{ route('profile.tickets') }}">Destek</a>
						</li>
						<!--end::Nav item-->				
					</ul>
					<!--end::Nav-->
					<!--begin::Action-->
					<a href="#" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary fw-bolder fs-8 fs-lg-base">Destek Oluştur</a>
					<!--end::Action-->
				</div>
				<!--end::Hero nav-->
			</div>
			<!--end::Hero body-->
		</div>
		<!--end::Hero card-->
		<!--begin::Card-->
		<div class="card">
			<!--begin::Card body-->
			<div class="card-body">
				<!--begin::Layout-->
				<div class="d-flex flex-column flex-xl-row p-7">
					<!--begin::Content-->
					<div class="flex-lg-row-fluid me-xl-15 mb-20 mb-xl-0">
						<!--begin::Tickets-->
						<div class="mb-0">
							<!--begin::Heading-->
							<h1 class="text-dark mb-10">Destek Taleplerim</h1>
							<!--end::Heading-->
							<!--begin::Tickets List-->
							<div class="mb-10">
								@foreach ($tickets as $ticket)
									<!--begin::Ticket-->
								<div class="d-flex mb-10">
									<!--begin::Section-->
									<div class="d-flex flex-column">
										<!--begin::Content-->
										<div class="d-flex align-items-center mb-2 {{$ticket->status == 1 ? 'border-warning' : 'border-success' }} border border-dashed p-6">
											<!--begin::Title-->
											<a href="{{route('profile.messages',['id'=>$ticket->id])}}" class="text-dark text-hover-primary fs-4 me-3 fw-bold">{{$ticket->subject}}</a>
											<!--end::Title-->
											<!--begin::Label-->
											@if ($ticket->status == 1)
												<span class="badge badge-light-warning my-1">Devam Ediyor</span>
											@else
												<span class="badge badge-light-success my-1">Tamamlandı</span>
											@endif
											<!--end::Label-->
										</div>
										<!--end::Content-->
									</div>
									<!--end::Section-->
								</div>
								<!--end::Ticket-->
								@endforeach
							</div>
							<!--end::Tickets List-->
						</div>
						<!--end::Tickets-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Layout-->
			</div>
			<!--end::Card body-->
		</div>
		<!--end::Card-->
	</div>
	<!--end::Post-->
</div>
<!--end::Container-->
@endsection
