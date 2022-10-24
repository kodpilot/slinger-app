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
    <title>{{ getInfos()->title }} </title>
    <meta charset="utf-8" />
    <meta name="description" content="{{ getInfos()->description }}" />
    <meta name="keywords" content="{{ getInfos()->keywords }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="session_id" content="{{ Session::get('id') }}">
    <meta property="og:locale" content="tr_TR" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Kodpilot Admin Paneli" />
    <meta property="og:url" content="https://kodpilot.com" />
    <meta property="og:site_name" content="{{ getInfos()->title }}" />
    <link rel="shortcut icon" href="{{ url('assets/images/logos/' . getInfos()->favicon) }}" />
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

<body  id="kt_body" class="header-extended header-fixed header-tablet-and-mobile-fixed">
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
        <style>
           .profile_header{
                margin-top:-125px;
            }

            @media(max-width:800px){
            .profile_header{
                margin-top:-35px;
            }
            }
        </style>
        <div  class="page d-flex flex-row flex-column-fluid profile_header">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Toolbar-->
                <div  class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">

                    <!--begin::Container-->
                    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">

                        <!--begin::Logo-->
                        <a href="{{ route('index') }}" class="d-flex align-items-center">
                            <img alt="Logo" src="{{ url('assets/images/logos/' . getInfos()->logo) }}"
                                class="h-50px h-lg-60px" />
                        </a>
                        <!--end::Logo-->

                        <!--begin::Actions-->
                        <div class="d-flex align-items-center">

                            

                            <!--begin::Add user-->
                            <a href="{{ route('index') }}" class="btn btn-color-primary m-0 p-4"
                                title="Anasayfa">

                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M20 22H4C3.4 22 3 21.6 3 21V2H21V21C21 21.6 20.6 22 20 22Z" fill="black"/>
                                        <path d="M12 14C9.2 14 7 11.8 7 9V5C7 4.4 7.4 4 8 4C8.6 4 9 4.4 9 5V9C9 10.7 10.3 12 12 12C13.7 12 15 10.7 15 9V5C15 4.4 15.4 4 16 4C16.6 4 17 4.4 17 5V9C17 11.8 14.8 14 12 14Z" fill="black"/>
                                        </svg>
                                </span>
                            </a>
                            <!--end::Add user-->

                            <!--begin::Add user-->
                            <a href="{{ route('profile.logout') }}" class="btn btn-color-primary  m-0 p-4"
                                 title="Çıkış">

                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path opacity="0.3"
                                            d="M21 22H12C11.4 22 11 21.6 11 21V3C11 2.4 11.4 2 12 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22ZM15.4 17L19.7 12.7C20.1 12.3 20.1 11.7 19.7 11.3L15.4 7V17Z"
                                            fill="black" />
                                        <path d="M15.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H15.4V11Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </a>
                            <!--end::Add user-->

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
                                    @isset($lastUpdate->status)
                                    @if ($lastUpdate->status == 'Tamamlandı')
                                    <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-0 animation-blink"></span>
                                    @elseif($lastUpdate->status == 'Hazırlanıyor')
                                    <span class="bullet bullet-dot bg-warning h-6px w-6px position-absolute translate-middle top-0 start-0 animation-blink"></span>
                                    @elseif($lastUpdate->status == 'Bekleniyor')
                                    <span class="bullet bullet-dot bg-dark h-6px w-6px position-absolute translate-middle top-0 start-0 animation-blink"></span>
                                    @elseif($lastUpdate->status == 'Kargoya Verildi')
                                    <span class="bullet bullet-dot bg-primary h-6px w-6px position-absolute translate-middle top-0 start-0 animation-blink"></span>
                                    @else
                                    <span class="bullet bullet-dot bg-danger h-6px w-6px position-absolute translate-middle top-0 start-0 animation-blink"></span>
                                    @endif
                                    @else
                                    <span class="bullet bullet-dot bg-dark h-6px w-6px position-absolute translate-middle top-0 start-0 animation-blink"></span>
                                    @endisset
                                   
                                    <!--end::Notification animation-->
                                </div>
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::Robot-->




                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Toolbar-->
