var start = moment().subtract(29, "days");
var end = moment().subtract(1, "days");

$("#kp_daterangepicker").daterangepicker({
    buttonClasses: " btn",
    applyClass: "btn-primary",
    cancelClass: "btn-secondary",
    startDate: start,
    endDate: end,
});

function cb(start, end) {
    $("#AnalyticsDatePicker").html(
        start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
    );
}

$("#AnalyticsDatePicker").daterangepicker(
    {
        placeholder: "Özel Bir Zaman Aralığı Seçiniz",
        startDate: start,
        endDate: end,
        ranges: {
            Dün: [moment().subtract(1, "days"), moment()],
            "Son 1 Hafta": [moment().subtract(6, "days"), moment()],
            "Son 30 gün": [moment().subtract(29, "days"), moment()],
            "Son 6 Ay": [moment().subtract(6, "month"), moment()],
            "Son 1 Yıl": [moment().subtract(1, "year"), moment()],
        },
    },
    cb
);

cb(start, end);
