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