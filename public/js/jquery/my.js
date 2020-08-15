$(document).ready(function () {
    let origin = location.origin;
    $('.update-product-cart').change(function () {
        let qtyNew = $(this).val();
        let rowId = $(this).attr('data-rowId');
        let id = $(this).attr('data-id');
        $.ajax({
            url: origin + '/cart-update/' + rowId,
            method: 'GET',
            data: {
                qty: qtyNew,
            },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                $('#product-subtotal-' + id).html(result.totalProduct.toLocaleString() + ' VNĐ')
                $('#total-price-cart').html('<strong>' + result.total.toLocaleString() + ' VNĐ' + '</strong>')
            },
        })
    });

})
