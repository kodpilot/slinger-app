@extends('admin.layouts.master')
@section('mainTitle', __('Şirket Düzenle'))
@section('path1', 'Panel')
@section('path2', __('Şirketler'))
@section('footer_js')
    <!--begin::Particulars Javascript(used by this page)-->
    <script src="{{ url('panel/assets/js/particulars/getCategory.js') }}"></script>
    <script src="{{ url('panel/assets/js/particulars/products.js') }}"></script>
    <script src="{{ url('panel/assets/js/particulars/deleteAjax.js') }}"></script>
    <script src="{{ url('panel/assets/js/particulars/ProductMultipleCategoryAjax.js') }}"></script>
    <!--end::Particulars Javascript(used by this page)-->

    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ url('panel/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ url('panel/assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ url('panel/assets/js/custom/apps/ecommerce/catalog/save-product.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/apps/ecommerce/catalog/save-category.js') }}"></script>
    <script src="{{ url('panel/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/intro.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Page Custom Javascript-->
@endsection

@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Form-->
            <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" method="post"
                action="{{ route('company.update', ['id' => $show->id]) }}" enctype="multipart/form-data">
                @csrf
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{__('Fotoğraf')}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true"
                                style="background-image: url({{ url('assets/images/companies/' . $show->file) }})">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                    title="Ürün Resmi Ekleyiniz.">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                                    {{-- <input type="hidden" name="fileDelete" /> --}}
                                    {{-- <input type="hidden" name="fileDelete" /> --}}
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">{{__('Ürün fotoğrafı formatı *.png, *.jpg and *.jpeg olmalıdır.')}}</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Thumbnail settings-->

                    <!--begin::Category & tags-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{__('Watermark Seçimi')}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="fv-row w-100 flex-md-root mt-3">
                            <!--begin::Option-->
                            <label
                                class="btn btn-outline btn-outline-dashed m-0 p-1 col-4btn-outline-default  d-flex text-start p-6">
                                <!--begin::Radio-->
                                <span
                                    class="form-check form-check-custom form-check-solid   form-check-sm align-items-start mt-1">
                                    <input class="form-check-input" onclick="if(this.checked){document.querySelector('#watermark_photo').value=1}else{document.querySelector('#watermark_photo').value=0}" type="checkbox" name="watermark"
                                        value="1" />
                                </span>
                                <!--end::Radio-->
                                <!--begin::Info-->
                                <span class="ms-5">
                                    <span class="fs-4 fw-bolder text-gray-800 d-block">{{__('Watermark')}}</span>
                                </span>
                                <!--end::Info-->
                            </label>
                            <!--end::Option-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">{{__('Watermark ürün fotoğraflarınızın internette başkaları tarafından kullanılmaması için fotoğraflarınızın üzerini logonuz ile imzalama işlemidir.Eğer watermark eklemediyseniz')}}
                                <a href="{{route('infos.index')}}">{{__('buradan')}}</a>
                                {{__('ekleyebilirsiniz')}}.

                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->


                        <!--begin::Input group-->
                        <div class="fv-row w-100 flex-md-root mt-3">
                            <!--begin::Option-->
                            <label class="form-label">
                                {{__('Watermark Pozisyonu')}}
                            </label>
                            <!--begin::Option-->
                            <!--begin::Radio group-->
                            <div style="border: 1px solid rgb(228, 230, 239);border-radius:.75rem;" data-kt-buttons="true">
                                <div class="col-12 d-flex justify-content-evenly align-items-center mt-2 mb-2">
                                    <!--begin::Radio button-->
                                    <label style="aspect-ratio: 1/1;" class="btn btn-outline btn-outline-dashed m-0 p-2 col-3 d-flex justify-content-center">
                                        <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid form-check-primary">
                                                <input class="form-check-input" type="radio" name="watermark_position" {{getinfos()->watermark_position == 'top-left' ? 'checked':''}} name="watermark_position" value="top-left"/>
                                            </div>
                                            <!--end::Radio-->
                                    </label>
                                    <!--end::Radio button-->
                                    <!--begin::Radio button-->
                                    <label style="aspect-ratio: 1/1;" class="btn btn-outline btn-outline-dashed m-0 p-2 col-3 d-flex justify-content-center">
                                        <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid form-check-primary">
                                                <input class="form-check-input" type="radio" name="watermark_position" {{getinfos()->watermark_position == 'top' ? 'checked':''}} name="watermark_position" value="top"/>
                                            </div>
                                            <!--end::Radio-->
                                    </label>
                                    <!--end::Radio button-->
                                    <!--begin::Radio button-->
                                    <label style="aspect-ratio: 1/1;" class="btn btn-outline btn-outline-dashed m-0 p-2 col-3 d-flex justify-content-center">
                                        <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid form-check-primary">
                                                <input class="form-check-input" type="radio" name="watermark_position" {{getinfos()->watermark_position == 'top-right' ? 'checked':''}} name="watermark_position" value="top-right"/>
                                            </div>
                                            <!--end::Radio-->
                                    </label>
                                    <!--end::Radio button-->
                                </div>
                                <div  class="col-12 d-flex justify-content-evenly align-items-center mb-2">
                                    <!--begin::Radio button-->
                                    <label style="aspect-ratio: 1/1;" class="btn btn-outline btn-outline-dashed m-0 p-2 col-3 d-flex justify-content-center">
                                        <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid form-check-primary">
                                                <input class="form-check-input" type="radio" name="watermark_position" {{getinfos()->watermark_position == 'left' ? 'checked':''}} name="watermark_position" value="left"/>
                                            </div>
                                            <!--end::Radio-->
                                    </label>
                                    <!--end::Radio button-->
                                    <!--begin::Radio button-->
                                    <label style="aspect-ratio: 1/1;" class="btn btn-outline btn-outline-dashed m-0 p-2 col-3 d-flex justify-content-center">
                                        <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid form-check-primary">
                                                <input class="form-check-input" type="radio" name="watermark_position" {{getinfos()->watermark_position == 'center' ? 'checked':''}} name="watermark_position" value="center"/>
                                            </div>
                                            <!--end::Radio-->
                                    </label>
                                    <!--end::Radio button-->
                                    <!--begin::Radio button-->
                                    <label style="aspect-ratio: 1/1;" class="btn btn-outline btn-outline-dashed m-0 p-2 col-3 d-flex justify-content-center">
                                        <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid form-check-primary">
                                                <input class="form-check-input" type="radio" name="watermark_position" {{getinfos()->watermark_position == 'right' ? 'checked':''}} name="watermark_position" value="right"/>
                                            </div>
                                            <!--end::Radio-->
                                    </label>
                                    <!--end::Radio button-->
                                </div>
                                <div class="col-12 d-flex justify-content-evenly align-items-center mb-2">
                                    <!--begin::Radio button-->
                                    <label style="aspect-ratio: 1/1;" class="btn btn-outline btn-outline-dashed m-0 p-2 col-3 d-flex justify-content-center">
                                        <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid form-check-primary">
                                                <input class="form-check-input" type="radio" name="watermark_position" {{getinfos()->watermark_position == 'bottom-left' ? 'checked':''}} name="watermark_position" value="bottom-left"/>
                                            </div>
                                            <!--end::Radio-->
                                    </label>
                                    <!--end::Radio button-->
                                    <!--begin::Radio button-->
                                    <label style="aspect-ratio: 1/1;" class="btn btn-outline btn-outline-dashed m-0 p-2 col-3 d-flex justify-content-center">
                                        <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid form-check-primary">
                                                <input class="form-check-input" type="radio" name="watermark_position" {{getinfos()->watermark_position == 'bottom' ? 'checked':''}} name="watermark_position" value="bottom"/>
                                            </div>
                                            <!--end::Radio-->
                                    </label>
                                    <!--end::Radio button-->
                                    <!--begin::Radio button-->
                                    <label style="aspect-ratio: 1/1;" class="btn btn-outline btn-outline-dashed m-0 p-2 col-3 d-flex justify-content-center">
                                        <!--begin::Radio-->
                                            <div class="form-check form-check-custom form-check-solid form-check-primary">
                                                <input class="form-check-input" type="radio" name="watermark_position" {{getinfos()->watermark_position == 'bottom-right' ? 'checked':''}} name="watermark_position" value="bottom-right"/>
                                            </div>
                                            <!--end::Radio-->
                                    </label>
                                    <!--end::Radio button-->
                                </div>
                            </div>
                            <!--end::Radio group-->
                        </div>
                        <!--end::Input group-->
                        
                        <!--begin::Input group-->
                        <div class="fv-row w-100 flex-md-root mt-3">
                            <label class="form-label">{{__('Watermark Boyutu')}}</label>
                            <div class="row">
                                <div class="col-10">
                                    <input type="range" oninput="document.querySelector('#watermark_size').innerText = `${this.value}%`" value="{{getinfos()->watermark_size}}" min="0" max="100" name="watermark_size" class="form-range">
                                </div>
                                <div class="col-2">
                                    <span class="badge badge-light-success p-2 fs-7" id="watermark_size">{{getinfos()->watermark_size}}%</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row w-100 flex-md-root mt-3">
                            <label class="form-label">{{__('Watermark Opaklığı')}}</label>
                            <div class="row">
                                <div class="col-10">
                                    <input type="range" oninput="document.querySelector('#watermark_opacity').innerText = `${this.value}%`" value="{{getinfos()->watermark_opacity}}" min="0" max="100" name="watermark_opacity" class="form-range">
                                </div>
                                <div class="col-2">
                                    <span class="badge badge-light-success p-2 fs-7" id="watermark_opacity">{{getinfos()->watermark_opacity}}%</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row w-100 flex-md-root mt-3">
                            <label class="form-label">{{__('Watermark Döndürme')}}</label>
                            <div class="row">
                                <div class="col-10">
                                    <input type="range" oninput="document.querySelector('#watermark_rotate').innerText = `${this.value}°`" min="0" value="{{getinfos()->watermark_rotate}}" max="360" name="watermark_rotate" class="form-range">
                                </div>
                                <div class="col-2">
                                    <span class="badge badge-light-success p-2 fs-7" id="watermark_rotate">{{getinfos()->watermark_rotate}}°</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row w-100 flex-md-root mt-3">
                            <button type="button" class="btn btn-success btn-light-success w-100 preview_watermark" data-bs-toggle="modal" data-bs-target="#preview_watermark_modal">{{__('Önizleme')}}</button>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row w-100 flex-md-root mt-3">
                            <!--begin::Option-->
                            <label
                                class="btn btn-outline btn-outline-dashed m-0 p-1 col-4btn-outline-default  d-flex text-start p-6">
                                <!--begin::Radio-->
                                <span
                                    class="form-check form-check-custom form-check-solid   form-check-sm align-items-start mt-1">
                                    <input class="form-check-input" type="checkbox" name="remember_watermark"
                                        value="1" />
                                </span>
                                <!--end::Radio-->
                                <!--begin::Info-->
                                <span class="ms-5">
                                    <span class="fs-7 fw-bolder text-gray-800 d-block">{{__('Seçimi hatırla')}}</span>
                                </span>
                                <!--end::Info-->
                            </label>
                            <!--end::Option-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">
                                {{__('Seçimi hatırla dediğinizde varsayılan olarak seçtiğiniz değerler kullanılır')}}
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->

                        
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Category & tags-->
                    <!--begin::Weekly sales-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{__('Etiketler')}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <!--begin::Label-->
                            <label class="form-label d-block">{{__('Etiketler')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input id="kt_ecommerce_add_product_tags" name="tags" class="form-control mb-2"
                                value="{{ $show->tags }}" />
                            <!--end::Input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">{{__('Aramalar için kelimeler belirleyin. Aralara virgül koyunuz')}}</div>
                            <!--end::Description-->
                            <!--end::Input group-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Weekly sales-->

                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                href="#general">{{__('Genel')}}</a>
                        </li>
                        <!--end:::Tab item-->
                        
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#photos">{{__('Fotoğraflar')}}</a>
                        </li>
                        <!--end:::Tab item-->
                        
                        
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                href="#category">{{__('Kategoriler')}}</a>
                        </li>
                        <!--end:::Tab item-->
                        
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{__('Genel')}}</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">{{__('Şirket Adı')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text"
                                                onblur="document.querySelector('#code').value=this.value.substring(0,2).toUpperCase()+'{{ $show->id }}'"
                                                name="name" class="form-control mb-2" placeholder="{{__('Şirket Adı')}}"
                                                value="{{ $show->name }}" />
                                            <!--end::Input-->
                                            <!--begin::Description-->
                                            {{-- <div class="text-muted fs-7">A product name is required and recommended to be
                                                unique.</div> --}}
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">{{__('Kısa Açıklama')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="description" class="form-control mb-2"
                                                placeholder="{{__('Kısa Açıklama')}}" value="{{ $show->description }}" />
                                            <!--end::Input-->
                                            <!--begin::Description-->

                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div>
                                            <!--begin::Label-->
                                            <label class="form-label">{{__('Uzun Açıklama')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Editor-->
                                            <div type="text" id="kt_ecommerce_add_product_description" name="text"
                                                class="min-h-200px mb-2">{!! $show->text !!}</div>
                                            <!--end::Editor-->
                                            <!--begin::Description-->

                                            <!--end::Description-->
                                        </div>

                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->

                                <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">
                                    <!--begin::Label-->
                                    <label class="form-label">{{__('Yüzdelik İndirim Oranı')}}</label>
                                    <!--end::Label-->
                                    <!--begin::Slider-->
                                    <div class="d-flex flex-column text-center mb-5">
                                        <div class="d-flex align-items-start justify-content-center mb-7">
                                            <span class="fw-bolder fs-3x"
                                                id="kt_ecommerce_add_product_discount_label">0</span>
                                            <span class="fw-bolder fs-4 mt-1 ms-2">%</span>
                                        </div>
                                        <div id="kt_ecommerce_add_product_discount_slider" class="noUi-sm">
                                        </div>
                                    </div>
                                    <!--end::Slider-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">{{__('Bu ayarı yaptığınızda ürüne indirim uygulanacaktır.')}}</div>
                                    <!--end::Description-->
                                    {{-- <input type="hidden" id="percentageValue" name="percentage" value="0"> --}}
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_fixed">
                                    <!--begin::Label-->
                                    <label class="form-label">{{__('Eski Fiyat')}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    {{-- <input type="text" name="price" class="form-control mb-2"
                                        placeholder="{{__('Eski Fiyat')}}" value="{{ $show->price }}" /> --}}
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">{{__('Eğer ürününüze indirim yaptıysanız buraya eski fiyatını giriniz')}}!</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->

                            </div>
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="photos" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">

                                <!--begin::Media-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{__('Fotoğraf Ekle')}}</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Form-->
                                        <form class="form"
                                            action="{{ route('photo.create', ['id' => $show->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" value="0" name="iswatermark_photo" id="watermark_photo">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-2">
                                                <!--begin::Dropzone-->
                                                {{-- <div class="dropzone" id="kt_dropzonejs_example_1"> --}}
                                                <div class="dropzone" id="kt_ecommerce_add_product_media">
                                                    <input type="hidden" value="{{ $show->id }}" id="product_id">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">{{__('Sürükleyerek veya tıklayarak fotoğraf yükleyiniz')}}</h3>
                                                            <span class="fs-7 fw-bold text-gray-400">{{__('En fazla 5 fotoğraf yükleyiniz')}}</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>

                                                </div>
                                                <!--end::Dropzone-->

                                            </div>
                                            <!--end::Input group-->

                                        </form>
                                        <!--end::Form-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">{{__('Fotoğraf boyutu ne kadar küçük olursa siteniz o kadar hızlanır')}}. </div>
                                        <!--end::Description-->
                                        <!--begin::Body-->
                                        <div class="card-body py-3">
                                            <!--begin::Table container-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table
                                                    class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                                    id="productsTable">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr class="fw-bolder text-muted">
                                                            <th class="min-w-100px">{{__('Fotoğraf')}} ID </th>
                                                            <th class=" min-w-175px">{{__('Fotoğraf')}}</th>
                                                            <th class=" min-w-100px">{{__('Tarih')}}</th>
                                                            <th class=" min-w-100px">{{__('Eylemler')}}</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="products_">
                                                        @foreach ($photos as $photo)
                                                            <tr id="item-{{ $photo->id }}">
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div
                                                                            class="d-flex justify-content-start flex-column">
                                                                            <a
                                                                                class="text-dark fw-bolder text-hover-primary fs-6">{{ $photo->id }}</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="symbol symbol-45px me-5">
                                                                            <img src="{{ url('assets/images/photos/' . $photo->file) }}"
                                                                                loading="lazy" alt="" />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex flex-column w-100 me-2">
                                                                        <div class="d-flex flex-stack mb-2">
                                                                            <span
                                                                                class="text-muted me-2 fs-7 fw-bold">{{ date('d/m/Y H:i', strtotime($photo->created_at)) }}</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('photo.destroy', ['id' => $photo->id]) }}"
                                                                        class="btn btn-icon btn-light-danger btn-active-danger btn-sm">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg') }}-->
                                                                        <span class="svg-icon svg-icon-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                                fill="none">
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
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Table container-->
                                        </div>
                                        <!--end::Body-->
                                    </div>

                                    <!--end::Card header-->
                                </div>
                                <!--end::Media-->
                            </div>
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="category" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::Category-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{__('Kategoriler')}}</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="mt-10" data-kt-ecommerce-catalog-add-category="auto-options">
                                            <!--begin::Repeater-->
                                            <div id="categories">
                                                <!--begin::Form group-->
                                                <div class="form-group">
                                                    <div data-repeater-list="categories" class="d-flex flex-column gap-3">
                                                        @foreach ($category_options as $option)
                                                            <div data-repeater-item=""
                                                                class="form-group d-flex flex-wrap gap-5">
                                                                <!--begin::Select2-->
                                                                <div class="w-100 w-md-300px">
                                                                    <select class="form-select"
                                                                        onchange="getMultipleSelected(event)" data-id="main"
                                                                        name="category_id"
                                                                        data-placeholder="{{__('Kategori Seçiniz')}}"
                                                                        data-kt-ecommerce-catalog-add-category="condition_type">
                                                                        @foreach ($categories as $category)
                                                                            @if ($category->status == 1)
                                                                                @if ($category->id == $option->category_id)
                                                                                    <option value="{{ $category->id }}"
                                                                                        selected>{{ $category->name }}
                                                                                    </option>
                                                                                @else
                                                                                    <option value="{{ $category->id }}">
                                                                                        {{ $category->name }} </option>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <!--end::Select2-->
                                                                <!--begin::Select2-->
                                                                <div class="w-100 w-md-300px">
                                                                    <select class="form-select" data-id="sub"
                                                                        name="subcategory_id"
                                                                        data-placeholder="{{__('Alt Kategori Seçiniz(optional)')}}"
                                                                        data-kt-ecommerce-catalog-add-category="condition_equals">
                                                                        @foreach ($subcategories as $subcategory)
                                                                            @if ($subcategory->id == $option->subcategory_id)
                                                                                <option value="{{ $subcategory->id }}">
                                                                                    {{ $subcategory->name }} </option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <!--end::Select2-->
                                                                <input type="hidden" name="category_option_id"
                                                                    value="{{ $option->id }}">
                                                                <!--begin::Button-->
                                                                <button type="button" data-repeater-delete
                                                                    data-id={{ $option->id }}
                                                                    class="btn btn-sm btn-icon btn-light-danger deleteCategories">
                                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                                    <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                                            <rect opacity="0.5" x="7.05025" y="15.5356"
                                                                                width="12" height="2" rx="1"
                                                                                transform="rotate(-45 7.05025 15.5356)"
                                                                                fill="black" />
                                                                            <rect x="8.46447" y="7.05029" width="12"
                                                                                height="2" rx="1"
                                                                                transform="rotate(45 8.46447 7.05029)"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </button>
                                                                <!--end::Button-->
                                                            </div>
                                                        @endforeach
                                                        @if (count($category_options) < 1)
                                                            <div data-repeater-item=""
                                                                class="form-group d-flex flex-wrap gap-5">
                                                                <!--begin::Select2-->
                                                                <div class="w-100 w-md-300px">
                                                                    <select required class="form-select"
                                                                        onchange="getMultipleSelected(event)" data-id="main"
                                                                        name="category_id"
                                                                        data-placeholder="{{__('Kategori Seçiniz')}}"
                                                                        data-kt-ecommerce-catalog-add-category="condition_type">
                                                                        <option value="" selected></option>
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}">
                                                                                {{ $category->name }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <!--end::Select2-->
                                                                <!--begin::Select2-->
                                                                <div class="w-100 w-md-300px">
                                                                    <select class="form-select" data-id="sub"
                                                                        name="subcategory_id"
                                                                        data-placeholder="{{__('Alt Kategori Seçiniz(optional)')}}"
                                                                        data-kt-ecommerce-catalog-add-category="condition_equals">
                                                                    </select>
                                                                </div>
                                                                <!--end::Select2-->
                                                                <!--begin::Button-->
                                                                <button type="button" data-repeater-delete=""
                                                                    class="btn btn-sm btn-icon btn-light-danger ">
                                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                                    <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                                            <rect opacity="0.5" x="7.05025" y="15.5356"
                                                                                width="12" height="2" rx="1"
                                                                                transform="rotate(-45 7.05025 15.5356)"
                                                                                fill="black" />
                                                                            <rect x="8.46447" y="7.05029" width="12"
                                                                                height="2" rx="1"
                                                                                transform="rotate(45 8.46447 7.05029)"
                                                                                fill="black" />
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
                                                    <button type="button" data-repeater-create=""
                                                        class="btn btn-sm btn-light-primary">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="11" y="18" width="12" height="2"
                                                                    rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                                <rect x="6" y="11" width="12" height="2" rx="1"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->{{__('Ekle')}}
                                                    </button>
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
                            </div>
                        </div>
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('company.index') }}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">{{__('İptal')}}</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        {{-- <button type="submit" class="btn btn-primary"> --}}
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
    <div class="modal fade" tabindex="-1" id="preview_watermark_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Watermark Önizleme')}}</h5>
    
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <style>
                    .preview{
                        width: 100%;
                        background: #aaa;
                        aspect-ratio:1/1;
                        position: relative;
                    }
                    .p_watermark{
                        aspect-ratio:1/1;
                        position: absolute;
                        background: #009EF7;
                    }
                </style>
                <div class="modal-body">
                    <div class="preview">
                        <div class="p_watermark d-flex justify-content-center align-items-center flex-column text-center">{{__('Watermark')}}</div>
                    </div>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{__('Kapat')}}</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.preview_watermark').addEventListener('click',() => {
        let watermark_position  =   document.querySelector('input[name="watermark_position"]:checked').value;
        let watermark_size      =   document.querySelector('input[name="watermark_size"]').value;
        let watermark_opacity   =   document.querySelector('input[name="watermark_opacity"]').value;
        let watermark_rotate    =   document.querySelector('input[name="watermark_rotate"]').value;

        console.log(watermark_position,watermark_opacity,watermark_size,watermark_rotate);

        let positions = {
            "top-left":{"left":"0","top":"0"},
            "top":{"left":"50%","top":"0","transform":"translateX(-50%)"},
            "top-right":{"right":"0","top":"0"},
            "left":{"left":"0","top":"50%"},
            "center":{"left":"50%","top":"50%","transform":"translate(-50%,-50%)"},
            "right":{"right":"0","top":"50%"},
            "bottom-left":{"left":"0","bottom":"0"},
            "bottom":{"left":"50%","bottom":"0","transform":"translateX(-50%)"},
            "bottom-right":{"right":"0","bottom":"0"},
        };
        let watermark = document.querySelector('.p_watermark');
        
        watermark.style["left"] = "auto";
        watermark.style["top"] = "auto";
        watermark.style["right"] = "auto";
        watermark.style["bottom"] = "auto";
        watermark.style["transform"] = "none";

        for(let key in positions[watermark_position]){
            watermark.style[key] = positions[watermark_position][key];
        }
        watermark.style.width = `${watermark_size}%`;
        watermark.style.opacity = watermark_opacity/100;
        watermark.style.transform = `${watermark.style.transform != "none" ? watermark.style.transform : ''} rotateZ(-${watermark_rotate}deg)`
        },true)
    </script>

<style>
    .alertBox{
        width: 240px;
        position: fixed;
        top: 12%;
        right: 10px;
    }
</style>
<div class="alertBox"></div>
@endsection
