@extends('admin.layouts.master')
@section('mainTitle', 'Rol Düzenleme')
@section('path1', 'Panel')
@section('path2', 'Ürünler')
@section('footer_js')
    <!--begin::Particulars Javascript(used by this page)-->
    <script src="{{ url('panel/assets/js/particulars/save-permissions.js') }}"></script>
    <!--end::Particulars Javascript(used by this page)-->

    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ url('panel/assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ url('panel/assets/js/custom/apps/ecommerce/catalog/save-category.js') }}"></script>
    <script src="{{ url('panel/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/widgets.js') }}"></script>

    <!--end::Page Custom Javascript-->
@endsection

@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Form-->
            <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" method="post"
                action="{{ route('director.update',['id'=>$role->id]) }}" enctype="multipart/form-data">
                @csrf
                
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid">
                    <!--begin::Category-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{__('Rol Düzenleme')}}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label">{{__('Rol Adı')}}</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <input required  type="text" name="name" class="form-control mb-2"
                                    placeholder="{{__('Rol Adı')}}" value="{{$role->name}}" />
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7"></div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label">{{__('Rol Açıklaması')}}</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <input type="text" name="description" class="form-control mb-2"
                                    placeholder="{{__('Rol Açıklaması')}}" value="{{$role->description}}" />
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7"></div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mt-10" data-kt-ecommerce-catalog-add-category="auto-options">
                                <!--begin::Repeater-->
                                <div id="categories">
                                    <!--begin::Form group-->
                                    <div class="form-group">
                                        <div data-repeater-list="permissions" class="d-flex flex-column gap-3">
                                            @foreach ($permissions as $permission)
                                            <div data-repeater-item="" class="form-group d-flex flex-wrap gap-5">
                                                    <!--begin::Select2-->
                                                    <div class="w-100 w-md-300px">
                                                        <select required class="form-select"  data-id="main"  name="menu_id" data-placeholder="Yetki Alanı Seçiniz" data-kt-ecommerce-catalog-add-category="condition_type">
                                                            <option value="{{$permission->menu_id.','.$permission->menuStatu}}" selected>{{$permission->menuStatu == 2 ? '-':''}}{{getRoleActionName($permission->menu_id,$permission->menuStatu)}}</option>
                                                            @foreach (panelMenus() as $menu)
                                                                <option value="{{ $menu->id.','.'1' }}">{{ $menu->name }} </option>
                                                                @foreach (subPanelMenus($menu->id) as $submenu )
                                                                    <option value="{{ $submenu->id.','.'2' }}">-{{ $submenu->name }} </option>
                                                                @endforeach
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!--end::Select2-->
                                                    <input type="hidden" value="{{$permission->id}}" name="permission_id">
                                                <!--begin::Button-->
                                                <button type="button" data-repeater-delete="" data-id="{{$permission->id}}" data-close class="btn btn-sm btn-icon btn-light-danger ">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black" />
                                                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                                <!--end::Button-->
                                            </div>
                                            @endforeach
                                            @if ($permissions->count()<1)
                                            <div data-repeater-item="" class="form-group d-flex flex-wrap gap-5">
                                                    <!--begin::Select2-->
                                                    <div class="w-100 w-md-300px">
                                                        <select required class="form-select"  data-id="main"  name="menu_id" data-placeholder="Yetki Alanı Seçiniz" data-kt-ecommerce-catalog-add-category="condition_type">
                                                            <option value="" selected></option>
                                                            @foreach (panelMenus() as $menu)
                                                                <option value="{{ $menu->id.','.'1' }}">{{ $menu->name }} </option>
                                                                @foreach (subPanelMenus($menu->id) as $submenu )
                                                                    <option value="{{ $submenu->id.','.'2' }}">-{{ $submenu->name }} </option>
                                                                @endforeach
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!--end::Select2-->
                                                <!--begin::Button-->
                                                <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger ">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black" />
                                                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                                <!--end::Button-->
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!--end::Form group-->
                                    <!--begin::Form group-->
                                    <div class="form-group mt-5">
                                        <!--begin::Button-->
                                        <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->{{__('Ekle')}}</button>
                                        <!--end::Button-->
                                    </div>
                                    <!--end::Form group-->
                                </div>
                                <!--end::Repeater-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Category-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('product.index') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">İptal</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                            <span class="indicator-label">{{__('Kaydet')}}</span>
                            <span class="indicator-progress">{{__('Lütfen bekleyiniz')}}...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
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
        const close_buttons = document.querySelectorAll('[data-close]');
        for (let i = 0; i < close_buttons.length; i++) {
            const buttons = close_buttons[i];
            buttons.addEventListener('click',()=>{
                
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
                    'id':buttons.dataset.id
                }
                request = $.ajax({
                    url: "/panel/direktor/roller/sil",
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
                                <span>Silindi</span>
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
            })
        }
    </script>
@endsection
