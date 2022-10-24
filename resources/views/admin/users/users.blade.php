@extends('admin.layouts.master')
@section('mainTitle', __('Üyeler'))
@section('path1', 'Panel')

@section('footer_js')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ url('panel/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ url('panel/assets/js/particulars/product.js') }}"></script>
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
    <!--end::Javascript-->
@endsection
@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Tables Widget 1-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <form action="{{ route('user.filter') }}" method="GET">
                                @csrf
                                <input type="text" name="filter_name" onchange="this.form.submit()"
                                    class="form-control form-control-solid w-250px ps-14"
                                    placeholder="{{__('Ad, Soyad veya Mail')}}" />
                            </form>
                        </div>
                        <!--end::Search-->


                    </div>
                    <!--begin::Card title-->
                    
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path opacity="0.3"
                                        d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                        fill="black" />
                                    <path
                                        d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                        fill="black" />
                                    <path
                                        d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--begin::Date Search-->

                            <form style="display: flex;justify-content:space-between !important;align-items:center;"
                                action="{{ route('user.filter') }}" method="GET">
                                @csrf
                                <input onkeydown="form.submit()" name="filter_date" style="margin-right: 10px"
                                    class="w-250px ps-14 form-control form-control-solid bg-light "
                                    placeholder="Tarihe Göre Filtrele" id="kt_daterangepicker_4" />
                                <button class="btn btn-light">{{__('ARA')}}</button>

                            </form>
                            <!--end::Date Search-->
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            @if (isset($limit))
                                @if ($limit == 100)
                                    <a style="margin-right: 10px" class="btn btn-primary" href="{{route('user.getLimitedUser',['limit'=>100])}}" class="btn btn-light">100</a>
                                    <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>500])}}" class="btn btn-light">500</a>
                                    <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>1000])}}" class="btn btn-light">1000</a>
                                    <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>99999])}}" class="btn btn-light">{{__('Hepsi')}}</a>
                                @elseif($limit == 500)
                                    <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>100])}}" class="btn btn-light">100</a>
                                    <a style="margin-right: 10px" class="btn btn-primary" href="{{route('user.getLimitedUser',['limit'=>500])}}" class="btn btn-light">500</a>
                                    <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>1000])}}" class="btn btn-light">1000</a>
                                    <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>99999])}}" class="btn btn-light">{{__('Hepsi')}}</a>
                                @elseif($limit == 1000)
                                    <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>100])}}" class="btn btn-light">100</a>
                                    <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>500])}}" class="btn btn-light">500</a>
                                    <a style="margin-right: 10px" class="btn btn-primary" href="{{route('user.getLimitedUser',['limit'=>1000])}}" class="btn btn-light">1000</a>
                                    <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>99999])}}" class="btn btn-light">{{__('Hepsi')}}</a>
                                @else 
                                    <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>100])}}" class="btn btn-light">100</a>
                                    <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>500])}}" class="btn btn-light">500</a>
                                    <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>1000])}}" class="btn btn-light">1000</a>
                                    <a style="margin-right: 10px" class="btn btn-primary" href="{{route('user.getLimitedUser',['limit'=>99999])}}" class="btn btn-light">{{__('Hepsi')}}</a>
                                @endif
                            @else
                                <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>100])}}" class="btn btn-light">100</a>
                                <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>500])}}" class="btn btn-light">500</a>
                                <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>1000])}}" class="btn btn-light">1000</a>
                                <a style="margin-right: 10px" href="{{route('user.getLimitedUser',['limit'=>99999])}}" class="btn btn-light">{{__('Hepsi')}}</a>
                            @endif
                           
                        </div>
                    </div>
                </div>
                <!--end::Card header-->
                {{-- <a href="{{route('user.sort',['order'=>'created_at,asc'])}}">{{route('user.sort',['order'=>'created_at,asc'])}}</a> --}}
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="w-25px">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" name="total_check[]" data-kt-check="true" 
                                                data-kt-check-target=".widget-9-check" />
                                        </div>
                                    </th>
                                    <th class="min-w-140px">
                                    @if (isset($order))
                                        @if ($order[0] == 'name')
                                            @if ($order[1] == 'asc')
                                                <a href="{{route('user.sort',['order'=>'name,desc'])}}">{{__('Ad Soyad')}}</a>
                                                <span class="svg-icon svg-icon-primary svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>
                                                </svg></span>
                                            @else
                                                <span class="text-primary"><a href="{{route('user.sort',['order'=>'name,asc'])}}">{{__('Ad Soyad')}}</a> </span> 
                                                <span class="svg-icon svg-icon-primary svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M12.5657 11.3657L16.75 15.55C17.1642 15.9643 17.8358 15.9643 18.25 15.55C18.6642 15.1358 18.6642 14.4643 18.25 14.05L12.7071 8.50716C12.3166 8.11663 11.6834 8.11663 11.2929 8.50715L5.75 14.05C5.33579 14.4643 5.33579 15.1358 5.75 15.55C6.16421 15.9643 6.83579 15.9643 7.25 15.55L11.4343 11.3657C11.7467 11.0533 12.2533 11.0533 12.5657 11.3657Z" fill="black"/>
                                                </svg></span>
                                            @endif
                                        @else
                                        <a class="text-muted" href="{{route('user.sort',['order'=>'name,asc'])}}">{{__('Ad Soyad')}}</a> 
                                        @endif
                                    @else
                                        <a class="text-muted" href="{{route('user.sort',['order'=>'name,asc'])}}">{{__('Ad Soyad')}}</a> 
                                    @endif
                                    </th>
                                    <th class="min-w-140px">
                                        @if (isset($order))
                                            @if ($order[0] == 'email')
                                                @if ($order[1] == 'asc')
                                                   <a href="{{route('user.sort',['order'=>'email,desc'])}}">{{__('Email')}}</a>
                                                    <span class="svg-icon svg-icon-primary svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>
                                                    </svg></span>
                                                @else
                                                    <a href="{{route('user.sort',['order'=>'email,asc'])}}">{{__('Email')}}</a>
                                                    <span class="svg-icon svg-icon-primary svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M12.5657 11.3657L16.75 15.55C17.1642 15.9643 17.8358 15.9643 18.25 15.55C18.6642 15.1358 18.6642 14.4643 18.25 14.05L12.7071 8.50716C12.3166 8.11663 11.6834 8.11663 11.2929 8.50715L5.75 14.05C5.33579 14.4643 5.33579 15.1358 5.75 15.55C6.16421 15.9643 6.83579 15.9643 7.25 15.55L11.4343 11.3657C11.7467 11.0533 12.2533 11.0533 12.5657 11.3657Z" fill="black"/>
                                                    </svg></span>
                                                @endif
                                            @else
                                            <a class="text-muted" href="{{route('user.sort',['order'=>'email,asc'])}}">{{__('Email')}}</a>
                                            @endif
                                        @else
                                        <a class="text-muted" href="{{route('user.sort',['order'=>'email,asc'])}}">{{__('Email')}}</a>
                                        @endif
                                    </th>
                                    <th class="min-w-140px">{{__('Telefon')}}</th>
                                    <th class="min-w-140px">
                                    @if (isset($order))
                                        @if ($order[0] == 'created_at')
                                            @if ($order[1] == 'asc')
                                            <a href="{{route('user.sort',['order'=>'created_at,desc'])}}">{{__('Kayıt Tarihi')}}</a>
                                                <span class="svg-icon svg-icon-primary svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>
                                                </svg></span>
                                            @else
                                            <a href="{{route('user.sort',['order'=>'created_at,asc'])}}">{{__('Kayıt Tarihi')}}</a> 
                                                <span class="svg-icon svg-icon-primary svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M12.5657 11.3657L16.75 15.55C17.1642 15.9643 17.8358 15.9643 18.25 15.55C18.6642 15.1358 18.6642 14.4643 18.25 14.05L12.7071 8.50716C12.3166 8.11663 11.6834 8.11663 11.2929 8.50715L5.75 14.05C5.33579 14.4643 5.33579 15.1358 5.75 15.55C6.16421 15.9643 6.83579 15.9643 7.25 15.55L11.4343 11.3657C11.7467 11.0533 12.2533 11.0533 12.5657 11.3657Z" fill="black"/>
                                                </svg></span>
                                            @endif
                                        @else
                                        <a class="text-muted" href="{{route('user.sort',['order'=>'created_at,asc'])}}">{{__('Kayıt Tarihi')}}</a>
                                        @endif
                                    @else
                                    <a class="text-muted" href="{{route('user.sort',['order'=>'created_at,asc'])}}">{{__('Kayıt Tarihi')}}</a>
                                    @endif
                                    </th>
                                    <th class="min-w-100px text-end">{{__('Eylemler')}}</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                <form action="{{route('user.collectiveDelete')}}" method="post">
                                    @csrf
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input widget-9-check" name="total_check[]" type="checkbox" value="{{$user->id}}"/>
                                            </div>
                                        </td>

                                        <td>
                                            {{ $user->name }}  {{ $user->surname }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->tel }}
                                        </td>
                                        <td>
                                            {{ $user->created_at }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                
                                                <a href="{{route('user.destroy', ['id' => $user->id])}}"
                                                    class="btn btn-icon btn-light-danger btn-active-danger btn-sm me-1">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg') }}-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none">
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
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <button type="submit" class="btn btn-danger">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
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
                                        <!--end::Svg Icon-->{{__('Toplu Sil')}}
                                    </button>
                                </form>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Tables Widget 1-->
        </div>
        <!--end::Post-->
        
    </div>
    <!--end::Container-->
    {{-- <div class="page-pagination">
        <nav aria-label="pagination">
            {!! $users->links('particulars.paginate') !!}
        </nav>
    </div> --}}
@endsection
