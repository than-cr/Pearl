
$(document).ready(function () {
    $("#btnAddSize").click(function () {
        $("#sizeTitle").val('');

        $("#addSizeModal").modal('show');
    });

    $("#btnSave").click(function (e) {
        e.preventDefault();

        let data = {
            'size': $("#sizeTitle").val()
        };

        const token =  $('input[name="_token"]').val();
        let JSONObject = JSON.stringify(data);

        postRequest(token, '/sizes/save', JSONObject, function (response) {
            if (response.status === undefined) {
                printMessage('success', response, function () {
                    location.href = '/sizes';
                });
            } else {
                printMessage('error', response.responseJSON);
            }
        })
    })
})
