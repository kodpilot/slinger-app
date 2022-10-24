let teslimatShowCheckbox = document.querySelector('.teslimatShowCheckbox');
let teslimatTable = document.querySelector('.teslimatArea');
teslimatShowCheckbox.addEventListener('change',(e)=>{
let template = `<!--begin::Modal header-->
				<div class="modal-header" id="teslimat_div">
					<!--begin::Modal title-->
					<h2>Fatura Adresi</h2>
					<!--end::Modal title-->
				</div>
				<!--end::Modal header-->
				<!--begin::Modal body-->
				<div class="modal-body py-10 px-lg-17">
					<!--begin::Scroll-->
					<div class="scroll-y me-n7 pe-7" id="teslimat_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#teslimat_div" data-kt-scroll-wrappers="#teslimat_scroll" data-kt-scroll-offset="300px">
						<!--begin::Input group-->
						<div class="row mb-5">
							<!--begin::Col-->
							<div class="col-md-6 fv-row">
								<!--begin::Label-->
								<label class="required fs-5 fw-bold mb-2">Ad</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid" placeholder="" name="name_teslimat" />
								<!--end::Input-->
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-md-6 fv-row">
								<!--end::Label-->
								<label class="required fs-5 fw-bold mb-2">Soyad</label>
								<!--end::Label-->
								<!--end::Input-->
								<input type="text" class="form-control form-control-solid" placeholder="" name="surname_teslimat" />
								<!--end::Input-->
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-5 fw-bold mb-2">
								<span class="required">Ülke</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Ödeme Yöntemlerinde Önemlidir!"></i>
							</label>
							<!--end::Label-->
							<!--begin::Select-->
							<select name="country_teslimat" data-control="select2" data-dropdown-parent="#teslimat_div" data-placeholder="Ülke Seçiniz" class="form-select form-select-solid ">
								<option class="countrys_teslimat" value="">Ülke Seçiniz</option>
							</select>
							<!--end::Select-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-5 fw-bold mb-2">
								<span class="required">İl</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Ödeme Yöntemlerinde Önemlidir!"></i>
							</label>
							<!--end::Label-->
							<!--begin::Select-->
							<select name="city_teslimat" data-control="select2" data-dropdown-parent="#teslimat_div" data-placeholder="İl Seçiniz" class="form-select form-select-solid ">
								<option class="citys_teslimat" value="">İl Seçiniz</option>
							</select>
							<!--end::Select-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row g-9 mb-5">
							<!--begin::Col-->
							<div class="col-md-6 fv-row">
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-5 fv-row">
									<!--begin::Label-->
									<label class="d-flex align-items-center fs-5 fw-bold mb-2">
										<span class="required">İlçe</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Ödeme Yöntemlerinde Önemlidir!"></i>
									</label>
									<!--end::Label-->
									<!--begin::Select-->
									<select name="state_teslimat" data-control="select2" data-dropdown-parent="#teslimat_div" data-placeholder="İlçe Seçiniz" class="form-select form-select-solid ">
										<option class="states_teslimat" value="">İlçe Seçiniz</option>
									</select>
									<!--end::Select-->
								</div>
								<!--end::Input group-->
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-md-6 fv-row">
								<!--begin::Label-->
								<label class="fs-5 fw-bold mb-2">Posta Kodu</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input class="form-control form-control-solid" placeholder="" name="zipcode_teslimat" />
								<!--end::Input-->
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-bold mb-2">Adres</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-solid" placeholder="" name="address_teslimat" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-bold mb-2">Email</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control type="email" form-control-solid" placeholder="" name="mail_teslimat" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-bold mb-2">Telefon Numarası</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control type="tel" form-control-solid" placeholder="" name="tel_teslimat" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="d-flex flex-column mb-5 fv-row">
							<!--begin::Label-->
							<label class="required fs-5 fw-bold mb-2">Kimlik Numaranız</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" onkeydown="checkTc(event)"  class="form-control form-control-solid" maxlength="11" placeholder="Kimlik Numaranızı Giriniz" name="tc_teslimat" value="" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
					</div>
					<!--end::Scroll-->
				</div>
				<!--end::Modal body-->`;
if(e.target.checked){
	teslimatTable.innerHTML=template;
	e.target.value="1";
	let countryCode = '';
	getCountries(document.querySelector('.countrys_teslimat'));
	

	// document.querySelector('[name="country_teslimat"]').addEventListener('change',(event)=>{console.log("ok");},false)
	// document.querySelector('[name="city_teslimat"]').addEventListener('change',(event)=>{console.log("ok");},false)
	$(document.querySelector('[name="country_teslimat"]'))
		.select2()
			.on("change", function (event) {
				console.log("ok");
				let val = event.target.value;
				let element = event.target.querySelectorAll(`[data-name=${replacer(val)}]`)[0];
				let code = element.dataset.id;
				document.querySelector('.states_teslimat').parentElement.innerHTML =  `<option value=" " class="states_teslimat" >İlçe Seçiniz</option>`;
				document.querySelector('.citys_teslimat').parentElement.innerHTML =  `<option value=" " class="citys_teslimat" >İl Seçiniz</option>`;
				countryCode=code;
				getCitys(document.querySelector('.citys_teslimat'),code);
	});
	$(document.querySelector('[name="city_teslimat"]'))
		.select2()
			.on("change", function (event) {
				let val = event.target.value;
				let element = event.target.querySelectorAll(`[data-name=${replacer(val)}]`)[0];
				let code = element.dataset.id;
				document.querySelector('.states_teslimat').parentElement.innerHTML =  `<option value=" " class="states_teslimat" >İlçe Seçiniz</option>`;
				getStates(document.querySelector('.states_teslimat'),countryCode,code);
	});
}
else{
	e.target.value="0";
	teslimatTable.innerHTML="";
}
})

