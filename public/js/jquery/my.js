$(document).ready(function () {
    $('.update-product-cart').change(function () {
        let qtyNew = $(this).val();
        let rowId = $(this).attr('data-rowId');
        console.log(rowId)
        let id = $(this).attr('data-id');
        console.log(id)
        let origin = location.origin;
        $.ajax({
            url: origin + '/cart-update/' + rowId + '/' + id,
            method: 'GET',
            data: {
                qty: qtyNew,
            },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                $('#product-subtotal-' + id).html(result.totalProduct.toLocaleString() + ' VNĐ')
                $('#total-price-cart').html('<strong>' + result.total.toLocaleString() + ' VNĐ' + '</strong>')
            }
        })
    })
})
