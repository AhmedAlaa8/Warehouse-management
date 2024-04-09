$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#changePublishStatus').on('click',function(){
    let href = $(this).data('href')

    $.ajax({
        url: href,
        type: "GET",
        success: function(res){
            if(res.published == true)
            {
                $('#publishedText').removeClass('bg-danger').addClass('bg-success').text("ظاهر")
                $('#changePublishStatus').removeClass('text-danger').addClass('text-success').html('<i class="fas fa-toggle-on"></i>')
            }
            else
            {
                $('#publishedText').removeClass('bg-success').addClass('bg-danger').text("مخفي")
                $('#changePublishStatus').removeClass('text-success').addClass('text-danger').html('<i class="fas fa-toggle-off"></i>')
            }
        }
    })
})


$('.editProductStoreButton').on('click',function(){
    let storeProduct = $(this).data('storeproduct')
    let href = $(this).data('href')

    $('#editProductStoreModal #product_id').val(storeProduct.product_id)
    $('#editProductStoreModal #store_id').val(storeProduct.store_id)
    $('#editProductStoreModal #unit_id').val(storeProduct.unit_id)
    $('#editProductStoreModal #count').val(storeProduct.count)
    $('#editProductStoreModal #buy_price').val(storeProduct.buy_price)
    $('#editProductStoreModal #discount').val(storeProduct.discount)
    $('#editProductStoreModal #trade_price').val(storeProduct.trade_price)
    $('#editProductStoreModal #price').val(storeProduct.price)
    $('#editProductStoreModal #expire_date').val(storeProduct.expire_date)
    $('#editProductStoreModal #editProductStoreForm').attr('action',href)
})