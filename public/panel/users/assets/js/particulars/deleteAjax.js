let deleteButtons = document.querySelectorAll(".deleteItems");
for (let i = 0; i < deleteButtons.length; i++) {
    const delete_ = deleteButtons[i];
    delete_.addEventListener(
        "click",
        () => {
            let option_id = delete_.dataset.option_id;

            req = $.ajax({
                url: "/deleteVariaion/" + option_id,
                type: "get",
            });

            req.done(function (response, textStatus, jqXHR) {
                if (response["status"] == 1) {
                    console.log("sildi");
                } else {
                    console.log("silmedi");
                }
            });
        },
        false
    );
}
