var req;

function getSelected(select){
    if (req) {
        req.abort();
    }
    //console.log(select);
    var dataTable = document.getElementById(select+"2");
    
    const serializedData = {
        "categoryID2":document.getElementById(select).value
    }
    

    req = $.ajax({
        url: "/getsubCategory",
        type: "get",
        data: serializedData
    });

    req.done(function (response, textStatus, jqXHR){
        
        dataTable.innerHTML="";
        var pointer = document.createElement("option");
        var text = document.createTextNode("Tümü");
        pointer.value = "";
        pointer.appendChild(text);
        dataTable.appendChild(pointer);

        for(var i=0;i<response.length;i++){
            var node = document.createElement("option");
            var text = document.createTextNode(response[i].name);
            node.value = response[i].id;
            node.appendChild(text);
            dataTable.appendChild(node);
        }

    });
    req.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );

    });


    req.always(function () {

    });

};
