 <!--begin::List widget 12-->
 <div class="card card-flush h-xl-100">
    <!--begin::Header-->
    <div class="card-header pt-7">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder text-gray-800">{{__('Ziyaretçi Sayısı')}}</span>
            <span
                class="text-gray-400 mt-1 fw-bold fs-6">{{ $AnalyticsSessions->totalsForAllResults['ga:sessions'] }}
                {{__('Ziyaretçi')}}</span>
        </h3>
        <!--end::Title-->
        <span class="text-gray-400 mt-1 fw-bold fs-6" style="float: right">süre</span>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        @foreach ($AnalyticsSessions->rows as $item => $value)
            <!--begin::Item-->
            <div class="d-flex flex-stack">
                <!--begin::Section-->
                <div class="d-flex align-items-center me-5">
                    <!--begin::Symbol-->
                    <div class="symbol symbol-30px me-5">
                        <span class="symbol-label">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                            <span class="svg-icon svg-icon-3 svg-icon-gray-600">
                                {!! RedirectedSiteIcon(whichSiteRedirected($value[0])) !!}
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                    <!--end::Symbol-->
                    <!--begin::Content-->
                    <div class="me-5">
                        <!--begin::Title-->
                        <a href="#"
                            class="text-gray-800 fw-bolder text-hover-primary fs-6">{{ __(whichSiteRedirected($value[0])) }}</a>
                        <!--end::Title-->
                        <!--begin::Desc-->
                        <span
                            class="text-gray-400 fw-bold fs-7 d-block text-start ps-0">{{ __(convertHowToJoin($value[1])) }}</span>
                        <!--end::Desc-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Section-->
                <!--begin::Wrapper-->
                <div class="d-flex align-items-center">
                    <!--begin::Number-->
                    <span class="text-gray-800 fw-bolder fs-6 me-3">{{ $value[2] }}</span><span
                        class="text-muted">{{__('kişi')}} </span>
                    <!--end::Number-->
                    <!--begin::Info-->
                    <div class="d-flex flex-center">
                        <!--begin::label-->
                        <span class="badge badge-success px-2">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr067.svg-->

                            <!--end::Svg Icon-->
                            {{ gmdate('H:i:s', $value[4]) }}
                        </span>
                        <!--end::label-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Item-->
            <!--begin::Separator-->
            <div class="separator separator-dashed my-4"></div>
            <!--end::Separator-->
        @endforeach
    </div>
    <!--end::Body-->
</div>
<!--end::List widget 12-->