@extends('profile.layouts.master')
@section('mainTitle', 'Ürünler')
@section('path1', 'Panel')
@section('footer_js')

    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ url('panel/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ url('panel/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/intro.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Page Custom Javascript-->

    <script>
        function printDiv() {
            var printContents = document.getElementById('printArea').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();
        }
    </script>
@endsection
@section('content')
    <!--begin::Container-->
    <div class="d-flex flex-row flex-column-fluid container">
        <!--begin::Content Wrapper-->
        <div class="main d-flex flex-column flex-row-fluid">
            <div class="content flex-column-fluid" id="kt_content">
                @if (isset($carts))
                    <div class="card card-custom">
                        <div class="card-body p-0">
                            <!--begin::Invoice-->
                            <!--begin::Invoice header-->
                            <div class="container">
                                <div id="printArea">
                                    <div class="card card-custom card-shadowless">
                                        <div class="card-body p-0">
                                            <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                                                <div class="col-md-9">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center flex-column flex-md-row">
                                                        <div
                                                            class="d-flex flex-column px-0 order-2 order-md-1 align-items-center align-items-md-start">

                                                            <!--begin::Logo-->
                                                            <a href="#" class="mb-5 max-w-115px">
                                                                <img width="100"
                                                                    src="{{ url('assets/images/logos/' . getInfos()->logo) }}"
                                                                    alt="">
                                                            </a>
                                                            <!--end::Logo-->
                                                            <span
                                                                class="d-flex flex-column font-size-h5 font-weight-bold text-muted align-items-center align-items-md-start">
                                                                <span>{{ getInfos()->address1 }} </span>
                                                                <span>{{ getInfos()->address2 }}</span>
                                                            </span>
                                                        </div>
                                                        <h3 style="margin-right: -20px!important; font-size:20px"
                                                            class="display-4 font-weight-boldest order-1 order-md-2 mb-5 mb-md-0">
                                                            PROFORMA FATURA</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end::Invoice header-->
                                    <!--begin::Invoice Body-->
                                    <div class="position-relative">
                                        <!--begin::Background Rows-->
                                        <div class="bgi-size-cover bgi-position-center bgi-no-repeat h-65px"
                                            style="background-image: url({{ url('adminAssets/media/svg/shapes/abstract-7.svg') }});">
                                        </div>
                                        <style>
                                            thead tr td {
                                                color: black;
                                            }

                                        </style>
                                        <!--end::Background Rows-->
                                        <!--begin:Table-->
                                        <div class="container  top-0 left-0 right-0">
                                            <div class="row justify-content-center">
                                                <div class="col-md-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr class="font-weight-boldest text-black h-65px">
                                                                    <td class="align-middle font-size-h4 pl-0 border-0">Ürün
                                                                        Kodu</td>
                                                                    <td class="align-middle font-size-h4 pl-0 border-0">Ürün
                                                                    </td>
                                                                    <td class="align-middle font-size-h4 pl-0 border-0">Seçenek
                                                                    </td>
                                                                    <td
                                                                        class="align-middle font-size-h4 text-right border-0">
                                                                        Adet</td>
                                                                    <td
                                                                        class="align-middle font-size-h4 text-right border-0">
                                                                        Fiyatı</td>
                                                                    <td
                                                                        class="align-middle font-size-h4 text-right pr-0 border-0">
                                                                        Toplam Fiyat</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($carts as $cart)
                                                                    <tr class="font-weight-bolder h-45px">
                                                                        <td class="align-middle pl-0 border-0">
                                                                            {{ $cart->product_code }}</td>
                                                                        <td class="align-middle pl-0 border-0">
                                                                            {{ $cart->product_name }}</td>
                                                                        <td class="align-middle text-right border-0">
                                                                            {{ getVariationNames($cart->cart_option)  }}
                                                                        </td>
                                                                        <td class="align-middle text-right border-0">
                                                                            {{ $cart->cart_qty }}</td>



                                                                        <td
                                                                            class="align-middle text-right text-danger font-weight-boldest font-size-h5 pr-0 border-0">
                                                                            {{ number_format($cart->cart_total, 2) }} {{ $order->currency == 'tl' ? '₺' : '$' }} 
                                                                        </td>

                                                                        <td
                                                                            class="align-middle text-right text-danger font-weight-boldest font-size-h5 pr-0 border-0">
                                                                            {{ number_format($cart->cart_total * $cart->cart_qty, 2)}} {{ $order->currency == 'tl' ? '₺' : '$' }} 
                                                                        </td>
                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end:Table-->
                                        <!--begin::Total-->
                                        <div class="row justify-content-center pt-25 pb-20">
                                            <div class="col-md-9">
                                                <div class="rounded d-flex align-items-center justify-content-between text-white max-w-425px position-relative ml-auto px-7 py-5 bgi-no-repeat bgi-size-cover bgi-position-center"
                                                    style="background-image: url({{ url('adminAssets/media/svg/shapes/abstract-9.svg') }});">
                                                    <div class="font-weight-boldest font-size-h5">GENEL TOPLAM</div>
                                                    <div class="text-right d-flex flex-column">
                                                        <span
                                                            class="font-weight-boldest font-size-h3 line-height-sm">
                                                           {{ number_format($order->total, 2)}} {{ $order->currency == 'tl' ? '₺' : '$' }} 
                                                        </span>

                                                        <span class="font-size-sm">KDV dahil</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end::Total-->
                                    </div>
                                    <!--end::Invoice Body-->
                                    <!--begin::Invoice Footer-->
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        {{-- <div class="d-flex flex-column flex-md-row">
											<div class="d-flex flex-column">
												<div class="font-weight-bold font-size-h6 mb-3">BANK TRANSFER</div>
												<div class="d-flex justify-content-between font-size-lg mb-3">
													<span class="font-weight-bold mr-15">Account Name:</span>
													<span class="text-right">Barclays UK</span>
												</div>
												<div class="d-flex justify-content-between font-size-lg mb-3">
													<span class="font-weight-bold mr-15">Account Number:</span>
													<span class="text-right">1234567890934</span>
												</div>
												<div class="d-flex justify-content-between font-size-lg">
													<span class="font-weight-bold mr-15">Code:</span>
													<span class="text-right">BARC0032UK</span>
												</div>
											</div>
										</div> --}}
                                                        <div
                                                            class="text-dark-50 font-size-lg font-weight-bold mb-3 text-right">
                                                            Müşteri.</div>
                                                        <div class="font-size-lg font-weight-bold mb-10 text-right">
                                                            {{ $user->name }} {{ $user->surname }}
                                                            <br />{{ $address->address }}
                                                            <br>{{ $address->country }}/{{ $address->city }}/{{ $address->town }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">

                                                        <div
                                                            class="text-dark-50 font-size-lg font-weight-bold mb-3 text-right">
                                                            PROFORMA NO.</div>
                                                        <div class="font-size-lg font-weight-bold mb-10 text-right">
                                                            {{ $order->order_id }}</div>
                                                    </div>
                                                    <div class="col-md-4 mt-7 mt-md-0">
                                                        <!--begin::Invoice To-->

                                                        <!--end::Invoice To-->
                                                        <!--begin::Invoice No-->

                                                        <!--end::Invoice No-->
                                                        <!--begin::Invoice Date-->
                                                        <div
                                                            class="text-dark-50 font-size-lg font-weight-bold mb-3 text-right">
                                                            TARİH</div>
                                                        <div class="font-size-lg font-weight-bold text-right">
                                                            {{ date('d/m/Y', strtotime($order->order_date)) }}</div>
                                                        <!--end::Invoice Date-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::Invoice Footer-->
                            <!-- begin: Invoice action-->
                            <div class="container">
                                <div class="row justify-content-center py-8 px-8 py-md-28 px-md-0">
                                    <div class="col-md-9">
                                        <div class="d-flex font-size-sm flex-wrap">
                                            <a href="{{ url()->previous() }}"
                                                class="btn btn-danger font-weight-bolder py-4 mr-3 mr-sm-14 my-1 px-7">Geri</a>



                                            <button type="button"
                                                class="btn btn-primary font-weight-bolder ml-sm-auto my-1 px-7"
                                                onclick="printDiv();">Yazdırma Görünümü</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice action-->
                            <!--end::Invoice-->
                        </div>

                    </div>
                @endif
            </div>
            <!--end::Content-->
        </div>
        <!--begin::Content Wrapper-->
    </div>
@endsection
