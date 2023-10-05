$(document).ready(function() {

    $("#btnAddVariant").click(function () {
        let $lastRow = $("#variantsTableBody").find('tr:last');
        $lastRow.after($lastRow.clone());
    });

    Dropzone.options.addProductForm = {
        autoProcessQueue: false,
        uploadMultiple: false,
        parallelUploads: 1,
        maxFiles: 1,

        init: function () {
            var myDropzone = this;

            this.element.querySelector("button[type=submit]").addEventListener("click", function (e) {
                e.preventDefault();
                e.stopPropagation();
                myDropzone._processQueue();
            })
        }
    }
});
