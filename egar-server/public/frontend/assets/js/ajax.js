$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.inp-qty').change(function(){
        var id = $(this).attr('data-target');
        var qty = $(this).val();
        $.post('/gio-hang/update', {
            id: id,
            qty: qty
        }, function(data, success){
            //
        });
    });
});