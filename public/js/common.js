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
        success: function (response){
            if (response)
            {
                callback(response);
            }
        },
        error: function (response) {
            if (callback) {
                callback(response);
            }
        },
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

function deleteRequest(url, callback) {
    $.ajax({
        url: url,
        type: 'DELETE',
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

var print = function (title, message, icon, callback) {
    Swal.fire({
        title: title,
        text: message,
        icon: icon
    }).then(callback);
}

var deletePrint = function (callback) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'This action cannot be reverted in the future.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: 'Red'
    }). then(callback);
}

function printMessage(type, message, callback) {
    switch (type)
    {
        case 'success':
            print('Done!', message, 'success', callback);
            break;
        case 'error':
            print('Error!', message, 'error', callback);
            break;
        default:
            break;
    }
}
