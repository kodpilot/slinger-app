$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$( function() {
$( "#productsTable" ).sortable({
items: "tr",
opacity: 0.5,
cursor:'move',
update: function(){
    var value = $( this ).sortable("serialize");
    $.ajax({
        url: "/panel/katalog/urun-sirala",
        data: { value:value},
        type: "POST",
        success: function(response) {

            console.log(response);

        }
    })
}
});

} );


$( function() {
    $( "#bannersTable" ).sortable({
    items: "tr",
    opacity: 0.5,
    cursor:'move',
    update: function(){
        var value = $( this ).sortable("serialize");
        $.ajax({
            url: "/banner-sirala",
            data: { value:value},
            type: "POST",
            success: function(response) {
    
                console.log(response);
    
            }
        })
    }
});

} );


$( function() {
    $( "#slidersTable" ).sortable({
    items: "tr",
    opacity: 0.5,
    cursor:'move',
    update: function(){
        var value = $( this ).sortable("serialize");
        $.ajax({
            url: "/slider-sirala",
            data: { value:value},
            type: "POST",
            success: function(response) {
    
                console.log(response);
    
            }
        })
    }
});

} );
