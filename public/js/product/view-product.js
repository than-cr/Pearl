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
});
