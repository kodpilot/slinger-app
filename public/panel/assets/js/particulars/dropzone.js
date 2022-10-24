
var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
    url: "/photo-add/"+document.querySelector('#product_id').value, // Set the url for your upload script location
    paramName: "file", // The name that will be used to transfer the file
    maxFiles: 10,
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    accept: function(file, done) {
        if (file.name == "wow.jpg") {
            done("Naha, you don't.");
        } else {
            done();
        }
    }

});


