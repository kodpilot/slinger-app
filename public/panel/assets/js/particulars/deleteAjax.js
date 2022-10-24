$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
let deleteButtons = document.querySelectorAll(".deleteItems");
let request , request1;
for (let i = 0; i < deleteButtons.length; i++) {
    const delete_ = deleteButtons[i];
    delete_.addEventListener(
        "click",
        () => {
            let option_id = delete_.dataset.option_id;

            request = $.ajax({
                url: "/panel/katalog/urunler/deleteVariaion/" + option_id,
                type: "post",
            });

            request.done(function (response, textStatus, jqXHR) {
                if (response["status"] == 1) {
                    console.log("sildi");
                    const template = `
                        <!--begin::Alert-->
                        <div class="alert alert-dismissible bg-${'success'} d-flex flex-column flex-sm-row p-5 mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                                <!--begin::Title-->
                                <h4 class="mb-2 light text-white">${'Başarılı'}</h4>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <span>Silindi</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Close-->
                            <button data-process="close" type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                                <span class="svg-icon svg-icon-2x svg-icon-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="black"/>
                                        <path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="black"/>
                                    </svg>
                                </span>
                            </button>
                            <!--end::Close-->
                        </div>
                        <!--end::Alert-->`;
                        let div = document.createElement('div');
                        div.innerHTML = template;
                        const alertBox = document.querySelector('.alertBox');
                        alertBox.insertAdjacentElement('beforeend',div);
                        setTimeout(() => {
                        let closeButton = div.querySelector('[data-process="close"]');
                        if(closeButton){closeButton.click()}
                        }, 1500);
                } else {
                    console.log("silmedi");
                    const template = `
                <!--begin::Alert-->
                <div class="alert alert-dismissible bg-${'danger'} d-flex flex-column flex-sm-row p-5 mb-10">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                        <!--begin::Title-->
                        <h4 class="mb-2 light text-white">${'Başarılı'}</h4>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <span>${'Bir Hata Oluştu!'}</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Close-->
                    <button data-process="close" type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                        <span class="svg-icon svg-icon-2x svg-icon-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="black"/>
                                <path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="black"/>
                            </svg>
                        </span>
                    </button>
                    <!--end::Close-->
                </div>
                <!--end::Alert-->`;
                let div = document.createElement('div');
                div.innerHTML = template;
                const alertBox = document.querySelector('.alertBox');
                alertBox.insertAdjacentElement('beforeend',div);
                setTimeout(() => {
                let closeButton = div.querySelector('[data-process="close"]');
                if(closeButton){closeButton.click()}
                }, 1500);
                }
            });

            request.fail((errorThrown)=>{
                const template = `
                <!--begin::Alert-->
                <div class="alert alert-dismissible bg-${'danger'} d-flex flex-column flex-sm-row p-5 mb-10">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                        <!--begin::Title-->
                        <h4 class="mb-2 light text-white">${'Başarılı'}</h4>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <span>${'Bir Hata Oluştu!'}</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Close-->
                    <button data-process="close" type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                        <span class="svg-icon svg-icon-2x svg-icon-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="black"/>
                                <path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="black"/>
                            </svg>
                        </span>
                    </button>
                    <!--end::Close-->
                </div>
                <!--end::Alert-->`;
                let div = document.createElement('div');
                div.innerHTML = template;
                const alertBox = document.querySelector('.alertBox');
                alertBox.insertAdjacentElement('beforeend',div);
                setTimeout(() => {
                let closeButton = div.querySelector('[data-process="close"]');
                if(closeButton){closeButton.click()}
                }, 1500);
            })
        },
        false
    );
}




let deleteButtons_tedarik = document.querySelectorAll(".deleteButtons_tedarik");
for (let i = 0; i < deleteButtons_tedarik.length; i++) {
    const delete_ = deleteButtons_tedarik[i];
    delete_.addEventListener(
        "click",
        () => {
            let option_id = delete_.dataset.option_id;

            request1 = $.ajax({
                url: "/panel/katalog/urunler/deleteTedarik/" + option_id,
                type: "post",
            });

            request1.done(function (response, textStatus, jqXHR) {
                if (response["status"] == 1) {
                    console.log("sildi");
                    const template = `
                        <!--begin::Alert-->
                        <div class="alert alert-dismissible bg-${'success'} d-flex flex-column flex-sm-row p-5 mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                                <!--begin::Title-->
                                <h4 class="mb-2 light text-white">${'Başarılı'}</h4>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <span>Silindi</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Close-->
                            <button data-process="close" type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                                <span class="svg-icon svg-icon-2x svg-icon-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="black"/>
                                        <path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="black"/>
                                    </svg>
                                </span>
                            </button>
                            <!--end::Close-->
                        </div>
                        <!--end::Alert-->`;
                        let div = document.createElement('div');
                        div.innerHTML = template;
                        const alertBox = document.querySelector('.alertBox');
                        alertBox.insertAdjacentElement('beforeend',div);
                        setTimeout(() => {
                        let closeButton = div.querySelector('[data-process="close"]');
                        if(closeButton){closeButton.click()}
                        }, 1500);
                } else {
                    console.log("silmedi");
                    const template = `
                    <!--begin::Alert-->
                    <div class="alert alert-dismissible bg-${'danger'} d-flex flex-column flex-sm-row p-5 mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                            <!--begin::Title-->
                            <h4 class="mb-2 light text-white">${'Başarılı'}</h4>
                            <!--end::Title-->
                            <!--begin::Content-->
                            <span>${'Bir Hata Oluştu!'}</span>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Close-->
                        <button data-process="close" type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                            <span class="svg-icon svg-icon-2x svg-icon-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="black"/>
                                    <path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="black"/>
                                </svg>
                            </span>
                        </button>
                        <!--end::Close-->
                    </div>
                    <!--end::Alert-->`;
                    let div = document.createElement('div');
                    div.innerHTML = template;
                    const alertBox = document.querySelector('.alertBox');
                    alertBox.insertAdjacentElement('beforeend',div);
                    setTimeout(() => {
                    let closeButton = div.querySelector('[data-process="close"]');
                    if(closeButton){closeButton.click()}
                    }, 1500);
                }
            });
            request1.fail((errorThrown)=>{
                const template = `
                <!--begin::Alert-->
                <div class="alert alert-dismissible bg-${'danger'} d-flex flex-column flex-sm-row p-5 mb-10">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                        <!--begin::Title-->
                        <h4 class="mb-2 light text-white">${'Başarılı'}</h4>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <span>${'Bir Hata Oluştu!'}</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Close-->
                    <button data-process="close" type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                        <span class="svg-icon svg-icon-2x svg-icon-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="black"/>
                                <path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="black"/>
                            </svg>
                        </span>
                    </button>
                    <!--end::Close-->
                </div>
                <!--end::Alert-->`;
                let div = document.createElement('div');
                div.innerHTML = template;
                const alertBox = document.querySelector('.alertBox');
                alertBox.insertAdjacentElement('beforeend',div);
                setTimeout(() => {
                let closeButton = div.querySelector('[data-process="close"]');
                if(closeButton){closeButton.click()}
                }, 1500);
            })
        },
        false
    );
}
