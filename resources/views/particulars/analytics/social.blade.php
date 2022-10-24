
    <!--begin::List widget 9-->
    <div class="card card-flush h-xl-100">
        <!--begin::Header-->
        <div class="card-header pt-7">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-gray-800">{{__('Sosyal Medyalardan Gelen Kullanıcı Sayısı')}}</span>
            </h3>
            <!--end::Title-->
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-5">
            @foreach ($AnalyticsSessions->rows as $social)
                @if (socialNames($social[0]) != null)
                    <!--begin::Item-->
                    <div class="d-flex flex-stack">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center me-5">
                            <!--begin::Flag-->
                            <img src="/panel/assets/media/svg/brand-logos/{{ getFileSoical(socialNames($social[0])) }}"
                                class="me-4 w-30px" style="border-radius: 4px" alt="" />
                            <!--end::Flag-->
                            <!--begin::Content-->
                            <div class="me-5">
                                <!--begin::Title-->
                                <a href="#"
                                    class="text-gray-800 fw-bolder text-hover-primary fs-6">{{ socialNames($social[0]) }}</a>
                                <!--end::Title-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center">
                            <!--begin::Number-->
                            <span
                                class="text-gray-800 fw-bolder fs-6 me-3">{{ $social[2] }}</span><span
                                class="text-muted">{{__('kişi')}}</span>
                            <!--end::Number-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->
                @endif
            @endforeach

        </div>
        <!--end::Body-->
    </div>
    <!--end::List widget 9-->
