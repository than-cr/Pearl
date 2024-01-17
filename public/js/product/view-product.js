$(document).ready(function() {
    var getStockQuantity = function () {
        let url = '/product-variant/' + $("#productId").val() + '/' + $("#productSize").val() + '/' + $("#productColor").val();
        getRequest(url, function (response){
            if (0 < response['stock_quantity'])
            {
                $("#availability").removeClass('text-warning').addClass('text-success').text(response['stock_quantity'] + ' Available');
            }
            else {
                $("#availability").removeClass('text-success').addClass('text-warning').text('Out of stock');
            }
        });
    }

    getStockQuantity();

    $("#productSize").change(function () {
        getStockQuantity();
    });

    $("#productColor").change(function () {
        getStockQuantity();
    });

    $("#btnAddToCart").click(function () {
       event.preventDefault();

       let data = {
           'productId' : $("#productId").val(),
           'size' : $("#productSize").val(),
           'color' : $("#productColor").val(),
           'qty' : $("#qty").val()
       };

        const token =  $('input[name="_token"]').val();
        let JSONObject = JSON.stringify(data);
        let url = '/cart/add';

        postRequest(token, url, JSONObject, function (response) {
            if (response.status === undefined) {
                printMessage('success', response, function () {
                    location.reload();
                });
            } else {
                printMessage('error', response.responseJSON);
            }
        });
    });
});
