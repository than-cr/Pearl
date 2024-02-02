$(document).ready(function () {
    // Run this when page is ready, it updates the subtotal and total
    getCartData();
});

var deleteProduct = function(productId) {
    deletePrint(function () {
        const token =  $('input[name="_token"]').val();
        let data = {
            'productId': productId,
        };

        let JSONObject = JSON.stringify(data);

        postRequest(token, '/cart/delete', JSONObject, function (response) {
            if (response.status === undefined) {
                location.reload();
            } else {
                printMessage('error', 'There was an error removing the item');
            }
        });
    });
}

var updateCart = function (productId, quantity, relative) {
    const token =  $('input[name="_token"]').val();

    let data = {
        'productId': productId,
        'quantity': quantity,
        'relative': relative,
    };

    let JSONObject = JSON.stringify(data);

    postRequest(token, '/cart/update', JSONObject, function (response) {
        if (response.status === undefined) {
            let productTotal = (Math.round(response['price'] * response['quantity'] * 100) / 100).toFixed(2);
            $("#" + response['id'] + '_Total').text(productTotal);
            getCartData();
        } else {
            printMessage('error', 'There was an error removing the item');
        }
    });
}

var getCartData = function () {
    getRequest('/cart/data', function(response) {
        $("#cartSubTotal").text(response['subtotal']);
        $("#cartTotal").text(response['total']);
    });
}
