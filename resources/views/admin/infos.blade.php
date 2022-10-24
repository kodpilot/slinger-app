@extends('admin.layouts.master')
@section('mainTitle', __('Ürünler'))
@section('path1', 'Panel')
@section('footer_js')


    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ url('panel/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ url('panel/assets/js/custom/account/settings/signin-methods.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/account/settings/profile-details.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/account/settings/deactivate-account.js') }}"></script>
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
    <script src="{{ url('panel/assets/js/custom/utilities/modals/two-factor-authentication.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ url('panel/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <!--end::Page Custom Javascript-->

    <script>
        ClassicEditor
            .create(document.querySelector('#ck_editor_1'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-1 pb-2">
                    <!--begin::Navs-->
                    <ul class="nav nav-stretch nav-line-tabs nav-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab"
                                href="#general_infos">{{__('Genel Bilgiler')}}</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 " data-bs-toggle="tab"
                                href="#contact">{{__('İletişim Bilgileri')}}</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 " data-bs-toggle="tab"
                                href="#social">{{__('Sosyal Medya')}}</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 " data-bs-toggle="tab"
                                href="#company">{{__('Şirket Bilgileri')}}</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 " data-bs-toggle="tab"
                                href="#password">{{__('Şifre Değiştir')}}</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 " data-bs-toggle="tab"
                                href="#deactive">{{__('Aktif/Pasif')}}</a>
                        </li>
                        <!--end::Nav item-->

                    </ul>
                    <!--begin::Navs-->
                </div>
            </div>
            <!--end::Navbar-->
            <div class="tab-content" id="myTabContent">
                <!--begin::Basic info-->
                <div id="general_infos" class="card mb-5 mb-xl-10 tab-pane fade show active" role="tabpanel">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">{{__('Genel Bilgiler')}}</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('infos.update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Favicon
                                        <br> <span class="form-text text-muted">100*100px</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                            style="background-image: url('../assets/media/svg/avatars/blank.svg')">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url({{ url('assets/images/logos/' . getInfos()->favicon) }})">
                                            </div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Favicon Değiştir">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="favicon" accept=".png, .jpg, .jpeg, .svg" />
                                                <input type="hidden" name="faviconDelete"
                                                    value="{{ getInfos()->favicon }}" />
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Favicon Çıkış">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Favicon Sil">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <div class="form-text">{{__('Geçerli dosya tipleri')}}: png, jpg, jpeg, svg.</div>
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Logo</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                            style="background-image: url('../assets/media/svg/avatars/blank.svg')">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url({{ url('assets/images/logos/' . getInfos()->logo) }})">
                                            </div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Logo Değiştir">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="logo" accept=".png, .jpg, .jpeg, .svg" />
                                                <input type="hidden" name="logoDelete" value="{{  getInfos()->logo }}" />
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Logo Çıkış">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Logo Sil">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <div class="form-text">{{__('Geçerli dosya tipleri')}}: png, jpg, jpeg, svg.</div>
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Watermark</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                            style="background-image: url('../assets/media/svg/avatars/blank.svg')">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url({{ url('assets/images/logos/' . getInfos()->watermark) }})">
                                            </div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Watermark Değiştir">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="watermark" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="watermarkDelete" value="{{  getInfos()->watermark }}" />
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Watermark Çıkış">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Watermark Sil">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <div class="form-text">{{__('Geçerli dosya tipleri')}}: png, jpg, jpeg.
                                            <br>
                                            {{__('Zorunlu değildir')}}.
                                        </div>
                                        <!--end::Hint-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('Site Başlığı')}}
                                        <br><span class="form-text text-muted">Title</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <input name="title" class="form-control form-control-lg form-control-solid"
                                            type="text" value="{{ $infos->title }}">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('Site Açıklaması')}}
                                        <br> <span class="form-text text-muted">Description</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="description" class="form-control form-control-solid"
                                            rows="5">{{ $infos->description }}</textarea>
                                        <span class="form-text text-muted">{{__('Açıklama arama motorlarında görünecek olan açıklamadır')}}.</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                        <span class="required">{{__('Hakkımızda')}}</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="aboutUs" id="ck_editor_1" class="form-control form-control-solid"
                                            rows="3">{{ $infos->aboutUs }}</textarea>
                                        <span class="form-text text-muted">{{__('Kendinizi veya şirketinizi tanıtıcı hakkımızda yazısı')}}.</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">{{__('Anahtar Kelimeler')}}
                                        <br><span class="form-text text-muted">Keywords</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="keywords" class="form-control form-control-solid"
                                            rows="5">{{ $infos->keywords }}</textarea>
                                        <span class="form-text text-muted">{{__('Anahtar kelimeler sizi arama motorlarında öne çıkarmak için önemlidir. Aralarına (,) koyarak yazınız')}}.</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">

                                <button type="submit" class="btn btn-primary"
                                    id="kt_account_profile_details_submit">{{__('Kaydet')}}</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Basic info-->
                <!--begin::Sign-in Method-->
                <div id="contact" class="card mb-5 mb-xl-10 tab-pane fade" role="tabpanel">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_signin_method">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">{{__('İletişim Bilgileri')}}</h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('infos.update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('Telefon')}} 1
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <input name="tel1" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->tel1 }}" placeholder="Phone">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">{{__('Telefon')}} 2
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input name="tel2" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->tel2 }}" placeholder="Phone">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                        <span class="required">Whatsapp</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input name="whatsapp" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->whatsapp }}" placeholder="905076220384">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">{{__('E-mail Adres')}} 1
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input name="mail1" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->mail1 }}" placeholder="Email ">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">{{__('E-mail Adres')}}
                                        2</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input name="mail2" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->mail2 }}" placeholder="Email">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">{{__('Adres')}} 1</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input name="address1" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->address1 }}" placeholder="Adres">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">{{__('Adres')}} 2
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input name="address2" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->address2 }}" placeholder="Adres">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">{{__('Google Haritalar')}}
                                        <span class="form-text text-muted">Google Maps</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <textarea name="map" class="form-control form-control-solid"
                                            rows="9">{{ $infos->map }}</textarea>
                                        <span class="form-text text-muted">{{__('Google haritalardan ekleyeceğiniz iframe kodudur')}}.</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary"
                                    id="kt_account_profile_details_submit">{{__('Kaydet')}}</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->

                </div>
                <!--end::Sign-in Method-->
                <!--begin::Connected Accounts-->
                <div id="social" class="card mb-5 mb-xl-10 tab-pane fade" role="tabpanel">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_connected_accounts" aria-expanded="true"
                        aria-controls="kt_account_connected_accounts">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">{{__('Sosyal Medya Bilgileri')}}</h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_connected_accounts" class="collapse show">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('infos.update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label  fw-bold fs-6">Facebook
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <input name="facebook" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->facebook }}" placeholder="https://www.facebook.com/">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label  fw-bold fs-6">Instagram
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input name="instagram" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->instagram }}" placeholder="https://www.facebook.com/">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Snapwidget (Instagram Akışı)
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <textarea rows="4" name="snapwidget" 
                                            class="form-control form-control-lg form-control-solid">
                                            {{ $infos->snapwidget }}
                                        </textarea>
                                            <span class="form-text text-muted"><a href="https://snapwidget.com/"> Snapwidget.com</a> {{__('sitesinden iframe kodu oluşturunuz. Buraya ekleyiniz')}}.</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                        Twitter
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input name="twitter" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->twitter }}" placeholder="https://www.twitter.com/">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Linkedin
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input name="linkedin" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->linkedin }}" placeholder="https://www.linkedin.com/">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Youtube
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input name="youtube" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->youtube }}" placeholder="https://www.youtube.com/">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary"
                                    id="kt_account_profile_details_submit">{{__('Kaydet')}}</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Connected Accounts-->
                <!--begin::Connected Accounts-->
                <div id="company" class="card mb-5 mb-xl-10 tab-pane fade" role="tabpanel">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_connected_accounts" aria-expanded="true"
                        aria-controls="kt_account_connected_accounts">
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">{{__('Şirket/Firma Bilgileri')}}</h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_connected_accounts" class="collapse show">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('infos.update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label  fw-bold fs-6">{{__('Şirket Adı')}}
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <input name="companyName" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->companyName }}">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label  fw-bold fs-6">{{__('Şirket Sahibi')}}
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input name="companyOfficial" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->companyOfficial }}" placeholder="">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                                        {{__('Şirket Adresi')}}
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input name="companyAddress" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->companyAddress }}">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">{{__('Şirket Telefonu')}}
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input name="companyPhone" type="text"
                                            class="form-control form-control-lg form-control-solid"
                                            value="{{ $infos->companyPhone }}" placeholder="">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->


                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary"
                                    id="kt_account_profile_details_submit">{{__('Kaydet')}}</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->

                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Connected Accounts-->
                <!--begin::Notifications-->
                <div id="password" class="card mb-5 mb-xl-10 tab-pane fade" role="tabpanel">

                    <!--begin::Content-->
                    <div id="kt_account_settings_signin_method" class="collapse show">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Email Address-->
                            <div class="d-flex flex-wrap align-items-center">
                                <!--begin::Label-->
                                <div id="kt_signin_email">
                                    <div class="fs-6 fw-bolder mb-1">{{__('E-mail Adres')}}</div>
                                    <div class="fw-bold text-gray-600">{{ Auth::user()->email }}</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Edit-->
                                <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                    <!--begin::Form-->
                                    <form id="kt_signin_change_email" class="form" novalidate="novalidate">
                                        <div class="row mb-6">
                                            <div class="col-lg-6 mb-4 mb-lg-0">
                                                <div class="fv-row mb-0">
                                                    <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">{{__('Yeni email adresi')}}</label>
                                                    <input type="email"
                                                        class="form-control form-control-lg form-control-solid"
                                                        id="emailaddress" placeholder="{{__('E-mail Adres')}}" value="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="fv-row mb-0">
                                                    <label for="confirmemailpassword"
                                                        class="form-label fs-6 fw-bolder mb-3">{{__('Şifre')}}</label>
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-solid"
                                                        placeholder="{{__('Şifre')}}" id="confirmemailpassword" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button id="kt_signin_submit" type="button"
                                                class="btn btn-primary me-2 px-6">{{__('Güncelle')}}</button>
                                            <button id="kt_signin_cancel" type="button"
                                                class="btn btn-color-gray-400 btn-active-light-primary px-6">{{__('İptal')}}</button>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Edit-->
                                <!--begin::Action-->
                                <div id="kt_signin_email_button" class="ms-auto">
                                    <button class="btn btn-light btn-active-light-primary">{{__('Email Değiştir')}}</button>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Email Address-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-6"></div>
                            <!--end::Separator-->
                            <!--begin::Password-->
                            <div class="d-flex flex-wrap align-items-center mb-10">
                                <!--begin::Label-->
                                <div id="kt_signin_password">
                                    <div class="fs-6 fw-bolder mb-1">{{__('Şifre')}}</div>
                                    <div class="fw-bold text-gray-600">************</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Edit-->
                                <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                    <!--begin::Form-->
                                    <form class="form" action="{{ route('infos.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-1">
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="currentpassword"
                                                        class="form-label fs-6 fw-bolder mb-3">{{__('Mevcut Şifre')}}</label>
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-solid"
                                                        id="currentpassword" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="newpassword" class="form-label fs-6 fw-bolder mb-3">{{__('Yeni Şifre')}}</label>
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-solid"
                                                        id="newpassword" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="fv-row mb-0">
                                                    <label for="confirmpassword"
                                                        class="form-label fs-6 fw-bolder mb-3">{{__('Şifre Tekrarı')}}</label>
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-solid"
                                                        id="confirmpassword" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-text mb-5">{{__('Şifre en az 6 karakter olmalı')}}</div>
                                        <div class="d-flex">
                                            <button id="kt_password_submit" type="button"
                                                class="btn btn-primary me-2 px-6">{{__('Şifre Yenile')}}</button>
                                            <button id="kt_password_cancel" type="button"
                                                class="btn btn-color-gray-400 btn-active-light-primary px-6">{{__('İptal')}}</button>
                                        </div>
                                    </form>
                                </div>
                                <!--end::Edit-->
                                <!--begin::Action-->
                                <div id="kt_signin_password_button" class="ms-auto">
                                    <button class="btn btn-light btn-active-light-primary">{{__('Şifre Yenile')}}</button>
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Password-->

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Notifications-->
                <!--begin::Deactivate Account-->
                <div id="deactive" class="card mb-5 mb-xl-10 tab-pane fade" role="tabpanel">
                    <form action="{{route('infos.update')}}" class="form" method="POST">
                    @csrf
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Items-->
                            <div class="py-2">
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <div class="d-flex">

                                        <div class="d-flex flex-column">
                                            <a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">{{__('Site Bakımda Sayfası')}}</a>
                                            <div class="fs-6 fw-bold text-gray-400">{{__('Eğer aktif yaparsanız siteniz şu anda bakımdır uyarısı verecektir')}}..</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="form-check form-check-solid form-switch">

                                            @if ($infos->status == '1')
                                                <input class="form-check-input w-45px h-30px" change="window.location.href='pasif'" type="checkbox"
                                                    name="status">
                                            @else
                                                <input class="form-check-input w-45px h-30px" type="checkbox" name="status"
                                                    checked="">
                                            @endif
                                            <label class="form-check-label" for="googleswitch"></label>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">

                        <button type="submit" class="btn btn-primary"
                            id="kt_account_profile_details_submit">{{__('Kaydet')}}</button>
                    </div>
                    <!--end::Actions-->
                </form>
                </div>
                <!--end::Deactivate Account-->
            </div>
            <!--begin::Modals-->
            <!--begin::Modal - Two-factor authentication-->
            <div class="modal fade" id="kt_modal_two_factor_authentication" tabindex="-1" aria-hidden="true">
                <!--begin::Modal header-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header flex-stack">
                            <!--begin::Title-->
                            <h2>Choose An Authentication Method</h2>
                            <!--end::Title-->
                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                            transform="rotate(-45 6 17.3137)" fill="black" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                            transform="rotate(45 7.41422 6)" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--begin::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y pt-10 pb-15 px-lg-17">
                            <!--begin::Options-->
                            <div data-kt-element="options">
                                <!--begin::Notice-->
                                <p class="text-muted fs-5 fw-bold mb-10">In addition to your username and password, you’ll
                                    have to enter a code (delivered via app or SMS) to log into your account.</p>
                                <!--end::Notice-->
                                <!--begin::Wrapper-->
                                <div class="pb-10">
                                    <!--begin::Option-->
                                    <input type="radio" class="btn-check" value="apps" checked="checked"
                                        id="kt_modal_two_factor_authentication_option_1" />
                                    <label
                                        class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-5"
                                        for="kt_modal_two_factor_authentication_option_1">
                                        <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                                        <span class="svg-icon svg-icon-4x me-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                                    fill="black" />
                                                <path
                                                    d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <span class="d-block fw-bold text-start">
                                            <span class="text-dark fw-bolder d-block fs-3">Authenticator Apps</span>
                                            <span class="text-muted fw-bold fs-6">Get codes from an app like Google
                                                Authenticator, Microsoft Authenticator, Authy or 1Password.</span>
                                        </span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <input type="radio" class="btn-check" value="sms"
                                        id="kt_modal_two_factor_authentication_option_2" />
                                    <label
                                        class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center"
                                        for="kt_modal_two_factor_authentication_option_2">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
                                        <span class="svg-icon svg-icon-4x me-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
                                                    fill="black" />
                                                <path
                                                    d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <span class="d-block fw-bold text-start">
                                            <span class="text-dark fw-bolder d-block fs-3">SMS</span>
                                            <span class="text-muted fw-bold fs-6">We will send a code via SMS if you need
                                                to use your backup login method.</span>
                                        </span>
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Options-->
                                <!--begin::Action-->
                                <button class="btn btn-primary w-100" data-kt-element="options-select">Continue</button>
                                <!--end::Action-->
                            </div>
                            <!--end::Options-->
                            <!--begin::Apps-->
                            <div class="d-none" data-kt-element="apps">
                                <!--begin::Heading-->
                                <h3 class="text-dark fw-bolder mb-7">Authenticator Apps</h3>
                                <!--end::Heading-->
                                <!--begin::Description-->
                                <div class="text-gray-500 fw-bold fs-6 mb-10">Using an authenticator app like
                                    <a href="https://support.google.com/accounts/answer/1066447?hl=en"
                                        target="_blank">Google Authenticator</a>,
                                    <a href="https://www.microsoft.com/en-us/account/authenticator"
                                        target="_blank">Microsoft Authenticator</a>,
                                    <a href="https://authy.com/download/" target="_blank">Authy</a>, or
                                    <a href="https://support.1password.com/one-time-passwords/"
                                        target="_blank">1Password</a>, scan the QR code. It will generate a 6 digit code for
                                    you to enter below.
                                    <!--begin::QR code image-->
                                    <div class="pt-5 text-center">
                                        <img src="{{ url('panel/assets/media/misc/qr.png') }}" alt=""
                                            class="mw-150px" />
                                    </div>
                                    <!--end::QR code image-->
                                </div>
                                <!--end::Description-->
                                <!--begin::Notice-->
                                <div
                                    class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-10 p-6">
                                    <!--begin::Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)"
                                                fill="black" />
                                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--end::Icon-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <!--begin::Content-->
                                        <div class="fw-bold">
                                            <div class="fs-6 text-gray-700">If you having trouble using the QR code, select
                                                manual entry on your app, and enter your username and the code:
                                                <div class="fw-bolder text-dark pt-2">KBSS3QDAAFUMCBY63YCKI5WSSVACUMPN
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Notice-->
                                <!--begin::Form-->
                                <form data-kt-element="apps-form" class="form" action="#">
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                            placeholder="Enter authentication code" name="code" />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex flex-center">
                                        <button type="reset" data-kt-element="apps-cancel"
                                            class="btn btn-light me-3">Cancel</button>
                                        <button type="submit" data-kt-element="apps-submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Options-->
                            <!--begin::SMS-->
                            <div class="d-none" data-kt-element="sms">
                                <!--begin::Heading-->
                                <h3 class="text-dark fw-bolder fs-3 mb-5">SMS: Verify Your Mobile Number</h3>
                                <!--end::Heading-->
                                <!--begin::Notice-->
                                <div class="text-muted fw-bold mb-10">Enter your mobile phone number with country code and
                                    we will send you a verification code upon request.</div>
                                <!--end::Notice-->
                                <!--begin::Form-->
                                <form data-kt-element="sms-form" class="form" action="#">
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <input type="text" class="form-control form-control-lg form-control-solid"
                                            placeholder="Mobile number with country code..." name="mobile" />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex flex-center">
                                        <button type="reset" data-kt-element="sms-cancel"
                                            class="btn btn-light me-3">Cancel</button>
                                        <button type="submit" data-kt-element="sms-submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::SMS-->
                        </div>
                        <!--begin::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal header-->
            </div>
            <!--end::Modal - Two-factor authentication-->
            <!--end::Modals-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
@endsection
