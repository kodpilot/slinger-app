"use strict";
var KTModalNewCard = (function () {
var t, e, n, r, o, i;
return {
    init: function () {
        (i = document.querySelector("#kt_modal_new_card")) &&
            ((o = new bootstrap.Modal(i)),
            (r = document.querySelector("#kt_modal_new_card_form")),
            (t = document.getElementById("kt_modal_new_card_submit")),
            (e = document.getElementById("kt_modal_new_card_cancel")),
            $(r.querySelector('[name="card_expiry_month"]')).on(
                "change",
                function () {
                    n.revalidateField("card_expiry_month");
                }
            ),
            $(r.querySelector('[name="card_expiry_year"]')).on(
                "change",
                function () {
                    n.revalidateField("card_expiry_year");
                }
            ),
            (n = FormValidation.formValidation(r, {
                fields: {
                    card_number: {
                        validators: {
                            notEmpty: {
                                message: "Kart Numarası Boş Bırakılamaz",
                            },
                            creditCard: {
                                message: "Kart Numarası Doğru Değil",
                            },
                        },
                    },
                    card_expiry_month: {
                        validators: {
                            notEmpty: { message: "Ay Zorunludur" },
                        },
                    },
                    card_expiry_year: {
                        validators: {
                            notEmpty: { message: "Yıl Zorunludur" },
                        },
                    },
                    card_cvv: {
                        validators: {
                            notEmpty: { message: "CVV Zorunludur" },
                            digits: {
                                message: "CVV yalnızca sayı olabilir",
                            },
                            stringLength: {
                                min: 3,
                                max: 4,
                                message:
                                    "CVV 3 veya 4 haneli olabilir",
                            },
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
                            console.log("validated!"),
                                "Valid" == e
                                    ? (t.setAttribute(
                                            "data-kt-indicator",
                                            "on"
                                        ),
                                        (t.disabled = !0),
                                        setTimeout(function () {
                                            t.removeAttribute(
                                                "data-kt-indicator"
                                            ),
                                                (t.disabled = !1),
                                                Swal.fire({
                                                    text: "Kart Onaylandı",
                                                    icon: "success",
                                                    buttonsStyling: !1,
                                                    confirmButtonText:
                                                        "Tamam",
                                                    customClass: {
                                                        confirmButton:
                                                            "btn btn-primary",
                                                    },
                                                }).then(function (t) {
                                                    t.isConfirmed && o.hide();
                                                    let data = new FormData(r);
                                                    for (const [name,value] of data) {
                                                        let element = document.createElement('input');
                                                        element.name=name;
                                                        element.value=value;
                                                        element.type="hidden";
                                                        document.querySelector('[name="payment"]').insertAdjacentElement('afterend',element);
                                                    }
                                                });
                                        }, 2e3))
                                    : Swal.fire({
                                            text: "Görünüşe Göre Bazı Hatalar Var. Bilgileri Gözden Geçiriniz",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Tamam",
                                            customClass: {
                                                confirmButton:
                                                    "btn btn-primary",
                                            },
                                        });
                        });
            }),
            e.addEventListener("click", function (t) {
                t.preventDefault(),
                    Swal.fire({
                        text: "İptal Etmek İstediğinize Emin misiniz",
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
                            ? (r.reset(), o.hide())
                            : "cancel" === t.dismiss &&
                                Swal.fire({
                                    text: "Form İptal Edildi",
                                    icon: "error",
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
KTModalNewCard.init();
});


var specials = /^[0-9]*$/;
document.querySelector('[name="card_number"').addEventListener('keydown',(e)=>{
    let str = e.target.value.replaceAll(' ','');
    if(str.length<16 && e.keyCode != 32 && specials.test(e.key) ){
        if ((str.length)%4==0 && str.length!=0 && e.keyCode != 8 ) {
            e.target.value+=" ";
        }
    }
    else{
        if(e.keyCode != 8 )e.preventDefault();
    }
})