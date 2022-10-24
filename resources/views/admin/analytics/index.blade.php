@extends('admin.layouts.master')
@section('mainTitle', __('İstatistikler'))
@section('path1', 'Panel')
@section('footer_js')
    <!--begin::Javascript-->

    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="/panel/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="/panel/assets/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="/panel/assets/js/widgets.bundle.js"></script>
    <script src="/panel/assets/js/custom/widgets.js"></script>
    <script src="/panel/assets/js/custom/apps/chat/chat.js"></script>
    <script src="/panel/assets/js/custom/intro.js"></script>
    <script src="/panel/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="/panel/assets/js/custom/utilities/modals/create-campaign.js"></script>
    <script src="/panel/assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="/panel/assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    <script src="/panel/assets/js/particulars/il-ilce.js"></script>
    <script>
        var countryCodes = {!! json_encode($jsonWhereVisited) !!};
        var browserSessions = {!! json_encode($AnalyticsBrowsers) !!};
        var hourActivity = {!! json_encode($AnalyticsWhichHour) !!};
        var AnalyticsCitys = {!! json_encode($AnalyticsCitys) !!};
    </script>
    <script src="/panel/assets/js/particulars/AnalyticsDatePicker.js"></script>
    <script src="/panel/assets/js/particulars/customAnalytics.js"></script>
    <script>
        $("#kt_daterangepicker_1").daterangepicker();
    </script>
