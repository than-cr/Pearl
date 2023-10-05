function getRequest(url, callback)
{
    $.ajax({
        url: url,
        type: "GET",
        beforeSend: function (xhr)
        {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Content-Type", "application/json");
        },
        success: function (response)
        {
            if (response)
            {
                callback(response);
            }
        },
        error: function (response) {error(response)},
    });
}

function postRequest(token, url, data, callback) {
    $.ajaxSetup({
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', token);
        }
    });
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        contentType: "application/json; charset=utf-8",
        processData: false,
        success: function (response) {
            if (callback) {
                callback(response);
            }
        },
        error: function (response) {
            if (callback) {
                callback(response);
            }
        }
    });
}
