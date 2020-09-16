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

    $('.add-cart').on('click', function () {
        let id = $(this).attr('data-id')
        $.ajax({
            url: origin + '/cart/' + id,
            method: "GET",
            dataType: 'json',
            success: function (data) {
                toastr.success(data.message);
                $('.cart-total').html('<i class="fas fa-shopping-cart"></i>' + '(' + data.total + ')')
            }
        })
    })

    $('.remove-product-cart').on('click', function () {
        let rowId = $(this).attr('data-id')
        $.ajax({
            url: origin + '/cart-destroy/' + rowId,
            method: "GET",
            dataType: 'json',
            success: function (data) {
                $('#content-cart-' + rowId).remove()
                $('.cart-total').html('<i class="fas fa-shopping-cart"></i>' + '(' + data.total + ')')
                $('#total-price-cart').html('<strong>' + data.result.toLocaleString() + ' VNĐ' + '</strong>')
                toastr.success('Xóa sản phẩm thành công ');
            }
        })
    })

})
