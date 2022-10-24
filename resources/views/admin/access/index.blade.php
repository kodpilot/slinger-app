@extends('admin.layouts.master')
@section('mainTitle', __('Yetkilendirme Ayarları'))
@section('path1', 'Panel')
{{-- @section('addModal') @include('admin.subCategories.addModal') @endsection --}}
{{-- @section('editModal') @include('admin.subCategories.editModal') @endsection --}}
@section('footer_js')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ url('panel/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ url('panel/assets/js/particulars/gameSettings.js') }}"></script>
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
                        <span class="card-label fw-bolder fs-3 mb-1">{{__('Yetkilendirme Ayarları')}}</span>
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
                                    <th class="min-w-140px">{{__('Kullanıcı')}}</th>
                                    <th class="min-w-140px">{{__('Rol')}}</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <select onchange="changeRole({{$user->id}},this.value)" required class="form-select"  data-id="main"  name="admin" data-placeholder="{{__('Rol Seçiniz')}}" data-kt-ecommerce-catalog-add-category="condition_type">
                                                <option value="{{$user->admin}}" selected>{{__(getRoleName($user->admin))}}</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{__($role->name)}} </option>
                                                @endforeach
                                            </select>
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


    <style>
        .alertBox{
            width: 240px;
            position: fixed;
            top: 12%;
            right: 10px;
        }
    </style>
    <div class="alertBox"></div>

    <script>
        function changeRole(user_id,role_id){
            let request;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                if (request) {
                    request.abort();
                }
                const serializedData = {
                    'user_id':user_id,
                    'role_id':role_id
                }
                request = $.ajax({
                    url: "/panel/direktor/yetkilendirme/guncelle",
                    type: "post",
                    data: serializedData
                });
                request.done(function (response, textStatus, jqXHR){
                    //başarılı istek
                    const template = `
                        <!--begin::Alert-->
                        <div class="alert alert-dismissible bg-${'success'} d-flex flex-column flex-sm-row p-5 mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                                <!--begin::Title-->
                                <h4 class="mb-2 light text-white">${'Başarılı'}</h4>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <span>Guncellendi</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Close-->
                            <button data-process="close" type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                                <span class="svg-icon svg-icon-2x svg-icon-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="black"/>
                                        <path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="black"/>
                                    </svg>
                                </span>
                            </button>
                            <!--end::Close-->
                        </div>
                        <!--end::Alert-->`;
                        let div = document.createElement('div');
                        div.innerHTML = template;
                        const alertBox = document.querySelector('.alertBox');
                        alertBox.insertAdjacentElement('beforeend',div);
                        setTimeout(() => {
                        let closeButton = div.querySelector('[data-process="close"]');
                        if(closeButton){closeButton.click()}
                        }, 1500);
                });
                request.fail(function (jqXHR, textStatus, errorThrown){
                //başarısız istek
                const template = `
                <!--begin::Alert-->
                <div class="alert alert-dismissible bg-${'danger'} d-flex flex-column flex-sm-row p-5 mb-10">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                        <!--begin::Title-->
                        <h4 class="mb-2 light text-white">${'Başarılı'}</h4>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <span>${'Bir Hata Oluştu!'}</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Close-->
                    <button data-process="close" type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                        <span class="svg-icon svg-icon-2x svg-icon-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="black"/>
                                <path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="black"/>
                            </svg>
                        </span>
                    </button>
                    <!--end::Close-->
                </div>
                <!--end::Alert-->`;
                let div = document.createElement('div');
                div.innerHTML = template;
                const alertBox = document.querySelector('.alertBox');
                alertBox.insertAdjacentElement('beforeend',div);
                setTimeout(() => {
                let closeButton = div.querySelector('[data-process="close"]');
                if(closeButton){closeButton.click()}
                }, 1500);
                });
        }
    </script>

@endsection
