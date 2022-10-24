"use strict";

var KTAppEcommerceReportSales = (function () {
    var t, e;
    return {
        init: function () {
            (t = document.querySelector("#kt_ecommerce_report_sales_table")) &&
                (t.querySelectorAll("tbody tr").forEach((t) => {
                    const e = t.querySelectorAll("td"),
                        r = moment(e[0].innerHTML, "MMM DD, YYYY").format();
                    e[0].setAttribute("data-order", r);
                }),
                (e = $(t).DataTable({ info: !1, order: [], pageLength: 10 })),
                (() => {
                    var t = moment().subtract(29, "days"),
                        e = moment(),
                        r = $("#kt_ecommerce_report_sales_daterangepicker");
                    function o(t, e) {
                        r.html(
                            t.format("MMMM D, YYYY") +
                                " - " +
                                e.format("MMMM D, YYYY")
                        );
                    }
                    r.daterangepicker(
                        {
                            startDate: t,
                            endDate: e,
                            ranges: {
                                Today: [moment(), moment()],
                                Yesterday: [
                                    moment().subtract(1, "days"),
                                    moment().subtract(1, "days"),
                                ],
                                "Last 7 Days": [
                                    moment().subtract(6, "days"),
                                    moment(),
                                ],
                                "Last 30 Days": [
                                    moment().subtract(29, "days"),
                                    moment(),
                                ],
                                "This Month": [
                                    moment().startOf("month"),
                                    moment().endOf("month"),
                                ],
                                "Last Month": [
                                    moment()
                                        .subtract(1, "month")
                                        .startOf("month"),
                                    moment()
                                        .subtract(1, "month")
                                        .endOf("month"),
                                ],
                            },
                        },
                        o
                    ),
                        o(t, e);
                })(),
                (() => {
                    const e = "Sales Report";
                    new $.fn.dataTable.Buttons(t, {
                        buttons: [
                            { extend: "copyHtml5", title: e },
                            { extend: "excelHtml5", title: e },
                            { extend: "csvHtml5", title: e },
                            { extend: "pdfHtml5", title: e },
                        ],
                    })
                        .container()
                        .appendTo($("#kt_ecommerce_report_sales_export")),
                        document
                            .querySelectorAll(
                                "#kt_ecommerce_report_sales_export_menu [data-kt-ecommerce-export]"
                            )
                            .forEach((t) => {
                                t.addEventListener("click", (t) => {
                                    t.preventDefault();
                                    const e = t.target.getAttribute(
                                        "data-kt-ecommerce-export"
                                    );
                                    document
                                        .querySelector(
                                            ".dt-buttons .buttons-" + e
                                        )
                                        .click();
                                });
                            });
                })(),
                document
                    .querySelector('[data-kt-ecommerce-order-filter="search"]')
                    .addEventListener("keyup", function (t) {
                        e.search(t.target.value).draw();
                    }));
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceReportSales.init();
});

