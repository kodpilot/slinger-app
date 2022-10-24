<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel panel Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="tr">
<head>
    <title>{{__('Kodtic Admin Paneli')}} | {{__('Hızlı, kolay ve teknolojik')}} </title>
    <meta charset="utf-8" />
    <meta name="description"
        content="Kodpilot işini seven yazılımcılardan oluşan, e-ticaret, web sitesi, mobil programlama, özel yazılımlar ve dijital reklam hizmetleri veren bir teknoloji ve yazılım şirketidir." />
    <meta name="keywords"
        content="Kodpilot işini seven yazılımcılardan oluşan, e-ticaret, web sitesi, mobil programlama, özel yazılımlar ve dijital reklam hizmetleri veren bir teknoloji ve yazılım şirketidir." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:locale" content="tr_TR" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Kodpilot Admin Paneli" />
    <meta property="og:url" content="https://kodpilot.com" />
    <meta property="og:site_name" content="KODPİLOT | ADMİN PANEL" />
    <link rel="shortcut icon" href="https://kodpilot.com/assets/images/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ url('panel/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('panel/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ url('panel/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('panel/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('panel/assets/css/kodpilot.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <!--Begin::Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&amp;l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');
    </script>
    <!--End::Google Tag Manager -->
    @toastr_css
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-extended header-fixed header-tablet-and-mobile-fixed">
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!--End::Google Tag Manager (noscript) -->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header">
                    <!--begin::Header top-->
                    <div class="header-top d-flex align-items-stretch flex-grow-1">
                        <!--begin::Container-->
                        <div class="d-flex container-xxl w-100">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack align-items-stretch w-100">
                                <!--begin::Brand-->
                                <div class="d-flex align-items-center align-items-lg-stretch me-5">
                                    <!--begin::Heaeder navs toggle-->
                                    <button
                                        class="d-lg-none btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px ms-n2 me-2"
                                        id="kt_header_navs_toggle">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--end::Heaeder navs toggle-->
                                    <!--begin::Logo-->
                                    <a href="{{ route('index') }}" class="d-flex align-items-center">
                                        <img alt="Logo" src="{{ url('panel/assets/media/logos/favicon_tic_light.svg') }}"
                                            class="h-25px h-lg-50px" />
                                    </a>
                                    <!--end::Logo-->
                                    <div class="align-self-end" id="kt_brand_tabs">
                                        <!--begin::Header tabs-->
                                        <div class="header-tabs overflow-auto mx-4 ms-lg-5 mb-5 mb-lg-0"
                                            id="kt_header_tabs" data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                            data-kt-swapper-parent="{default: '#kt_header_navs_wrapper', lg: '#kt_brand_tabs'}">
                                            <ul class="nav flex-nowrap">
                                                @foreach (panelMenus() as $menu)
                                                    @if (menuPermission($menu->id))
                                                        <li class="nav-item">
                                                            <a style="font-size:13px"
                                                                class="nav-link {{ request()->is($menu->link . '*') ? 'active' : null }} "
                                                                data-bs-toggle="tab"
                                                                href="#tab_menu_{{ $menu->id }}">{{ __($menu->name) }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach

                                            </ul>
                                        </div>
                                        <!--end::Header tabs-->
                                    </div>
                                </div>
                                <!--end::Brand-->
                                <!--begin::Topbar-->
                                <div class="d-flex align-items-center flex-shrink-0">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-stretch ms-1">
                                        <!--begin::Search-->
                                        {{-- <div id="kt_header_search" class="d-flex align-items-stretch"
                                            data-kt-search-keypress="true" data-kt-search-min-length="2"
                                            data-kt-search-enter="enter" data-kt-search-layout="menu"
                                            data-kt-menu-trigger="auto" data-kt-menu-overflow="false"
                                            data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">
                                            <!--begin::Search toggle-->
                                            <div class="d-flex align-items-center" data-kt-search-element="toggle"
                                                id="kt_header_search_toggle">
                                                <div
                                                    class="btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                    <span class="svg-icon svg-icon-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                                height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                                fill="black" />
                                                            <path
                                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                            </div>
                                            <!--end::Search toggle-->
                                            <!--begin::Menu-->
                                            <div data-kt-search-element="content"
                                                class="menu menu-sub menu-sub-dropdown p-7 w-325px w-md-375px">
                                                <!--begin::Wrapper-->
                                                <div data-kt-search-element="wrapper">
                                                    <!--begin::Form-->
                                                    <form data-kt-search-element="form"
                                                        class="w-100 position-relative mb-3" autocomplete="off">
                                                        <!--begin::Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                        <span
                                                            class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 translate-middle-y ms-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="17.0365" y="15.1223"
                                                                    width="8.15546" height="2" rx="1"
                                                                    transform="rotate(45 17.0365 15.1223)"
                                                                    fill="black" />
                                                                <path
                                                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--end::Icon-->
                                                        <!--begin::Input-->
                                                        <input type="text"
                                                            class="search-input form-control form-control-flush ps-10"
                                                            name="search" value="" placeholder="Ara"
                                                            data-kt-search-element="input" />
                                                        <!--end::Input-->
                                                        <!--begin::Spinner-->
                                                        <span
                                                            class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-1"
                                                            data-kt-search-element="spinner">
                                                            <span
                                                                class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                                                        </span>
                                                        <!--end::Spinner-->
                                                        <!--begin::Reset-->
                                                        <span
                                                            class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none"
                                                            data-kt-search-element="clear">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                            <span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                        height="2" rx="1"
                                                                        transform="rotate(-45 6 17.3137)"
                                                                        fill="black" />
                                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                                        transform="rotate(45 7.41422 6)" fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <!--end::Reset-->
                                                        <!--begin::Toolbar-->
                                                        <div class="position-absolute top-50 end-0 translate-middle-y"
                                                            data-kt-search-element="toolbar">
                                                            <!--begin::Preferences toggle-->
                                                            <div data-kt-search-element="preferences-show"
                                                                class="btn btn-icon w-20px btn-sm btn-active-color-primary me-1"
                                                                data-bs-toggle="tooltip"
                                                                title="Show search preferences">
                                                                <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                                                                <span class="svg-icon svg-icon-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.3"
                                                                            d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                                                            fill="black" />
                                                                        <path
                                                                            d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </div>
                                                            <!--end::Preferences toggle-->
                                                            <!--begin::Advanced search toggle-->
                                                            <div data-kt-search-element="advanced-options-form-show"
                                                                class="btn btn-icon w-20px btn-sm btn-active-color-primary"
                                                                data-bs-toggle="tooltip"
                                                                title="Show more search options">
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                                <span class="svg-icon svg-icon-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path
                                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </div>
                                                            <!--end::Advanced search toggle-->
                                                        </div>
                                                        <!--end::Toolbar-->
                                                    </form>
                                                    <!--end::Form-->
                                                    <!--begin::Separator-->
                                                    <div class="separator border-gray-200 mb-6"></div>
                                                    <!--end::Separator-->
                                                    <!--begin::Recently viewed-->
                                                    <div data-kt-search-element="results" class="d-none">
                                                        <!--begin::Items-->
                                                        <div class="scroll-y mh-200px mh-lg-350px">
                                                            <!--begin::Category title-->
                                                            <h3 class="fs-5 text-muted m-0 pb-5"
                                                                data-kt-search-element="category-title">Users</h3>
                                                            <!--end::Category title-->
                                                            <!--begin::Item-->
                                                            <a href="#"
                                                                class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <img src="{{ url('panel/assets/media/avatars/robot2.png') }}"
                                                                        alt="" />
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div
                                                                    class="d-flex flex-column justify-content-start fw-bold">
                                                                    <span class="fs-6 fw-bold">Karina Clark</span>
                                                                    <span class="fs-7 fw-bold text-muted">Marketing
                                                                        Manager</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </a>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <a href="#"
                                                                class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <img src="{{ url('panel/assets/media/avatars/300-2.jpg') }}"
                                                                        alt="" />
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div
                                                                    class="d-flex flex-column justify-content-start fw-bold">
                                                                    <span class="fs-6 fw-bold">Olivia Bold</span>
                                                                    <span class="fs-7 fw-bold text-muted">Software
                                                                        Engineer</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </a>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <a href="#"
                                                                class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <img src="{{ url('panel/assets/media/avatars/300-9.jpg') }}"
                                                                        alt="" />
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div
                                                                    class="d-flex flex-column justify-content-start fw-bold">
                                                                    <span class="fs-6 fw-bold">Ana Clark</span>
                                                                    <span class="fs-7 fw-bold text-muted">UI/UX
                                                                        Designer</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </a>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <a href="#"
                                                                class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <img src="{{ url('panel/assets/media/avatars/300-14.jpg') }}"
                                                                        alt="" />
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div
                                                                    class="d-flex flex-column justify-content-start fw-bold">
                                                                    <span class="fs-6 fw-bold">Nick Pitola</span>
                                                                    <span class="fs-7 fw-bold text-muted">Art
                                                                        Director</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </a>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <a href="#"
                                                                class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <img src="{{ url('panel/assets/media/avatars/300-11.jpg') }}"
                                                                        alt="" />
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div
                                                                    class="d-flex flex-column justify-content-start fw-bold">
                                                                    <span class="fs-6 fw-bold">Edward Kulnic</span>
                                                                    <span class="fs-7 fw-bold text-muted">System
                                                                        panelistrator</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </a>
                                                            <!--end::Item-->
                                                            <!--begin::Category title-->
                                                            <h3 class="fs-5 text-muted m-0 pt-5 pb-5"
                                                                data-kt-search-element="category-title">Customers</h3>
                                                            <!--end::Category title-->
                                                            <!--begin::Item-->
                                                            <a href="#"
                                                                class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <img class="w-20px h-20px"
                                                                            src="{{ url('panel/assets/media/svg/brand-logos/volicity-9.svg') }}"
                                                                            alt="" />
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div
                                                                    class="d-flex flex-column justify-content-start fw-bold">
                                                                    <span class="fs-6 fw-bold">Company
                                                                        Rbranding</span>
                                                                    <span class="fs-7 fw-bold text-muted">UI
                                                                        Design</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </a>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <a href="#"
                                                                class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <img class="w-20px h-20px"
                                                                            src="{{ url('panel/assets/media/svg/brand-logos/tvit.svg') }}"
                                                                            alt="" />
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div
                                                                    class="d-flex flex-column justify-content-start fw-bold">
                                                                    <span class="fs-6 fw-bold">Company
                                                                        Re-branding</span>
                                                                    <span class="fs-7 fw-bold text-muted">Web
                                                                        Development</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </a>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <a href="#"
                                                                class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <img class="w-20px h-20px"
                                                                            src="{{ url('panel/assets/media/svg/misc/infography.svg') }}"
                                                                            alt="" />
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div
                                                                    class="d-flex flex-column justify-content-start fw-bold">
                                                                    <span class="fs-6 fw-bold">Business Analytics
                                                                        App</span>
                                                                    <span
                                                                        class="fs-7 fw-bold text-muted">panelistration</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </a>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <a href="#"
                                                                class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <img class="w-20px h-20px"
                                                                            src="{{ url('panel/assets/media/svg/brand-logos/leaf.svg') }}"
                                                                            alt="" />
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div
                                                                    class="d-flex flex-column justify-content-start fw-bold">
                                                                    <span class="fs-6 fw-bold">EcoLeaf App
                                                                        Launch</span>
                                                                    <span
                                                                        class="fs-7 fw-bold text-muted">Marketing</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </a>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <a href="#"
                                                                class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <img class="w-20px h-20px"
                                                                            src="{{ url('panel/assets/media/svg/brand-logos/tower.svg') }}"
                                                                            alt="" />
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div
                                                                    class="d-flex flex-column justify-content-start fw-bold">
                                                                    <span class="fs-6 fw-bold">Tower Group
                                                                        Website</span>
                                                                    <span class="fs-7 fw-bold text-muted">Google
                                                                        Adwords</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </a>
                                                            <!--end::Item-->
                                                            <!--begin::Category title-->
                                                            <h3 class="fs-5 text-muted m-0 pt-5 pb-5"
                                                                data-kt-search-element="category-title">Projects</h3>
                                                            <!--end::Category title-->
                                                            <!--begin::Item-->
                                                            <a href="#"
                                                                class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                                                                        <span
                                                                            class="svg-icon svg-icon-2 svg-icon-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.3"
                                                                                    d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
                                                                                    fill="black" />
                                                                                <rect x="7" y="17" width="6" height="2"
                                                                                    rx="1" fill="black" />
                                                                                <rect x="7" y="12" width="10" height="2"
                                                                                    rx="1" fill="black" />
                                                                                <rect x="7" y="7" width="6" height="2"
                                                                                    rx="1" fill="black" />
                                                                                <path
                                                                                    d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div class="d-flex flex-column">
                                                                    <span class="fs-6 fw-bold">Si-Fi Project by AU
                                                                        Themes</span>
                                                                    <span class="fs-7 fw-bold text-muted">#45670</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </a>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <a href="#"
                                                                class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                                                        <span
                                                                            class="svg-icon svg-icon-2 svg-icon-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <rect x="8" y="9" width="3" height="10"
                                                                                    rx="1.5" fill="black" />
                                                                                <rect opacity="0.5" x="13" y="5"
                                                                                    width="3" height="14" rx="1.5"
                                                                                    fill="black" />
                                                                                <rect x="18" y="11" width="3" height="8"
                                                                                    rx="1.5" fill="black" />
                                                                                <rect x="3" y="13" width="3" height="6"
                                                                                    rx="1.5" fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div class="d-flex flex-column">
                                                                    <span class="fs-6 fw-bold">Shopix Mobile App
                                                                        Planning</span>
                                                                    <span class="fs-7 fw-bold text-muted">#45690</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </a>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <a href="#"
                                                                class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                                                                        <span
                                                                            class="svg-icon svg-icon-2 svg-icon-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.3"
                                                                                    d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z"
                                                                                    fill="black" />
                                                                                <rect x="6" y="12" width="7" height="2"
                                                                                    rx="1" fill="black" />
                                                                                <rect x="6" y="7" width="12" height="2"
                                                                                    rx="1" fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div class="d-flex flex-column">
                                                                    <span class="fs-6 fw-bold">Finance Monitoring
                                                                        SAAS Discussion</span>
                                                                    <span class="fs-7 fw-bold text-muted">#21090</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </a>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <a href="#"
                                                                class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                                        <span
                                                                            class="svg-icon svg-icon-2 svg-icon-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.3"
                                                                                    d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div class="d-flex flex-column">
                                                                    <span class="fs-6 fw-bold">Dashboard Analitics
                                                                        Launch</span>
                                                                    <span class="fs-7 fw-bold text-muted">#34560</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </a>
                                                            <!--end::Item-->
                                                        </div>
                                                        <!--end::Items-->
                                                    </div>
                                                    <!--end::Recently viewed-->
                                                    <!--begin::Recently viewed-->
                                                    <div class="mb-5" data-kt-search-element="main">
                                                        <!--begin::Heading-->
                                                        <div class="d-flex flex-stack fw-bold mb-4">
                                                            <!--begin::Label-->
                                                            <span class="text-muted fs-6 me-2">Recently
                                                                Searched:</span>
                                                            <!--end::Label-->
                                                        </div>
                                                        <!--end::Heading-->
                                                        <!--begin::Items-->
                                                        <div class="scroll-y mh-200px mh-lg-325px">
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <!--begin::Svg Icon | path: icons/duotune/electronics/elc004.svg-->
                                                                        <span
                                                                            class="svg-icon svg-icon-2 svg-icon-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path
                                                                                    d="M2 16C2 16.6 2.4 17 3 17H21C21.6 17 22 16.6 22 16V15H2V16Z"
                                                                                    fill="black" />
                                                                                <path opacity="0.3"
                                                                                    d="M21 3H3C2.4 3 2 3.4 2 4V15H22V4C22 3.4 21.6 3 21 3Z"
                                                                                    fill="black" />
                                                                                <path opacity="0.3"
                                                                                    d="M15 17H9V20H15V17Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div class="d-flex flex-column">
                                                                    <a href="#"
                                                                        class="fs-6 text-gray-800 text-hover-primary fw-bold">BoomApp
                                                                        by Keenthemes</a>
                                                                    <span class="fs-7 text-muted fw-bold">#45789</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra001.svg-->
                                                                        <span
                                                                            class="svg-icon svg-icon-2 svg-icon-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.3"
                                                                                    d="M14 3V21H10V3C10 2.4 10.4 2 11 2H13C13.6 2 14 2.4 14 3ZM7 14H5C4.4 14 4 14.4 4 15V21H8V15C8 14.4 7.6 14 7 14Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M21 20H20V8C20 7.4 19.6 7 19 7H17C16.4 7 16 7.4 16 8V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div class="d-flex flex-column">
                                                                    <a href="#"
                                                                        class="fs-6 text-gray-800 text-hover-primary fw-bold">"Kept
                                                                        API Project Meeting</a>
                                                                    <span class="fs-7 text-muted fw-bold">#84050</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->
                                                                        <span
                                                                            class="svg-icon svg-icon-2 svg-icon-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path
                                                                                    d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z"
                                                                                    fill="black" />
                                                                                <path opacity="0.3"
                                                                                    d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div class="d-flex flex-column">
                                                                    <a href="#"
                                                                        class="fs-6 text-gray-800 text-hover-primary fw-bold">"KPI
                                                                        Monitoring App Launch</a>
                                                                    <span class="fs-7 text-muted fw-bold">#84250</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra002.svg-->
                                                                        <span
                                                                            class="svg-icon svg-icon-2 svg-icon-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.3"
                                                                                    d="M20 8L12.5 5L5 14V19H20V8Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M21 18H6V3C6 2.4 5.6 2 5 2C4.4 2 4 2.4 4 3V18H3C2.4 18 2 18.4 2 19C2 19.6 2.4 20 3 20H4V21C4 21.6 4.4 22 5 22C5.6 22 6 21.6 6 21V20H21C21.6 20 22 19.6 22 19C22 18.4 21.6 18 21 18Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div class="d-flex flex-column">
                                                                    <a href="#"
                                                                        class="fs-6 text-gray-800 text-hover-primary fw-bold">Project
                                                                        Reference FAQ</a>
                                                                    <span class="fs-7 text-muted fw-bold">#67945</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                                                        <span
                                                                            class="svg-icon svg-icon-2 svg-icon-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path
                                                                                    d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                                                                    fill="black" />
                                                                                <path opacity="0.3"
                                                                                    d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div class="d-flex flex-column">
                                                                    <a href="#"
                                                                        class="fs-6 text-gray-800 text-hover-primary fw-bold">"FitPro
                                                                        App Development</a>
                                                                    <span class="fs-7 text-muted fw-bold">#84250</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <!--begin::Svg Icon | path: icons/duotune/finance/fin001.svg-->
                                                                        <span
                                                                            class="svg-icon svg-icon-2 svg-icon-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path
                                                                                    d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z"
                                                                                    fill="black" />
                                                                                <path opacity="0.3"
                                                                                    d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div class="d-flex flex-column">
                                                                    <a href="#"
                                                                        class="fs-6 text-gray-800 text-hover-primary fw-bold">Shopix
                                                                        Mobile App</a>
                                                                    <span class="fs-7 text-muted fw-bold">#45690</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-40px me-4">
                                                                    <span class="symbol-label bg-light">
                                                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra002.svg-->
                                                                        <span
                                                                            class="svg-icon svg-icon-2 svg-icon-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path opacity="0.3"
                                                                                    d="M20 8L12.5 5L5 14V19H20V8Z"
                                                                                    fill="black" />
                                                                                <path
                                                                                    d="M21 18H6V3C6 2.4 5.6 2 5 2C4.4 2 4 2.4 4 3V18H3C2.4 18 2 18.4 2 19C2 19.6 2.4 20 3 20H4V21C4 21.6 4.4 22 5 22C5.6 22 6 21.6 6 21V20H21C21.6 20 22 19.6 22 19C22 18.4 21.6 18 21 18Z"
                                                                                    fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Title-->
                                                                <div class="d-flex flex-column">
                                                                    <a href="#"
                                                                        class="fs-6 text-gray-800 text-hover-primary fw-bold">"Landing
                                                                        UI Design" Launch</a>
                                                                    <span class="fs-7 text-muted fw-bold">#24005</span>
                                                                </div>
                                                                <!--end::Title-->
                                                            </div>
                                                            <!--end::Item-->
                                                        </div>
                                                        <!--end::Items-->
                                                    </div>
                                                    <!--end::Recently viewed-->
                                                    <!--begin::Empty-->
                                                    <div data-kt-search-element="empty" class="text-center d-none">
                                                        <!--begin::Icon-->
                                                        <div class="pt-10 pb-10">
                                                            <!--begin::Svg Icon | path: icons/duotune/files/fil024.svg-->
                                                            <span class="svg-icon svg-icon-4x opacity-50">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                                                                        fill="black" />
                                                                    <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z"
                                                                        fill="black" />
                                                                    <rect x="13.6993" y="13.6656" width="4.42828"
                                                                        height="1.73089" rx="0.865447"
                                                                        transform="rotate(45 13.6993 13.6656)"
                                                                        fill="black" />
                                                                    <path
                                                                        d="M15 12C15 14.2 13.2 16 11 16C8.8 16 7 14.2 7 12C7 9.8 8.8 8 11 8C13.2 8 15 9.8 15 12ZM11 9.6C9.68 9.6 8.6 10.68 8.6 12C8.6 13.32 9.68 14.4 11 14.4C12.32 14.4 13.4 13.32 13.4 12C13.4 10.68 12.32 9.6 11 9.6Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Icon-->
                                                        <!--begin::Message-->
                                                        <div class="pb-15 fw-bold">
                                                            <h3 class="text-gray-600 fs-5 mb-2">No result found</h3>
                                                            <div class="text-muted fs-7">Please try again with a
                                                                different query</div>
                                                        </div>
                                                        <!--end::Message-->
                                                    </div>
                                                    <!--end::Empty-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Preferences-->
                                                <form data-kt-search-element="advanced-options-form"
                                                    class="pt-1 d-none">
                                                    <!--begin::Heading-->
                                                    <h3 class="fw-bold text-dark mb-7">Advanced Search</h3>
                                                    <!--end::Heading-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <input type="text"
                                                            class="form-control form-control-sm form-control-solid"
                                                            placeholder="Contains the word" name="query" />
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <!--begin::Radio group-->
                                                        <div class="nav-group nav-group-fluid">
                                                            <!--begin::Option-->
                                                            <label>
                                                                <input type="radio" class="btn-check" name="type"
                                                                    value="has" checked="checked" />
                                                                <span
                                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary">All</span>
                                                            </label>
                                                            <!--end::Option-->
                                                            <!--begin::Option-->
                                                            <label>
                                                                <input type="radio" class="btn-check" name="type"
                                                                    value="users" />
                                                                <span
                                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Users</span>
                                                            </label>
                                                            <!--end::Option-->
                                                            <!--begin::Option-->
                                                            <label>
                                                                <input type="radio" class="btn-check" name="type"
                                                                    value="orders" />
                                                                <span
                                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Orders</span>
                                                            </label>
                                                            <!--end::Option-->
                                                            <!--begin::Option-->
                                                            <label>
                                                                <input type="radio" class="btn-check" name="type"
                                                                    value="projects" />
                                                                <span
                                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Projects</span>
                                                            </label>
                                                            <!--end::Option-->
                                                        </div>
                                                        <!--end::Radio group-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <input type="text" name="assignedto"
                                                            class="form-control form-control-sm form-control-solid"
                                                            placeholder="Assigned to" value="" />
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <input type="text" name="collaborators"
                                                            class="form-control form-control-sm form-control-solid"
                                                            placeholder="Collaborators" value="" />
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <!--begin::Radio group-->
                                                        <div class="nav-group nav-group-fluid">
                                                            <!--begin::Option-->
                                                            <label>
                                                                <input type="radio" class="btn-check"
                                                                    name="attachment" value="has" checked="checked" />
                                                                <span
                                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary">Has
                                                                    attachment</span>
                                                            </label>
                                                            <!--end::Option-->
                                                            <!--begin::Option-->
                                                            <label>
                                                                <input type="radio" class="btn-check"
                                                                    name="attachment" value="any" />
                                                                <span
                                                                    class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Any</span>
                                                            </label>
                                                            <!--end::Option-->
                                                        </div>
                                                        <!--end::Radio group-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-5">
                                                        <select name="timezone" aria-label="Select a Timezone"
                                                            data-control="select2" data-placeholder="date_period"
                                                            class="form-select form-select-sm form-select-solid">
                                                            <option value="next">Within the next</option>
                                                            <option value="last">Within the last</option>
                                                            <option value="between">Between</option>
                                                            <option value="on">On</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="row mb-8">
                                                        <!--begin::Col-->
                                                        <div class="col-6">
                                                            <input type="number" name="date_number"
                                                                class="form-control form-control-sm form-control-solid"
                                                                placeholder="Lenght" value="" />
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col-6">
                                                            <select name="date_typer" aria-label="Select a Timezone"
                                                                data-control="select2" data-placeholder="Period"
                                                                class="form-select form-select-sm form-select-solid">
                                                                <option value="days">Days</option>
                                                                <option value="weeks">Weeks</option>
                                                                <option value="months">Months</option>
                                                                <option value="years">Years</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="reset"
                                                            class="btn btn-sm btn-light fw-bolder btn-active-light-primary me-2"
                                                            data-kt-search-element="advanced-options-form-cancel">Cancel</button>
                                                        <a href="pages/search/horizontal.html"
                                                            class="btn btn-sm fw-bolder btn-primary"
                                                            data-kt-search-element="advanced-options-form-search">Search</a>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Preferences-->
                                                <!--begin::Preferences-->
                                                <form data-kt-search-element="preferences" class="pt-1 d-none">
                                                    <!--begin::Heading-->
                                                    <h3 class="fw-bold text-dark mb-7">Search Preferences</h3>
                                                    <!--end::Heading-->
                                                    <!--begin::Input group-->
                                                    <div class="pb-4 border-bottom">
                                                        <label
                                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                                            <span
                                                                class="form-check-label text-gray-700 fs-6 fw-bold ms-0 me-2">Projects</span>
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                checked="checked" />
                                                        </label>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="py-4 border-bottom">
                                                        <label
                                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                                            <span
                                                                class="form-check-label text-gray-700 fs-6 fw-bold ms-0 me-2">Targets</span>
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                checked="checked" />
                                                        </label>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="py-4 border-bottom">
                                                        <label
                                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                                            <span
                                                                class="form-check-label text-gray-700 fs-6 fw-bold ms-0 me-2">Affiliate
                                                                Programs</span>
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </label>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="py-4 border-bottom">
                                                        <label
                                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                                            <span
                                                                class="form-check-label text-gray-700 fs-6 fw-bold ms-0 me-2">Referrals</span>
                                                            <input class="form-check-input" type="checkbox" value="1"
                                                                checked="checked" />
                                                        </label>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="py-4 border-bottom">
                                                        <label
                                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                                            <span
                                                                class="form-check-label text-gray-700 fs-6 fw-bold ms-0 me-2">Users</span>
                                                            <input class="form-check-input" type="checkbox"
                                                                value="1" />
                                                        </label>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end pt-7">
                                                        <button type="reset"
                                                            class="btn btn-sm btn-light fw-bolder btn-active-light-primary me-2"
                                                            data-kt-search-element="preferences-dismiss">Cancel</button>
                                                        <button type="submit"
                                                            class="btn btn-sm fw-bolder btn-primary">Save
                                                            Changes</button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Preferences-->
                                            </div>
                                            <!--end::Menu-->
                                        </div> --}}
                                        <!--end::Search-->
                                    </div>
                                    <!--end::Search-->

                                    <!--begin::Activities-->
                                    {{-- <div class="d-flex align-items-center ms-1">
                                        <!--begin::Drawer toggle-->
                                        <div class="btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px"
                                            id="kt_activities_toggle">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black" />
                                                    <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                                                        fill="black" />
                                                    <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black" />
                                                    <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Drawer toggle-->
                                    </div> --}}
                                    <!--end::Activities-->
                                    <!--begin::Site Link-->
                                    <div class="d-flex align-items-center ms-1">
                                        <!--begin::Menu wrapper-->
                                        <div
                                            class="btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px position-relative">
                                            <a href="{{ route('index') }}" target="_blank" title="{{__('Siteye Git')}}">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                                                <span class="svg-icon svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101
                                                            21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224
                                                            19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851
                                                            2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224
                                                            21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006
                                                            15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906
                                                            15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826
                                                            8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z"
                                                            fill="black" />
                                                        <path
                                                            d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013
                                                            12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434
                                                            10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765
                                                            21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577
                                                            12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>

                                        </div>
                                        <!--end::Menu wrapper-->
                                    </div>
                                    <!--end::Site Link-->
                                    <!--begin::Quick links-->
                                    <div class="d-flex align-items-center ms-1">
                                        <!--begin::Menu wrapper-->
                                        {{-- <div class="btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px"
                                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                            data-kt-menu-placement="bottom-end">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                                        fill="black" />
                                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                                        fill="black" />
                                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div> --}}
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px"
                                            data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10"
                                                style="background-image:url('assets/media/misc/pattern-1.jpg')">
                                                <!--begin::Title-->
                                                <h3 class="text-primary fw-bold mb-3">{{__('Hızlı Menü')}}</h3>
                                                <!--end::Title-->

                                            </div>
                                            <!--end::Heading-->
                                            <!--begin:Nav-->
                                            <div class="row g-0">
                                                <!--begin:Item-->
                                                {{-- <div class="col-6">
                                                    <a href="{{ route('order.index') }}"
                                                        class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                                                        <!--begin::Svg Icon | path: icons/duotune/finance/fin009.svg-->
                                                        <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3"
                                                                    d="M18.041 22.041C18.5932 22.041 19.041 21.5932 19.041 21.041C19.041 20.4887 18.5932 20.041 18.041 20.041C17.4887 20.041 17.041 20.4887 17.041 21.041C17.041 21.5932 17.4887 22.041 18.041 22.041Z"
                                                                    fill="black" />
                                                                <path opacity="0.3"
                                                                    d="M6.04095 22.041C6.59324 22.041 7.04095 21.5932 7.04095 21.041C7.04095 20.4887 6.59324 20.041 6.04095 20.041C5.48867 20.041 5.04095 20.4887 5.04095 21.041C5.04095 21.5932 5.48867 22.041 6.04095 22.041Z"
                                                                    fill="black" />
                                                                <path opacity="0.3"
                                                                    d="M7.04095 16.041L19.1409 15.1409C19.7409 15.1409 20.141 14.7409 20.341 14.1409L21.7409 8.34094C21.9409 7.64094 21.4409 7.04095 20.7409 7.04095H5.44095L7.04095 16.041Z"
                                                                    fill="black" />
                                                                <path
                                                                    d="M19.041 20.041H5.04096C4.74096 20.041 4.34095 19.841 4.14095 19.541C3.94095 19.241 3.94095 18.841 4.14095 18.541L6.04096 14.841L4.14095 4.64095L2.54096 3.84096C2.04096 3.64096 1.84095 3.04097 2.14095 2.54097C2.34095 2.04097 2.94096 1.84095 3.44096 2.14095L5.44096 3.14095C5.74096 3.24095 5.94096 3.54096 5.94096 3.84096L7.94096 14.841C7.94096 15.041 7.94095 15.241 7.84095 15.441L6.54096 18.041H19.041C19.641 18.041 20.041 18.441 20.041 19.041C20.041 19.641 19.641 20.041 19.041 20.041Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <span class="fs-5 fw-bold text-gray-800 mb-0">{{__('Siparişler')}}</span>
                                                    </a>
                                                </div> --}}
                                                <!--end:Item-->
                                                <!--begin:Item-->
                                                {{--  --}}
                                                <!--end:Item-->
                                                <!--begin:Item-->
                                                <div class="col-6">
                                                    <a href="{{ route('user.index') }}"
                                                        class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
                                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                                                        <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z"
                                                                    fill="black" />
                                                                <rect opacity="0.3" x="14" y="4" width="4" height="4"
                                                                    rx="2" fill="black" />
                                                                <path
                                                                    d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z"
                                                                    fill="black" />
                                                                <rect opacity="0.3" x="6" y="5" width="6" height="6"
                                                                    rx="3" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <span class="fs-5 fw-bold text-gray-800 mb-0">{{__('Üyeler')}}</span>
                                                    </a>
                                                </div>
                                                <!--end:Item-->
                                                <!--begin:Item-->
                                                <div class="col-6">
                                                    <a href="#"
                                                        class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
                                                        <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                                        <span class="svg-icon svg-icon-3x svg-icon-primary mb-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect x="8" y="9" width="3" height="10" rx="1.5"
                                                                    fill="black" />
                                                                <rect opacity="0.5" x="13" y="5" width="3" height="14"
                                                                    rx="1.5" fill="black" />
                                                                <rect x="18" y="11" width="3" height="8" rx="1.5"
                                                                    fill="black" />
                                                                <rect x="3" y="13" width="3" height="6" rx="1.5"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <span class="fs-5 fw-bold text-gray-800 mb-0">{{__('Raporlar')}}</span>
                                                    </a>
                                                </div>
                                                <!--end:Item-->
                                            </div>
                                            <!--end:Nav-->

                                        </div>
                                        <!--end::Menu-->
                                        <!--end::Menu wrapper-->
                                    </div>
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center ms-1" id="kt_header_user_menu_toggle">
                                        <!--begin::User info-->
                                        <div class="btn btn-flex align-items-center bg-hover-white bg-hover-opacity-10 py-2 px-2 px-md-3"
                                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                            data-kt-menu-placement="bottom-end">
                                            <!--begin::Name-->
                                            <div
                                                class="d-none d-md-flex flex-column align-items-end justify-content-center me-2 me-md-4">
                                                <span
                                                    class="text-white opacity-75 fs-8 fw-bold lh-1 mb-1">{{ Auth::user()->email }}</span>
                                                <span
                                                    class="text-white fs-8 fw-bolder lh-1">{{ __(getRole()) }}</span>
                                            </div>
                                            <!--end::Name-->
                                        </div>
                                        <!--end::User info-->
                                        <!--begin::Robot-->
                                        <div class="d-flex align-items-center ms-1">
                                            <!--begin::Menu wrapper-->
                                            <div class="btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px position-relative"
                                                id="kt_drawer_chat_toggle">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px symbol-md-50px">
                                                    <img src="{{ url('panel/assets/media/svg/avatars/pilot.svg') }}"
                                                        alt="Kodpilot Robotu" />
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Notification animation-->
                                                <span
                                                    class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-0 animation-blink"></span>
                                                <!--end::Notification animation-->
                                            </div>
                                            <!--end::Menu wrapper-->
                                        </div>
                                        <!--end::Robot-->
                                        <!--begin::User account menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content d-flex align-items-center px-3">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-50px me-5">
                                                        @if (strlen(Auth::user()->file)>1)
                                                        <img alt="Logo"
                                                        src="{{ url('/assets/images/users/'.Auth::user()->file) }}" />
                                                        @else
                                                        <img alt="Logo"
                                                        src="{{ url('/assets/images/users/profile.png') }}" />
                                                        @endif
                                                        
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Username-->
                                                    <div class="d-flex flex-column">
                                                        <div class="fw-bolder d-flex align-items-center fs-5">{{Auth::user()->name}}
                                                        </div>
                                                        <a href="#"
                                                            class="fw-bold text-muted text-hover-primary fs-7">{{Auth::user()->email}}</a>
                                                    </div>
                                                    <!--end::Username-->
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            {{-- <div class="menu-item px-5">
                                                <a href="{{route('profile.index')}}" class="menu-link px-5">{{__('Profilim')}}</a>
                                            </div> --}}
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            {{-- <div class="menu-item px-5">
                                                <a href="{{route('profile.orders')}}" class="menu-link px-5">
                                                    <span class="menu-text">{{__('Siparişlerim')}}</span>
                                                    <span class="menu-badge">
                                                    </span>
                                                </a>
                                            </div> --}}
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            {{-- <div class="menu-item px-5">
                                                <a href="{{route('profile.carts')}}" class="menu-link px-5">{{__('Sepetim')}}</a>
                                            </div> --}}
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            {{-- <div class="menu-item px-5 my-1">
                                                <a href="{{route('profile.editProfile')}}" class="menu-link px-5">{{__('Hesap Ayarları')}}</a>
                                            </div> --}}
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5">
                                                <a onclick="logoutForm.submit()" class="menu-link px-5">{{__('Çıkış Yap')}}</a>
                                            </div>
                                            <form id="logoutForm" class="menu-item px-5"
                                                action="{{ route('logout') }}" method="POST">
                                                @csrf

                                            </form>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::User account menu-->
                                    </div>
                                    <!--end::User -->
                                    <!--begin::Heaeder menu toggle-->
                                    <!--end::Heaeder menu toggle-->
                                </div>
                                <!--end::Topbar-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header top-->
                    <!--begin::Header navs-->
                    <div class="header-navs d-flex align-items-stretch flex-stack h-lg-70px w-100 py-5 py-lg-0"
                        id="kt_header_navs" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                        data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                        data-kt-drawer-toggle="#kt_header_navs_toggle" data-kt-swapper="true"
                        data-kt-swapper-mode="append" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header'}">
                        <!--begin::Container-->
                        <div class="d-lg-flex container-xxl w-100">
                            <!--begin::Wrapper-->
                            <div class="d-lg-flex flex-column justify-content-lg-center w-100"
                                id="kt_header_navs_wrapper">
                                <!--begin::Header tab content-->
                                <div class="tab-content" data-kt-scroll="true"
                                    data-kt-scroll-activate="{default: true, lg: false}" data-kt-scroll-height="auto"
                                    data-kt-scroll-offset="70px">
                                    @foreach (panelMenus() as $menu)
                                        <!--begin::Tab panel-->
                                        <div class="tab-pane fade  {{ request()->is($menu->link . '*') ? 'active show' : null }}"
                                            id="tab_menu_{{ $menu->id }}">
                                            <!--begin::Wrapper-->
                                            <div
                                                class="d-flex flex-column flex-lg-row flex-lg-stack flex-wrap gap-2 px-4 px-lg-0">
                                                <div class="d-flex flex-column flex-lg-row gap-2">
                                                    @foreach (subPanelMenus($menu->id) as $subMenu)
                                                    @if (subMenuPermission($subMenu->id))
                                                        @if (checkHaveSub($subMenu->id)->count() == 0)
                                                        <a class="btn bg-hover-light-primary text-hover-primary btn-sm fw-bolder btn-hover-rise {{ request()->is($subMenu->link.'*' ) ? 'bg-light-primary text-primary' : 'bg-light text-gray-600' }}  "
                                                            href="{{ route($subMenu->route) }}">{{ __($subMenu->name) }}</a>
                                                        @else
                                                        <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold align-items-stretch flex-grow-1" id="#kt_header_menu" data-kt-menu="true">
                                                            <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item here  menu-lg-down-accordion me-lg-1">
                                                                <span class="menu-link py-3">
                                                                    <span class="menu-title">{{ __($subMenu->name) }}</span>
                                                                    <span class="menu-arrow d-lg-none"></span>
                                                                </span>
                                                                <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                                                    @foreach (checkHaveSub($subMenu->id) as $sub)
                                                                        <div class="menu-item">
                                                                            <a class="menu-link {{ request()->is($sub->link ) ? 'active' : '' }} py-3" href="{{route($sub->route)}}">
                                                                                <span class="menu-bullet">
                                                                                    <span class="bullet bullet-dot"></span>
                                                                                </span>
                                                                                <span class="menu-title">{{__($sub->name)}}</span>
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Tab panel-->

                                    @endforeach
                                    

                                </div>
                                
                                <!--end::Header tab content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header navs-->
                </div>
                <!--end::Header-->
                <!--begin::Toolbar-->
                <div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
                    <!--begin::Container-->
                    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
                        <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
                            <!--begin::Title-->
                            <h1 class="d-flex text-dark fw-bolder m-0 fs-3">@yield('mainTitle')</h1>
                            <!--end::Title-->
                            <!--begin::Breadcrumb-->
                            <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7">

                                @hasSection('path1')
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-gray-600">
                                        <a href="{{ route('admin.index') }}"
                                            class="text-gray-600 text-hover-primary">@yield('path1')</a>
                                    </li>
                                    <!--end::Item-->
                                @endif

                                @hasSection('path2')
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-gray-600">
                                        <a href="@yield('path2Link')"
                                            class="text-gray-600 text-hover-primary">@yield('path2')</a>
                                    </li>
                                    <!--end::Item-->
                                @endif

                                @hasSection('path3')
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-gray-600">
                                        <a href="@yield('path3Link')"
                                            class="text-gray-600 text-hover-primary">@yield('path3')</a>
                                    </li>
                                    <!--end::Item-->
                                @endif


                                <!--begin::Item-->
                                <li class="breadcrumb-item text-gray-600">@yield('mainTitle')</li>
                                <!--end::Item-->

                            </ul>
                            <!--end::Breadcrumb-->
                        </div>
                    
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center">
                            @hasSection('addModal')
                            <!--begin::Add user-->
                            <a href="" class="btn btn-color-primary "  data-bs-toggle="modal" data-bs-target="#addModal" title="{{__('Hızlı Ekle')}}">
                                
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                                transform="rotate(-90 11.364 20.364)" fill="black" />
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--> {{__('Hızlı Ekle')}}
                                </a>
                                <!--end::Add user-->
                            </a>
                            <!--end::Button-->
                            @endif
                            @hasSection('exportPDF')
                            <!--begin::Button-->
                            @yield('exportPDF') 
                                <img class="w-35px" src="{{ url('panel/assets/media/svg/files/pdf.svg') }}" alt="">
                            </a>
                            <!--end::Button-->
                            @endif
                        
                            @hasSection('exportXLSX')
                            <!--begin::Button-->
                            @yield('exportXLSX') 
                            
                                <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                                <img class="w-30px" src="{{ url('panel/assets/media/svg/files/xlsx.svg') }}" alt="">
                                <!--end::Svg Icon-->
                            </a>
                            <!--end::Button-->
                            @endif

                            @hasSection('exportXML')
                            <!--begin::Button-->
                            @yield('exportXML') 
                                <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                                <img class="w-30px" src="{{ url('panel/assets/media/svg/files/xml.svg') }}" alt="">
                                <!--end::Svg Icon-->
                            </a>
                            <!--end::Button-->
                            @endif
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Toolbar-->
                
