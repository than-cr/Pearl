$(document).ready(function() {
    $("#btnAddVariant").click(function () {
        let $lastRow = $("#variantsTableBody").find('tr:last');
        $lastRow.after($lastRow.clone());
    });

    $("#btnSave").click(function (e) {
        e.preventDefault();
        e.stopPropagation();

        let data = {
            'title': $('#productTitle').val(),
            'description': tinymce.activeEditor.getContent({format : 'raw'}),
            'price': $('#productPrice').val(),
            'image': $('#my-awesome-dropzone')[0].dropzone.getAcceptedFiles(),
            'variants': []
        };

        $('tr').each(function () {
            let variantToAdd = {
                'size': $(this).find("[name=productSize]").val(),
                'color': $(this).find("[name=productColor]").val(),
                'stock': $(this).find("[name=productStock]").val()
            };

            data.variants.push(variantToAdd);
        });

        const token =  $('input[name="_token"]').val();
        let JSONObjet = JSON.stringify(data);

        postRequest(token,'add-product', JSONObjet, function (response) {
            if (response.status === undefined) {
                location.href = '/products';
            } else {
                console.log(response.responseJSON);
            }
        });
    });
});
Dropzone.autoDiscover = false;

Dropzone.options.addProductForm = {
    acceptedFiles: ".jpeg, .jpg, .png",
}
