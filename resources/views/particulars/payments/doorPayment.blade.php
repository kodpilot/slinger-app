		<!--begin::Modal - New Card-->
		<div class="modal fade" id="havale" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Modal header-->
					<div class="modal-header">
						<!--begin::Modal title-->
						<h2>Havale Bilgileri</h2>
						<!--end::Modal title-->
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Tables widget 1-->
                        <div class="card card-flush mb-xxl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-dark">Bankalar</span>
                                </h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Nav-->
                                <ul class="nav nav-pills nav-pills-custom mb-3">
                                    <?php $j=0 ?>
                                @foreach ($bank_infos as $bank)
                                    <!--begin::Item-->
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <!--begin::Link-->
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden {{$j == 0 ? 'active':''}} w-80px h-85px py-4" data-bs-toggle="pill" href="#bank_infos_{{$bank->id}}">
                                            <!--begin::Icon-->
                                            <div class="nav-icon">
                                                <img alt="" src="{{url('/panel/assets/media/banks/'.$bank->file)}}" class="" />
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Subtitle-->
                                            <span class="nav-text text-gray-700 fw-bolder fs-6 lh-1">{{$bank->bank_name}}</span>
                                            <!--end::Subtitle-->
                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::Item-->
                                    <?php $j++?>
                                    @endforeach
                                </ul>
                                <!--end::Nav-->
                                <!--begin::Tab Content-->
                                <div class="tab-content">
                                    <?php $i=0 ?>
                                    @foreach ($bank_infos as $bank)
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade {{$i == 0 ? 'active show':''}} " id="bank_infos_{{$bank->id}}">
                                        <?php $i++?>
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle gs-0 gy-4 my-0">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr class="fs-7 fw-bolder text-gray-500">
                                                        <th class="p-0 min-w-150px d-block pt-3">{{$bank->bank_name}} Banka Bilgileri</th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                    <tr>
                                                        <td> Şube adı: {{$bank->branch_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Hesap sahibi: {{$bank->owner_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Kur tipi: {{$bank->currency}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hesap Numarası: {{$bank->account_number}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>IBAN: {{$bank->iban}}</td>
                                                    </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Tap pane-->
                                    @endforeach
                                </div>
                                <!--end::Tab Content-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end::Tables widget 1-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - New Card-->