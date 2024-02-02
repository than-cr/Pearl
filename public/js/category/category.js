$(document).ready(function () {
    $("#btnAddCategory").click(function () {
        $("#categoryTitle").val('');
        $("#limited_edition").prop('checked', false);
        $("#addCategoryModal").modal('show');
    });

    $("#btnSave").click(function (e) {
        e.preventDefault();

        let data = {
            'name': $("#categoryTitle").val(),
            'limited_edition': $("#limited_edition").prop('checked')
        };

        const token = $('input[name="_token"]').val();
        let JSONObject = JSON.stringify(data);

        postRequest(token, '/categories', JSONObject, function (response) {
            if (response.status === undefined) {
                printMessage('success', response, function() {
                    location.href = '/categories';
                });
            } else {
                printMessage('error', response.responseJSON);
            }
        })
    });
})
