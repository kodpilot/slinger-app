<!DOCTYPE html>

<html lang="en">
<head>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
	<!-- End Google Tag Manager -->
	<meta charset="utf-8" />
	<title>{{ getInfos()->title }}</title>
	<meta name="description" content="{{ getInfos()->description }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="https://keenthemes.com/metronic" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Custom Styles(used by this page)-->
	{{-- <link href="{{ url('/loginAssets/css/login-4_v=7.1.1.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ url('/loginAssets/css/styles.css') }}" rel="stylesheet" type="text/css" /> --}}
	<!--end::Page Custom Styles-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="{{ url('/panel/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ url('/panel/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	{{-- <link href="{{ url('/loginAssets/css/style.bundle_v=7.1.1.css') }}" rel="stylesheet" type="text/css" /> --}}
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="{{ url('/assets/images/logos/'. getInfos()->favicon) }}" />
	<!-- Hotjar Tracking Code for keenthemes.com -->
	<script>(function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)}; h._hjSettings={hjid:1070954,hjsv:6}; a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv; a.appendChild(r); })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');</script>
	@toastr_css
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-body">
	<!-- Google Tag Manager (noscript) -->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript) -->
	<!--begin::Main-->
	<div  class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div   class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/metronic8/demo20/assets/media/illustrations/sketchy-1/14.png">
			<!--begin::Content-->
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
				<!--begin::Container-->
				{{-- 0000====CONTENT====0000 --}}
				@yield('log-reg')
			</div>
			<!--begin::Content-->
			<!--begin::Aside-->
			
			<!--end::Aside-->
		</div>
		<!--end::Login-->
	</div>
	<!--end::Main-->
	
	<!--begin::Global Config(global config for global JS scripts)-->
	{{-- <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script> --}}
	<!--end::Global Config-->
	@jquery
	@toastr_js
	@toastr_render
	<!--begin::Global Theme Bundle(used by all pages)-->
	<script src="{{ url('/panel/assets/plugins/global/plugins.bundle.js') }}"></script>
	<script src="{{ url('/panel/assets/js/scripts.bundle.js') }}"></script>
	<script src="{{ url('/panel/assets/js/custom/authentication/sign-in/general.js') }}"></script>
	<!--end::Global Theme Bundle-->
	<!--begin::Page Scripts(used by this page)-->
	{{-- <script src="{{ url('/loginAssets/js/login-4_v=7.1.1.js') }}"></script> --}}
	<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>
