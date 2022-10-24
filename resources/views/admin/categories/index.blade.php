@extends('admin.layouts.master')
@section('mainTitle', __('Kategoriler'))
@section('path1', 'Panel')
@section('addModal') @include('admin.categories.addModal') @endsection
@section('editModal') @include('admin.categories.editModal') @endsection
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
                        <span class="card-label fw-bolder fs-3 mb-1">{{__('Kategoriler')}}</span>
                        <span class="text-muted mt-1 fw-bold fs-7">{{__('Toplam kategori sayısı')}} {{ $categories->count() }} </span>
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
                                    <th class="min-w-150px">{{__('Resim')}}</th>
                                    <th class="min-w-140px">
                                        @if (isset($order))
                                            @if ($order[0] == 'name')
                                                @if ($order[1] == 'asc')
                                                    <a href="{{route('category.sort',['order'=>'name,desc'])}}">{{__('Kategori Adı')}}
                                                    <span class="svg-icon svg-icon-primary svg-icon-2hx"><svg style="height: 1.5rem !important;width:1.5rem !important" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>
                                                    </svg></span></a>
                                                @else
                                                    <a href="{{route('category.sort',['order'=>'name,asc'])}}">{{__('Kategori Adı')}}
                                                    <span class="svg-icon svg-icon-primary svg-icon-2hx"><svg style="height: 1.5rem !important;width:1.5rem !important" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M12.5657 11.3657L16.75 15.55C17.1642 15.9643 17.8358 15.9643 18.25 15.55C18.6642 15.1358 18.6642 14.4643 18.25 14.05L12.7071 8.50716C12.3166 8.11663 11.6834 8.11663 11.2929 8.50715L5.75 14.05C5.33579 14.4643 5.33579 15.1358 5.75 15.55C6.16421 15.9643 6.83579 15.9643 7.25 15.55L11.4343 11.3657C11.7467 11.0533 12.2533 11.0533 12.5657 11.3657Z" fill="black"/>
                                                    </svg></span></a>
                                                @endif
                                            @else
                                            <a class="text-muted" href="{{route('category.sort',['order'=>'name,asc'])}}">{{__('Kategori Adı')}}</a> 
                                            @endif
                                        @else
                                            <a class="text-muted" href="{{route('category.sort',['order'=>'name,asc'])}}">{{__('Kategori Adı')}}</a> 
                                        @endif 
                                    </th>
                                    <th class="min-w-140px">{{__('Açıklama')}}</th>
                                    <th class="min-w-100px text-end">{{__('Eylemler')}}</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class=" me-5">
                                                    @if ($category->file != null)
                                                        <img class="sliderImage" src="{{ url('assets/images/categories/' . $category->file) }}"
                                                            alt="Kategori Resmi" />
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            {{ $category->description }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                <div class="d-flex justify-content-end flex-shrink-0">
                                                    <a class="btn btn-sm  {{ $category->status == '1' ? 'btn-light-success' : 'btn-light' }}  me-3"
                                                        href="{{ route('category.destroy', ['id' => $category->id]) }}">
                                                        {{ $category->status == '1' ? __('Aktif') : __('Pasif') }}</a>
                                                    <button class="btn btn-sm btn-light-warning btn-active-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $category->id }}">{{__('Düzenle')}}</button>
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
