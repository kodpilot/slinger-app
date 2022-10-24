// begin :: CARGO FUNCTIONS
var width               =  document.getElementById('width');
var height              =  document.getElementById('height');
var length              =  document.getElementById('length');
var desi                =  document.getElementById('desi');

function desiFunction () {
    $result =  width.value * height.value * length.value / 3000;

    return $result.toFixed(3);
}

width.addEventListener('keydown', function(){
    desi.value = desiFunction ();
});

height.addEventListener('keydown', function(){
    desi.value = desiFunction ();
});

length.addEventListener('keydown', function(){
    desi.value = desiFunction ();
});

// end :: CARGO FUNCTIONS

// begin :: DISCOUNT FUNCTIONS
var percentageLabel         =  document.getElementById('kt_ecommerce_add_product_discount_label');
var percentageValue         =  document.getElementById('percentageValue');
var noPercentage            =  document.getElementById('no_percentage');
var yesPercentage           =  document.getElementById('yes_percentage');
var discountPercentage      =  document.getElementById('discount_percentage');

percentageLabel.addEventListener('DOMSubtreeModified', function(){
    percentageValue.value = percentageLabel.innerText;
});
yesPercentage.addEventListener('click', function(){
    percentageValue.value = percentageLabel.innerText;
});
noPercentage.addEventListener('click', function(){
    percentageValue.value = '0';
});

discountPercentage.addEventListener('click', function(){
    percentageValue.value = '0';
});
// end :: DISCOUNT FUNCTIONS



//begin:: date functions
var start = moment().subtract(29, "days");
var end = moment();

function cb(start, end) {
    $("#kt_daterangepicker_4").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
}

$("#kt_daterangepicker_4").daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
    "Today": [moment(), moment()],
    "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
    "Last 7 Days": [moment().subtract(6, "days"), moment()],
    "Last 30 Days": [moment().subtract(29, "days"), moment()],
    "This Month": [moment().startOf("month"), moment().endOf("month")],
    "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
    }
}, cb);

cb(start, end);

//end: date functions