@endsection
@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <div class="col-xxl-12">
                    <div class="row">
                        <a href="{{ route('analytics.index', ['startDate' => 'yesterday']) }}" style="width: fit-content"
                            type="button"
                            class="btn btn-light-primary {{ request()->route('startDate') == 'yesterday' ? 'active' : null }} FilterTime m-1">
                            {{__('DÜN')}}
                        </a>
                        <a href="{{ route('analytics.index', ['startDate' => 'lastOneWeek']) }}"
                            style="width: fit-content" type="button"
                            class="btn btn-light-primary {{ request()->route('startDate') == 'lastOneWeek' ? 'active' : null }} FilterTime m-1">
                            {{__('SON 7 GÜN')}}
                        </a>
                        <a href="{{ route('analytics.index', ['startDate' => 'lastThirtyDay']) }}"
                            style="width: fit-content" type="button"
                            class="btn btn-light-primary {{ request()->route('startDate') == 'lastThirtyDay' ? 'active' : null }} FilterTime m-1">
                            {{__('SON 30 GÜN')}}
                        </a>
                        <a href="{{ route('analytics.index', ['startDate' => 'thisMounth']) }}"
                            style="width: fit-content" type="button"
                            class="btn btn-light-primary {{ request()->route('startDate') == 'thisMounth' ? 'active' : null }} {{ !request()->route('startDate') ? 'active' : null }} FilterTime m-1">
                            {{__('BU AY')}}
                        </a>
                        <a href="{{ route('analytics.index', ['startDate' => 'lastOneYear']) }}"
                            style="width: fit-content" type="button"
                            class="btn btn-light-primary {{ request()->route('startDate') == 'lastOneYear' ? 'active' : null }} FilterTime m-1">
                            {{__('SON 1 YIL')}}
                        </a>
                        {{-- <input type="datetime-local" style="width: fit-content;margin-right:10px" class="form-control form-control-solid bg-light-primary text-primary"
                        placeholder="Zaman Aralığı Seçiniz" id="AnalyticsDatePicker" /> --}}
                        <!--begin::Filter-->
                        <button style="width: fit-content" type="button" class="btn btn-light-primary FilterTime m-1 {{ request()->route('startDate') == 'special' ? 'active' : null }}" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->{{__('Özel Tarih')}}
                        </button>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bolder">{{__('Filtreleme Seçenekleri')}}</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Separator-->
                            <!--begin::Content-->
                            <div class="px-7 py-5">
                                <form action="{{ route('analytics.index',['startDate' => 'special']) }}">
                                    @csrf
                                    <!--begin::Input group-->
                                    <!--begin::Label-->
                                    <label class="form-label">{{__('Başlangıc Tarihi')}}</label>
                                    <!--end::Label-->
                                    <input type="datetime-local" name="startDate"  class="form-control form-control-solid bg-light text-dark">
                                    <!--end::Input group-->

                                     <!--begin::Input group-->
                                    <!--begin::Label-->
                                    <label class="form-label mt-5">{{__('Bitiş Tarihi')}}</label>
                                    <!--end::Label-->
                                    <input type="datetime-local" name="endDate"  class="form-control form-control-solid bg-light text-dark">
                                    <!--end::Input group-->
                                    

                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end mt-10">
                                        <button type="reset"
                                            class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                            data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">{{__('İptal')}}</button>
                                        <button type="submit" class="btn btn-primary fw-bold px-6"
                                            data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">{{__('Filtrele')}}</button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                            </div>

                            <!--end::Content-->
                        </div>
                        <!--end::Menu 1-->

                    </div>

                </div>



                <!--begin::Col-->
                <div class="col-xxl-6 mb-lg-10 mb-xl-5 mb-xxl-10">
                    <div class="row g-5 g-lg-10">
                        <div class="col-md-6 col-xl-6 mb-md-5 mb-xxl-10">
                            <!--begin::Card widget 7-->
                            <div class="card bg-info card-flush h-md-50 mb-lg-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1 me-2 lh-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <span class="fs-6 fw-bold text-white">{{__('Sürekli Kullanıcı Sayısı')}}</span>
                                        <!--begin::Amount-->
                                        <span
                                            class="fs-2hx fw-bolder text-light me-2 lh-1">{{ $AnalyticsCustomers[1]['sessions'] }}
                                            <span class="text-light fs-6">{{__('kişi')}}</span></span>
                                        <!--end::Amount-->

                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                            </div>
                            <!--end::Card widget 7-->
                            <!--begin::Card widget 7-->
                            <div class="card bg-danger card-flush h-md-50 mb-lg-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1 me-2 lh-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path d="M2 16C2 16.6 2.4 17 3 17H21C21.6 17 22 16.6 22 16V15H2V16Z"
                                                    fill="black" />
                                                <path opacity="0.3" d="M21 3H3C2.4 3 2 3.4 2 4V15H22V4C22 3.4 21.6 3 21 3Z"
                                                    fill="black" />
                                                <path opacity="0.3" d="M15 17H9V20H15V17Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <span class="fs-6 fw-bold text-white">{{__('Masaüstü Erişim')}}</span>
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bolder text-light me-2 lh-1">{{ $AnalyticsDevice[1][1] }}
                                            <span class="text-light fs-6">{{__('kişi')}}</span></span>
                                        <!--end::Amount-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->

                            </div>
                            <!--end::Card widget 7-->
                        </div>
                        <div class="col-md-6 col-xl-6 mb-md-5 mb-xxl-10">
                            <!--begin::Card widget 7-->
                            <div class="card bg-warning card-flush h-md-50 mb-lg-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1 me-2 lh-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z"
                                                    fill="black" />
                                                <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="black" />
                                                <path
                                                    d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z"
                                                    fill="black" />
                                                <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <span class="fs-6 fw-bold text-white">{{__('Yeni Kullanıcı Sayısı')}}</span>
                                        <!--begin::Amount-->
                                        <span
                                            class="fs-2hx fw-bolder text-light me-2 lh-1">{{ $AnalyticsCustomers[0]['sessions'] }}
                                            <span class="text-light fs-6">{{__('kişi')}}</span></span>
                                        <!--end::Amount-->

                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->

                            </div>
                            <!--end::Card widget 7-->
                            <!--begin::Card widget 7-->
                            <div class="card bg-success card-flush h-md-50 mb-lg-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1 me-2 lh-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path d="M6 21C6 21.6 6.4 22 7 22H17C17.6 22 18 21.6 18 21V20H6V21Z"
                                                    fill="black" />
                                                <path opacity="0.3" d="M17 2H7C6.4 2 6 2.4 6 3V20H18V3C18 2.4 17.6 2 17 2Z"
                                                    fill="black" />
                                                <path d="M12 4C11.4 4 11 3.6 11 3V2H13V3C13 3.6 12.6 4 12 4Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <span class="fs-6 fw-bold text-white">{{__('Mobil Erişim')}}</span>
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bolder text-light me-2 lh-1">{{ $AnalyticsDevice[0][1] }}
                                            <span class="text-light fs-6">{{__('kişi')}}</span></span>
                                        <!--end::Amount-->

                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->

                            </div>
                            <!--end::Card widget 7-->
                        </div>
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-6 mb-5 mb-xl-10">
                    <!--begin::List widget 12-->
                    @include('particulars.analytics.visitors')
                    <!--end::List widget 12-->
                </div>
                <!--end::Col-->

            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-12 mb-5 mb-lg-10">
                    <!--begin::Maps widget 1-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">{{__('Ülkelere Göre Siteye Erişim')}}</span>

                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body d-flex flex-center">
                            <!--begin::Map container-->
                            <div id="chartdiv" class="w-100 h-350px"></div>
                            <!--end::Map container-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Maps widget 1-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4 mb-5 mb-xl-10">
                    <!--begin::List widget 7-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Header-->
                        <div class="card-header py-7">
                            <!--begin::Statistics-->
                            <div class="m-0">
                                <!--begin::Heading-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Title-->
                                    <h3>
                                        <span class="card-label fw-bolder text-dark">{{__('Sitede En Çok Ziyaret Edilen Sayfalar')}}</span>
                                    </h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Heading-->
                            </div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-0">
                            <!--begin::Items-->
                            <div class="mb-0">
                                @foreach ($AnalyticsFavorites as $link)
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center me-5">
                                            <!--begin::Content-->
                                            <div class="me-5">
                                                <!--begin::Title-->
                                                <a href="#"
                                                    class="text-gray-800 fw-bolder text-hover-primary fs-6">{{ $link['url'] }}</a>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Number-->
                                            <span
                                                class="text-gray-800 fw-bolder fs-6 me-3">{{ $link['pageViews'] }}</span><span
                                                class="text-muted">{{__('kişi')}}</span>
                                            <!--end::Number-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-3"></div>
                                    <!--end::Separator-->
                                @endforeach
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List widget 7-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xxl-8 mb-5 mb-lg-10">
                    <!--begin::Chart widget 13-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">{{__('Saate Göre Site Trafiği')}}</span>
                                <span class="text-gray-400 pt-2 fw-bold fs-6">{{__('Kullanıcı Sayısı/Saat Grafiği')}}</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Chart container-->
                            <div id="kt_charts_widget_3_chart_" class="w-100 h-325px"></div>
                            <!--end::Chart container-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Chart widget 13-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row gy-5 g-xl-10">
                <!--begin::Col-->
                <div class="col-xl-4 mb-5 mb-xl-10">
                    <!--begin::List widget 8-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7 mb-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800">{{__('Siteye Girilen Ülkeler')}}</span>

                            </h3>
                            <!--end::Title-->

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-0">
                            @foreach ($AnalyticsWhere as $country)
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center me-5">
                                        <!--begin::Flag-->
                                        <img src="https://flagcdn.com/64x48/{{ strtolower(code_to_country($country[0])) }}.png"
                                            class="me-4 w-25px" style="border-radius: 4px" alt="" />
                                        <!--end::Flag-->
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#"
                                                class="text-gray-800 fw-bolder text-hover-primary fs-6">{{ $country[0] }}
                                            </a>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Number-->
                                        <span class="text-gray-800 fw-bolder fs-6 me-3">{{ $country[1] }}</span><span
                                            class="text-muted">{{__('kişi')}}</span>
                                        <!--end::Number-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--end::Separator-->
                            @endforeach
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::LIst widget 8-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 mb-5 mb-xl-10">
                    <!--begin::List widget 9-->
                    @include('particulars.analytics.social')
                    <!--end::List widget 9-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 mb-5 mb-xl-10">
                    <!--begin::Chart widget 5-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">{{__('Siteye Girilen Tarayıcılar')}}</span>
                                <span class="text-gray-400 pt-2 fw-bold fs-6">{{__('Tarayıcı/Kullanıcı Sayısı')}}</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-5 ps-6">
                            <div id="browser" class="min-h-auto"></div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Chart widget 5-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
@endsection
