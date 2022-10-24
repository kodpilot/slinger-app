<!--begin::Modal - Add Modal-->
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form class="form" method="post" action="{{ route('product.collectiveUpdate') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">{{__('Toplu Fiyat Değiştir')}}</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">{{__('Kategori')}}</span>
                            </label>
                            <!--end::Label-->
                            <select onchange="getSelected('add_modal_categoryID')" id="add_modal_categoryID"
                                name="categoryID" class="form-control form-control-lg form-control-solid form-select"
                                required="true">
                                <option value="*" selected>{{__('Tüm Ürünler')}}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">{{__('Alt Kategori')}}</span>
                            </label>
                            <!--end::Label-->
                            <select name="categoryID2" id="add_modal_categoryID2"
                                class="form-control form-control-lg form-control-solid form-select" required="true">

                            </select>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">{{__('İşlem Tipi')}}</span>
                            </label>
                            <!--end::Label-->
                            <select name="progress_type" class="form-control form-control-lg form-control-solid form-select" required="true">
                                <option value="0">{{__('Fiyat Düşür')}}</option>
                                <option value="1">{{__('Fiyat Yükselt')}}</option>
                            </select>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">

                            <input class="form-check-input" type="radio" value="0" name="persentege" id="flexRadioDefault" />
                            <label class="form-check-label" for="flexRadioDefault">
                                {{__('Tutar')}}
                            </label>


                            <input class="form-check-input" type="radio" value="1" name="persentege" id="flexRadioDefault" />
                            <label class="form-check-label">
                                {{__('Oran')}}(%)
                            </label>

                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">{{__('Fiyat')}}</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid"
                                placeholder="{{__('Ürün Fiyatını Giriniz')}} " name="price" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" data-bs-dismiss="modal"
                            class="btn btn-light me-3">{{__('İptal')}}</button>
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">{{__('Ekle')}}</span>
                            <span class="indicator-progress">{{__('Lütfen Bekleyin')}}...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->

        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add Modal-->
