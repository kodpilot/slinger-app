<!--begin::Button-->
<button type="button" class="btn btn-primary" id="errorToaster">Hata</button>
<!--end::Button-->

<!--begin::Toast-->
<div class="position-fixed top-0 end-0 p-3 z-index-3">
    <div id="kt_docs_toast_toggle" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <span class="svg-icon svg-icon-2 svg-icon-primary me-3">...</span>
            <strong class="me-auto">Hata</strong>
            <small>Şimdi</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-warning">
            Silinemedi!
        </div>
    </div>
</div>
<!--end::Toast-->