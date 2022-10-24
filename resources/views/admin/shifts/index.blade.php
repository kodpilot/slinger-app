@extends('admin.layouts.master')
@section('mainTitle', __('Shifts'))
@section('path1', 'Panel')

@section('footer_js')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ url('panel/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ url('panel/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/intro.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
@endsection
@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Tables Widget 1-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">{{__('Shifts')}}</span>
                        <span class="text-muted mt-1 fw-bold fs-7">{{__('Toplam shifts sayısı')}} {{ $shifts->count() }} </span>
                    </h3>

                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="w-25px">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true"
                                                data-kt-check-target=".widget-9-check" />
                                        </div>
                                    </th>
                                    <th class="min-w-150px">{{__('Şirket Adı')}}</th>
                                    <th class="min-w-140px">
                                        <a class="text-muted">{{__('Şirket Yeri')}}</a> 
                                    </th>
                                    <th class="min-w-140px">{{__('Shift Fiyatı')}}</th>
                                    <th class="min-w-140px">{{__('Shift Süresi')}}</th>
                                    <th class="min-w-140px">{{__('Shift Tarihi')}}</th>
                                    <th class="min-w-100px text-end">{{__('Eylemler')}}</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach ($shifts as $shift)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                                            </div>
                                        </td>
                                        <td>
                                            {{ companyName($shift->id) }}
                                        </td>
                                        <td>
                                            {{ $shift->location }}
                                        </td>
                                        <td>
                                            {{ $shift->price }}
                                        </td>
                                        <td>
                                            {{ $shift->start_time }}-{{$shift->end_time}}
                                        </td>
                                        <td>
                                            {{ $shift->shift_date }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                <div class="d-flex justify-content-end flex-shrink-0">
                                                    <a class="btn btn-sm  {{ $shift->status == '1' ? 'btn-light-success' : 'btn-light' }}  me-3">
                                                        {{ $category->status == '1' ? __('Aktif') : __('Pasif') }}</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Tables Widget 1-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->

@endsection
