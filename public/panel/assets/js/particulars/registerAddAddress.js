"use strict";
var KTModalNewAddress = (function () {
    var t, e, n, o, i, r;
    return {
        init: function () {
            (r = document.querySelector("#kt_modal_new_address")) &&
                ((i = new bootstrap.Modal(r)),
                (o = document.querySelector("#kt_modal_new_address_form")),
                (t = document.getElementById("kt_modal_new_address_submit")),
                (e = document.getElementById("kt_modal_new_address_cancel")),
                $(o.querySelector('[name="country"]'))
                    .select2()
                    .on("change", function () {
                        n.revalidateField("country");
                    }),
                (n = FormValidation.formValidation(o, {
                    fields: {
                        "name": {
                            validators: {
                                notEmpty: { message: "İsim Zorunludur" },
                            },
                        },
                        "surname": {
                            validators: {
                                notEmpty: { message: "Soyisim Zorunludur" },
                            },
                        },
                        adressName: {
                            validators: {
                                notEmpty: { message: "Adres Adı Zorunludur" },
                            },
                        },
                        country: {
                            validators: {
                                notEmpty: { message: "Ülke Zorunludur" },
                            },
                        },
                        address: {
                            validators: {
                                notEmpty: { message: "Adres Zorunludur" },
                            },
                        },
                        city: {
                            validators: {
                                notEmpty: { message: "Şehir Zorunludur" },
                            },
                        },
                        state: {
                            validators: {
                                notEmpty: { message: "İlçe Zorunludur" },
                            },
                        },
                        postcode: {
                            validators: {
                                notEmpty: { message: "Posta Kodu Zorunludur" },
                            },
                        },
                        tc: {
                            validators: {
                                notEmpty: { message: "Kimlik Zorunludur" },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                })),
                t.addEventListener("click", function (e) {
                    e.preventDefault(),
                        n &&
                            n.validate().then(function (e) {
                                
                                console.log("ok");
                                var req;
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                if (req) {
                                    req.abort();
                                }
                                //console.log(select);
                                
                                let data = {
                                    'name':n.form.elements["name"].value,
                                    'surname':n.form.elements["surname"].value,
                                    'addressName':n.form.elements["adressName"].value,
                                    'country':n.form.elements["country"].value,
                                    'city':n.form.elements["city"].value,
                                    'address':n.form.elements["address"].value,
                                    'town':n.form.elements["state"].value,
                                    'zipCode':n.form.elements["postcode"].value,
                                    'tc':n.form.elements['tc'].value,
                                    
                                }
                                if ("Valid" == e) {
                                    req = $.ajax({
                                        url: "/adres-ekle-ajax",
                                        type: "post",
                                        data: data
                                    });
                                    t.setAttribute(
                                        "data-kt-indicator",
                                        "on"
                                    );
                                    t.disabled = !0;
                                }

                                req.done(function (response, textStatus, jqXHR){
                                    let template = `
                                        <!--begin::Option-->
                                        <input type="radio" class="btn-check" name="addressType" checked value="${response.id}" id="adres${response.id}" />
                                        <label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="adres${response.id}">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                            <span class="svg-icon svg-icon-3x me-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="black" />
                                                    <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--begin::Info-->
                                            <span class="d-block fw-bold text-start">
                                                <span class="text-dark fw-bolder d-block fs-4 mb-2">${response.addressName}</span>
                                                <span class="text-muted fw-bold fs-6">${response.address} ${response.town} ${response.city}/${response.country} ${response.zipCode}</span>
                                            </span>
                                            <!--end::Info-->
                                        </label>
                                        <!--end::Option-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>`;
                                        let dataTable = document.querySelector('#addressRow');
                                        let lastchild = dataTable.querySelectorAll(".col-lg-6");
                                        let divElement = document.createElement('div');
                                        divElement.classList.add('col-lg-6');
                                        divElement.innerHTML=template;
                                        dataTable.insertBefore(divElement, lastchild[lastchild.length-1]);
                                    t.removeAttribute(
                                        "data-kt-indicator"
                                    ),
                                    (t.disabled = !1),
                                    Swal.fire({
                                        text: "Adres Eklendi",
                                        icon: "success",
                                        buttonsStyling: !1,
                                        confirmButtonText:
                                        "Tamam",
                                        customClass: {
                                        confirmButton:
                                        "btn btn-primary",
                                    },
                                    }).then(function (t) {
                                        t.isConfirmed && i.hide();
                                    });
                                    console.log("success",response);
                                    document.location.reload(false);
                                });
                                req.fail(function (jqXHR, textStatus, errorThrown){
                                    t.removeAttribute(
                                        "data-kt-indicator"
                                    ),
                                        (t.disabled = !1),
                                    Swal.fire({
                                        text: "Formu yeniden gözden geçiriniz",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Tamam",
                                        customClass: {
                                            confirmButton:
                                            "btn btn-primary",
                                                    },
                                                });
                                    console.error(
                                        "The following error occurred: "+
                                        textStatus, errorThrown
                                    );
                                    console.log("error");;
                                });
                            
                                // /adres-ekle-ajax
                                // console.log("validated!"),
                                //     "Valid" == e
                                //         ? (t.setAttribute(
                                //               "data-kt-indicator",
                                //               "on"
                                //           ),
                                //           (t.disabled = !0),
                                //           setTimeout(function () {
                                //               t.removeAttribute(
                                //                   "data-kt-indicator"
                                //               ),
                                //                   (t.disabled = !1),
                                //                   Swal.fire({
                                //                       text: "Form has been successfully submitted!",
                                //                       icon: "success",
                                //                       buttonsStyling: !1,
                                //                       confirmButtonText:
                                //                           "Ok, got it!",
                                //                       customClass: {
                                //                           confirmButton:
                                //                               "btn btn-primary",
                                //                       },
                                //                   }).then(function (t) {
                                //                       t.isConfirmed && i.hide();
                                //                   });
                                //           }, 2e3))
                                //         : Swal.fire({
                                //               text: "Sorry, looks like there are some errors detected, please try again.",
                                //               icon: "error",
                                //               buttonsStyling: !1,
                                //               confirmButtonText: "Ok, got it!",
                                //               customClass: {
                                //                   confirmButton:
                                //                       "btn btn-primary",
                                //               },
                                //           });
                            });
                }),
                e.addEventListener("click", function (t) {
                    t.preventDefault(),
                        Swal.fire({
                            text: "İptal Etmek istediğinize emin misiniz?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Evet",
                            cancelButtonText: "Hayır",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light",
                            },
                        }).then(function (t) {
                            t.value
                                ? (o.reset(), i.hide())
                                : "cancel" === t.dismiss &&
                                Swal.fire({
                                    text: "İptal Edilmedi",
                                    icon: "warning",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Tamam",
                                    customClass: {
                                    confirmButton: "btn btn-primary",
                                    },
                                });
                        });
                }));
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTModalNewAddress.init();
});