const discountElement = document.querySelector('[name="discount"]');
let request;
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
discountElement.addEventListener('change',(e)=>{
	if (request) {
        request.abort();
    }
    const serializedData = {
        "code":e.target.value,
		"session_id":$('meta[name="session_id"]').attr('content')
    }
    
    request = $.ajax({
        url: "/panel/indirim-kodlari/kontrol",
        type: "post",
        data: serializedData
    });
    request.done(function (response, textStatus, jqXHR){
		discountElement.readOnly=true;
		let araToplam = document.querySelector('.araToplam');
		let total = araToplam.querySelector('.totalPrice').innerHTML;
		let discountPrice = parseFloat(total)*response.discount/100;
		let label_ = document.createElement('label');
		label_.classList.add('d-flex');
		label_.classList.add('flex-stack');
		label_.classList.add('mb-5');
		label_.classList.add('cursor-pointer');
		label_.innerHTML=`
				<div class="col-4 col-lg-6 "></div>
				<!-- Begin:Col -->
				<div class="col-8 col-lg-6 d-flex">
				<!--begin:Label-->
				<span class="d-flex align-items-center me-2">
					<!--begin::Icon-->
					<span class="symbol symbol-50px me-6">
						<span class="symbol-label">
							<!--begin::Svg Icon | path: assets/media/icons/duotune/ecommerce/ecm003.svg-->
							<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path opacity="0.3" d="M18 22H6C5.4 22 5 21.6 5 21V8C6.6 6.4 7.4 5.6 9 4H15C16.6 5.6 17.4 6.4 19 8V21C19 21.6 18.6 22 18 22ZM12 5.5C11.2 5.5 10.5 6.2 10.5 7C10.5 7.8 11.2 8.5 12 8.5C12.8 8.5 13.5 7.8 13.5 7C13.5 6.2 12.8 5.5 12 5.5Z" fill="black"/>
							<path d="M12 7C11.4 7 11 6.6 11 6V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V6C13 6.6 12.6 7 12 7ZM15.1 10.6C15.1 10.5 15.1 10.4 15 10.3C14.9 10.2 14.8 10.2 14.7 10.2C14.6 10.2 14.5 10.2 14.4 10.3C14.3 10.4 14.3 10.5 14.2 10.6L9 19.1C8.9 19.2 8.89999 19.3 8.89999 19.4C8.89999 19.5 8.9 19.6 9 19.7C9.1 19.8 9.2 19.8 9.3 19.8C9.5 19.8 9.6 19.7 9.8 19.5L15 11.1C15 10.8 15.1 10.7 15.1 10.6ZM11 11.6C10.9 11.3 10.8 11.1 10.6 10.8C10.4 10.6 10.2 10.4 10 10.3C9.8 10.2 9.50001 10.1 9.10001 10.1C8.60001 10.1 8.3 10.2 8 10.4C7.7 10.6 7.49999 10.9 7.39999 11.2C7.29999 11.6 7.2 12 7.2 12.6C7.2 13.1 7.3 13.5 7.5 13.9C7.7 14.3 7.9 14.5 8.2 14.7C8.5 14.9 8.8 14.9 9.2 14.9C9.8 14.9 10.3 14.7 10.6 14.3C11 13.9 11.1 13.3 11.1 12.5C11.1 12.3 11.1 11.9 11 11.6ZM9.8 13.8C9.7 14.1 9.5 14.2 9.2 14.2C9 14.2 8.8 14.1 8.7 14C8.6 13.9 8.5 13.7 8.5 13.5C8.5 13.3 8.39999 13 8.39999 12.6C8.39999 12.2 8.4 11.9 8.5 11.7C8.5 11.5 8.6 11.3 8.7 11.2C8.8 11.1 9 11 9.2 11C9.5 11 9.7 11.1 9.8 11.4C9.9 11.7 10 12 10 12.6C10 13.2 9.9 13.6 9.8 13.8ZM16.5 16.1C16.4 15.8 16.3 15.6 16.1 15.4C15.9 15.2 15.7 15 15.5 14.9C15.3 14.8 15 14.7 14.6 14.7C13.9 14.7 13.4 14.9 13.1 15.3C12.8 15.7 12.6 16.3 12.6 17.1C12.6 17.6 12.7 18 12.9 18.4C13.1 18.7 13.3 19 13.6 19.2C13.9 19.4 14.2 19.5 14.6 19.5C15.2 19.5 15.7 19.3 16 18.9C16.4 18.5 16.5 17.9 16.5 17.1C16.7 16.8 16.6 16.4 16.5 16.1ZM15.3 18.4C15.2 18.7 15 18.8 14.7 18.8C14.4 18.8 14.2 18.7 14.1 18.4C14 18.1 13.9 17.7 13.9 17.2C13.9 16.8 13.9 16.5 14 16.3C14.1 16.1 14.1 15.9 14.2 15.8C14.3 15.7 14.5 15.6 14.7 15.6C15 15.6 15.2 15.7 15.3 16C15.4 16.2 15.5 16.6 15.5 17.2C15.5 17.7 15.4 18.1 15.3 18.4Z" fill="black"/>
							</svg></span>
							<!--end::Svg Icon-->
						</span>
					</span>
					<!--end::Icon-->
					<!--begin::Description-->
					<span class="d-flex flex-column">
						<span class="fw-bolder text-gray-800 text-hover-primary fs-5">İndirim</span>
					</span>
					<!--end:Description-->
				</span>
				<!--end:Label-->
				<!--begin::Option-->
				<label class="text-success w-100 p-4">
					<span class="fw-bolder fs-3">${discountPrice.toFixed(2)} ₺</span>
				</label>
				<!--end::Option-->
			</div>
			<!-- End:Col -->
		`;
		// let hiddenInput = document.createElement("input");
		// hiddenInput.name="isDiscount";
		// hiddenInput.value=true;
		araToplam.insertAdjacentElement('afterend',label_);
		// araToplam.insertAdjacentElement('afterend',hiddenInput);
		Swal.fire({
			text: "İndirim Uygulandı",
			icon: "success",
			showCancelButton: !1,
			buttonsStyling: !0,
			confirmButtonText: "Tamam",
			customClass: {
				confirmButton: "btn btn-success",
			}
		});
	});
    request.fail(function (jqXHR, textStatus, errorThrown){
        Swal.fire({
			text: "Geçersiz Kod",
			icon: "warning",
			showCancelButton: !0,
			showConfirmButton: !1,
			buttonsStyling: !0,
			cancelButtonText: "Tamam",
			customClass: {
				cancelButton: "btn btn-danger",
			}
		});
    });
})