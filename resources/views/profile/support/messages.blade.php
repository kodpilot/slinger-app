@extends('profile.layouts.master')
@section('mainTitle', 'Destek Sistemi')
@section('path1', 'Panel')
@section('addModal') @include('profile.support.addModal') @endsection
@section('footer_js')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ url('panel/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ url('panel/assets/js/custom/apps/support-center/tickets/create.js') }}"></script>
    <script src="{{ url('panel/assets/js/custom/documentation/documentation.js') }}"></script>
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
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            @include('profile.layouts.navbar')
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-xl-row p-7">
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid me-xl-15 mb-20 mb-xl-0">
                            <!--begin::Ticket view-->
                            <div class="mb-0">
                                <!--begin::Heading-->
                                <div class="d-flex align-items-center mb-12">
                                    <!--begin::Icon-->
                                    <!--end::Icon-->
                                    <!--begin::Content-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Title-->
                                        <h1 class="text-gray-800 fw-bold">{{$ticket->subject}}</h1>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::heading-->
                                <!--begin::Comments-->
                                
                                <!--end::Comments-->
                                <!--begin::Input group-->
                                <div class="mb-0">
                                    @if ($ticket->status == 1)
                                    <form action="{{route('profile.messageTicket')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="ticket_id" value="{{$id}}">
                                        <textarea
                                        class="form-control form-control-solid placeholder-gray-600 fw-bolder fs-4 ps-9 pt-7"
                                        rows="6" name="description" placeholder="Cevap İçin yazınız"></textarea>
                                         <!--begin::Submit-->
                                        <button type="submit"
                                        class="btn btn-primary mt-n20 mb-20 position-relative float-end me-7">Gönder</button>
                                    </form>
                                    @else
                                    <form action="{{route('profile.messageTicket')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="ticket_id" value="{{$id}}">
                                        <textarea
                                        class="form-control form-control-solid placeholder-gray-600 fw-bolder fs-4 ps-9 pt-7"
                                        rows="6" name="description" disabled placeholder="Cevap İçin yazınız"></textarea>
                                         <!--begin::Submit-->
                                        <button type="submit" disabled
                                        class="btn btn-primary mt-n20 mb-20 position-relative float-end me-7">Gönder</button>
                                    </form>
                                    @endif

                                    
                                    <!--end::Submit-->
                                </div>

                                <div class="mb-15">
                                    <!--begin::Comment-->
                                    @foreach ($ticketMessages as $ticketMessage)
                                    <div class="mb-9">
                                        <!--begin::Card-->
                                        <div class="card card-bordered w-100">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <!--begin::Wrapper-->
                                                <div class="w-100 d-flex flex-stack mb-8">
                                                    <!--begin::Container-->
                                                    <div class="d-flex align-items-center f">
                                                        <!--begin::Info-->
                                                        <div
                                                            class="d-flex flex-column fw-bold fs-5 text-gray-600 text-dark">
                                                            <!--begin::Text-->
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Username-->
                                                                <a href="#"
                                                                    class="text-gray-800 fw-bolder text-hover-primary fs-5 me-3">{{getSingleUser($ticketMessage->user_id)->name}}</a>
                                                                <!--end::Username-->
                                                                <span class="m-0"></span>   
                                                            </div>
                                                            <!--end::Text-->
                                                            <!--begin::Date-->
                                                            <span class="text-muted fw-bold fs-6">{{$ticketMessage->created_at}}</span>
                                                            <!--end::Date-->
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::Container-->
                                                    <!--begin::Actions-->
                                                    <div class="m-0">
                                                        <button
                                                            class="btn btn-color-gray-400 btn-active-color-primary p-0 fw-bolder">
                                                            @if (getSingleUser($ticketMessage->user_id)->admin != 0)
                                                            Admin
                                                            @else
                                                            Kullanıcı
                                                            @endif
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Desc-->
                                                <p class="fw-normal fs-5 text-gray-700 m-0">{{$ticketMessage->description}}</p>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    @endforeach
                                    
                                    <!--end::Comment-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Details-->

                        </div>
                        <!--end::Ticket view-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>

@endsection
