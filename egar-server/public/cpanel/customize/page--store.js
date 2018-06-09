$(document).ready(function(){

});

function removeStore(btn){
    var link = $(btn).attr('data-link');
    swal({
        title: "Confirm",
        text: "Bạn có muốn xóa cửa hàng này?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    },
    function(){
        window.location.href = link;
    });
}

function deleteStore(btn){
    var link = $(btn).attr('data-link');
    swal({
        title: "Confirm",
        text: "Bạn có muốn xóa cửa hàng này?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        closeOnConfirm: false
    },
    function(){
        window.location.href = link;
    });
}

function openStoreModal(btn){
    var storeModal = $('#editStoreModal');
    var link = $(btn).attr('data-link');
    $.get(link, function(result){
        if(result != null && result != undefined && result != ''){
            console.log(result.success);
            $('#EditStoreForm input[name=name]').val(result.success[0].name);
            $('#EditStoreForm input[name=address]').val(result.success[0].address);
            $('#EditStoreForm input[name=phone]').val(result.success[0].phone);
            $('#EditStoreForm input[name=lat]').val(result.success[0].lat);
            $('#EditStoreForm input[name=lng]').val(result.success[0].lng);
            $('#EditStoreForm input[name=created_by]').val(result.success[0].created_by.username);
            storeModal.modal('show');     
        }
        else{
            swal('Oops!', 'No result!', 'warning');
        }
    });
}