
$(document).ready(function () {
    $("#btnAddColor").click(function () {
        $("#colorTitle").val('');

        $("#addColorModal").modal('show');
    });

    $("#btnSave").click(function (e) {
        e.preventDefault();

        let data = {
            'color': $("#colorTitle").val(),
            'code': $("#colorCode").val(),
        };

        const token =  $('input[name="_token"]').val();
        let JSONObject = JSON.stringify(data);

        postRequest(token, '/colors/save', JSONObject, function (response) {
            if (response.status === undefined) {
                printMessage('success', response, function () {
                    location.href = '/colors';
                });
            } else {
                printMessage('error', response.responseJSON);
            }
        })
    })
})
