    "use strict";
    var KTCreateAccount = (function () {
    var e,
        t,
        i,
        o,
        prev_,
        s,
        r,
        a = [];
    return {
        init: function () {
            (e = document.querySelector("#kt_modal_create_account")) &&
                new bootstrap.Modal(e),
                (t = document.querySelector("#kt_create_account_stepper")),
                (i = t.querySelector("#kt_create_account_form")),
                (o = t.querySelector('[data-kt-stepper-action="submit"]')),
                (s = t.querySelector('[data-kt-stepper-action="next"]')),
                (prev_ =t.querySelector('[data-kt-stepper-action="previous"]')),
                (r = new KTStepper(t)).on("kt.stepper.changed", function (e) {
                    4 === r.getCurrentStepIndex()
                        ? (o.classList.remove("d-none"),
                            o.classList.add("d-inline-block"),
                            s.classList.add("d-none"))
                        : 5 === r.getCurrentStepIndex()
                        ? (o.classList.add("d-none"), s.classList.add("d-none"),prev_.classList.add("d-none"))
                        : (o.classList.remove("d-inline-block"),
                            o.classList.remove("d-none"),
                            s.classList.remove("d-none"));
                }),
                r.on("kt.stepper.next", function (e) {
                    console.log("stepper.next");
                    var t = a[e.getCurrentStepIndex() - 1];
                    t
                        ? t.validate().then(function (t) {
                                console.log("validated!"),
                                    "Valid" == t
                                        ? (e.goNext(), KTUtil.scrollTop())
                                        : Swal.fire({
                                            text: "Görünüşe Göre Bazı Hatalar Var Formu Gözden Geçiriniz",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Tamam",
                                            customClass: {
                                                confirmButton: "btn btn-light",
                                            },
                                        }).then(function () {
                                            KTUtil.scrollTop();
                                        });
                            })
                        : (e.goNext(), KTUtil.scrollTop());
                }),
                r.on("kt.stepper.previous", function (e) {
                    console.log("stepper.previous"),
                        e.goPrevious(),
                        KTUtil.scrollTop();
                }),
                a.push(
                    FormValidation.formValidation(i, {
                        fields: {
                            addressType: {
                                validators: {
                                    notEmpty: {
                                        message: "Adres Seçimi Zorunludur",
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
                    })
                ),
                a.push(
                    FormValidation.formValidation(i, {
                        fields: {
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: ".fv-row",
                                eleInvalidClass: "",
                                eleValidClass: "",
                            }),
                        },
                    })
                ),
                a.push(
                    FormValidation.formValidation(i, {
                        fields: {
                            cargo: {
                                validators: {
                                    notEmpty: {
                                        message: "Kargo Seçimi Zorunludur",
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
                    })
                ),
                a.push(
                    FormValidation.formValidation(i, {
                        fields: {
                            payment: {
                                validators: {
                                    notEmpty: {
                                        message: "Ödeme Yöntemi Zorunludur",
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
                    })
                ),
                o.addEventListener("click", function (e) {
                    // // // // let elem_ = document.createElement('input');
                    // // // // elem_.type = "hidden";
                    // // // // elem_.name="_token";
                    // // // // elem_.value =$('meta[name="csrf-token"]').attr('content');
                    // // // // document.querySelector('.sendPaymentForm').insertAdjacentElement('afterbegin',elem_);
                    // // // // document.querySelector('.sendPaymentForm').submit();

                    a[3].validate().then(function (t) {
                    console.log("validated!"),
                        "Valid" == t
                            ? 
                            (e.preventDefault(),
                                (o.disabled = !0),
                                o.setAttribute("data-kt-indicator", "on"),
                                setTimeout(function () {
                                    o.removeAttribute("data-kt-indicator"),
                                        (o.disabled = !1);
                                        r.goNext();
                                        let counter = 2
                                        let form = document.querySelector('.sendPaymentForm');
                                        var data = new FormData(form);
                                        let data_ = [];
                                        for (const [name,value] of data) {
                                            data_[name]=value;
                                            console.log(name,value)
                                        }
                                        if(data_["payment"]=="1" || data_["payment"]=="2"){
                                            document.querySelector('.endText').innerText="Ürünler Sayfasına";
                                            document.querySelector('.endText_').innerText="Ürünler Sayfasına";
                                        } 
                                        let interval = setInterval(() => {
                                            if(counter==0){
                                                sendPaymentgetUrl();
                                                clearInterval(interval);
                                            }
                                            document.querySelector('.second').innerText = counter;
                                            counter--;
                                        }, 1000);
                                }, 100)
                                )
                            : Swal.fire({
                                    text: "Görünüşe Göre Bazı Hatalar Var Formu Gözden Geçiriniz",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Tamam",
                                    customClass: {
                                        confirmButton: "btn btn-light",
                                    },
                                }).then(function () {
                                    KTUtil.scrollTop();
                                });
                });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    console.log(KTCreateAccount);
    KTCreateAccount.init();
});


var payment_request;
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

function sendPaymentgetUrl(){
    if (payment_request) {
        payment_request.abort();
    }       
    var form =  $(".sendPaymentForm");

    payment_request = $.ajax({
        url: "/odeme-provider",
        type: "post",
        data: form.serialize()
    });
    payment_request.done(function (response, textStatus, jqXHR){
        // console.log(response);
        window.location.href=response.url;
		// Swal.fire({
		// 	text: "Yönlendiriliyorsunuz!",
		// 	icon: "success",
		// 	showCancelButton: !1,
		// 	buttonsStyling: !0,
		// 	confirmButtonText: "Tamam",
		// 	customClass: {
		// 		confirmButton: "btn btn-success",
		// 	}
		// })
        // .then( () =>{
            
        // });
	});
    payment_request.fail(function (jqXHR, textStatus, errorThrown){
        console.log(errorThrown);
        Swal.fire({
			text: "Bir Şeyler Ters Gitti",
			icon: "warning",
			showCancelButton: !0,
			showConfirmButton: !1,
			buttonsStyling: !0,
			cancelButtonText: "Tamam",
			customClass: {
				cancelButton: "btn btn-danger",
			}
		})
        .then( () =>{
            alert('yönlenemedin');
        });
    });
}

function checkTc(e){
    var check =/^[0-9]*$/;
    if(e.keyCode==8){
        return;
    }
    if(!check.test(e.key)){
        e.preventDefault();
    }
}