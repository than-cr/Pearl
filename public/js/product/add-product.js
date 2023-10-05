$(document).ready(function() {
    $("#btnAddVariant").click(function () {
        let $lastRow = $("#variantsTableBody").find('tr:last');
        $lastRow.after($lastRow.clone());
    });

    $("#btnSave").click(function () {
        let data = {
            'title': $('#productTitle').val(),
            'description': tinymce.activeEditor.getContent({format : 'raw'}),
            'price': $('#productPrice').val(),
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
    });
});
