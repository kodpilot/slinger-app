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
                (n = FormValidation.formValidation(o, {
                    fields: {
                        color_1: {
                            validators: {
                                notEmpty: { message: "Renk Zorunludur" },
                            },
                        },
                        color_2: {
                            validators: {
                                notEmpty: { message: "Renk Zorunludur" },
                            },
                        },
                        color_3: {
                            validators: {
                                notEmpty: { message: "Renk Zorunludur" },
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
                                                        text: "İşlem Başarılı Kaydediliyor...",
                                                        icon: "success",
                                                        buttonsStyling:
                                                            !1,
                                                        confirmButtonText:
                                                            "Tamam",
                                                        customClass: {
                                                            confirmButton:
                                                                "btn btn-primary",
                                                        },
                                                    }).then(function (e) {
                                                        const colorForm = document.querySelector('.saveColors');
                                                        const formInputs = colorForm.querySelectorAll("input[type=text]");
                                                        let data = [];
                                                        for (let i = 0; i < formInputs.length; i++) {
                                                            const input = formInputs[i];
                                                            data[input.dataset.selector] = input.value;
                                                        }
                                                        console.log(data);
                                                        var req;
                                                        $.ajaxSetup({
                                                            headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            }
                                                        });
                                                        if (req) {
                                                            req.abort();
                                                        }
                                                        req = $.ajax({
                                                        url: "/admin/tema/renk-guncelle",
                                                        type: "post",
                                                        data: $('#kt_modal_new_address_form').serialize()
                                                    });
                                                req.done(function (response, textStatus, jqXHR){
                                                    console.log(response);
                                                    Swal.fire({
                                                        text: "Kaydedildi",
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
                                                });
                                                req.fail(function (jqXHR, textStatus, errorThrown){
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
                                                });
                                                        
                                                    });
                                            }, 2e3))
                                            :  Swal.fire({
                                                html: "Formu yeniden gözden geçiriniz",
                                                icon: "error",
                                                buttonsStyling: !1,
                                                confirmButtonText:
                                                    "Tamam",
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

const inputs = document.querySelectorAll('.selectColor');
for (let i = 0; i < inputs.length; i++) {
    const input = inputs[i];
    input.addEventListener('change',()=>{
        document.querySelector("[data-selector='"+input.dataset.id+"']").value=input.value;
    })
}

const ColorCheckers = document.querySelectorAll('.ColorChecker');
for (let i = 0; i < ColorCheckers.length; i++) {
    const ColorChecker = ColorCheckers[i];
    ColorChecker.addEventListener('change',()=>{
        document.querySelector("[data-id='"+ColorChecker.dataset.selector+"']").value=ColorChecker.value;
    })
}

window.addEventListener('load',()=>{
    const ColorCheckers = document.querySelectorAll('.ColorChecker');
    for (let i = 0; i < ColorCheckers.length; i++) {
        const ColorChecker = ColorCheckers[i];
        document.querySelector("[data-id='"+ColorChecker.dataset.selector+"']").value=ColorChecker.value;
    }
})

const resetButton = document.getElementById('resetTheme');
resetButton.addEventListener('click',()=>{
    resetButton.setAttribute(
        "data-kt-indicator",
        "on"
    )
    resetButton.disabled = 1;

    setTimeout(function () {
        resetButton.removeAttribute(
            "data-kt-indicator"
        );
        resetButton.disabled = !1;
        Swal.fire({
            text: "Tema Renkleri Sıfırlanıyor",
            icon: "success",
            buttonsStyling:
                !1,
            showCancelButton:1,
            confirmButtonText:
                "Tamam",
            cancelButtonText:
                "İptal",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light",
            },
        }).then(function (e) {
            if(e.dismiss=="cancel"){
                return;
            }
            var req_theme;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (req_theme) {
                req_theme.abort();
            }
            let data = [{
                status:1
            }]
            req_theme = $.ajax({
            url: "/admin/tema/renk-reset",
            type: "post",
            data: data
        });
        req_theme.done(function (response, textStatus, jqXHR){
            document.querySelector("[data-selector='color_1']").value = response['data'][0];
            document.querySelector("[data-selector='color_2']").value = response['data'][1];
            document.querySelector("[data-selector='color_3']").value = response['data'][2];
            document.querySelector("[data-id='color_1']").value = response['data'][0];
            document.querySelector("[data-id='color_2']").value = response['data'][1];
            document.querySelector("[data-id='color_3']").value = response['data'][2];
        Swal.fire({
            text: "Kaydedildi",
            icon: "success",
            buttonsStyling: !1,
            confirmButtonText:
            "Tamam",
            customClass: {
            confirmButton:
            "btn btn-primary",
        },
        }).then(function (t) {
        });
    });
    req_theme.fail(function (jqXHR, textStatus, errorThrown){
        Swal.fire({
            text: "Tema renkleri sıfırlanmadı!",
            icon: "error",
            buttonsStyling: !1,
            confirmButtonText: "Tamam",
            customClass: {
                confirmButton:
                "btn btn-primary",
                        },
                });
    });
            
        });
    }, 2e3);
})