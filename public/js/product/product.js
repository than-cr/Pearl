
$(document).ready(function() {


    $("#btnAddProduct").click(function () {
        $("#addProductModalLabel").text("Add Product");

        $("#productId").val(0);
        $("#productTitle").val('');
        tinymce.activeEditor.setContent('');
        $("#productPrice").val('');

        let rows = $("#variantsTableBody tr");
        while (rows.length > 1) {
            rows.last().remove();
            rows = $("#variantsTableBody tr");
        }

        SetDropzone();

        $("#addProductModal").modal('show');
    });

    $("#btnAddVariant").click(function () {
        let $lastRow = $("#variantsTableBody").find('tr:last');
        $lastRow.after($lastRow.clone());
    });

    $("#btnSave").click(function (e) {
        e.preventDefault();
        e.stopPropagation();

        let data = {
            'id' : $("#productId").val(),
            'title': $('#productTitle').val(),
            'description': tinymce.activeEditor.getContent({format : 'raw'}),
            'price': $('#productPrice').val(),
            'image': $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles(),
            'variants': []
        };

        $('tr.variants').each(function () {
            let variantToAdd = {
                'size': $(this).find("[name=productSize]").val(),
                'color': $(this).find("[name=productColor]").val(),
                'stock': $(this).find("[name=productStock]").val()
            };

            data.variants.push(variantToAdd);
        });

        const token =  $('input[name="_token"]').val();
        let JSONObjet = JSON.stringify(data);

        postRequest(token,'/products/save', JSONObjet, function (response) {
            if (response.status === undefined) {
                printMessage('success', response, function () {
                    location.href = '/products';
                });
            } else {
                printMessage('error', response.responseJSON);
            }
        });
    });
});

let deleteProduct = function (itemId) {
    deletePrint(function () {
        const token =  $('input[name="_token"]').val();
        let data = {
            'id': itemId,
        };

        let JSONObject = JSON.stringify(data);

        postRequest(token, '/products/delete', JSONObject, function (response) {
            if (response.status === undefined) {
                location.reload();
            } else {
                printMessage('error', 'There was an error removing the item');
            }
        })
    });
};

let editProduct = function (productId) {
    const url = '/products/' + productId;

    getRequest(url, function (response) {
        if (response.status === undefined) {
            $("#productId").val(response.id);
            $("#productTitle").val(response.name);
            tinymce.activeEditor.setContent(response.description);
            $("#productPrice").val(response.price);

            let myDropzone = $("#my-awesome-dropzone")[0].dropzone;
            let mockFile = {accepted: true, name: response.image_name};

            SetDropzone();

            myDropzone.files.push(mockFile);
            myDropzone.displayExistingFile(mockFile, response.image_url);

            $("#addProductModalLabel").text("Edit Product");

            $("#addProductModal").modal('show');
        } else {
            printMessage('error', 'Error loading product information.')
        }
    });
}
//
Dropzone.autoDiscover = false;

Dropzone.options.myAwesomeDropzone = {
    acceptedFiles: ".jpeg, .jpg, .png",
    maxFiles: 1,
    uploadMultiple: false,
}

function SetDropzone() {
    let myDropzone = $("#my-awesome-dropzone")[0].dropzone;
    myDropzone.options.acceptedFiles = ".jpeg, .jpg, .png";
    myDropzone.on("error", function (file, error) {
        printMessage('error', error);
        this.removeFile(file);
    });
    myDropzone.removeAllFiles(true);
}
