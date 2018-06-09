var _userModal = $('#userModal');
var ajaxPath_getUserByUsername = '/control-panel/ajax/get-user';

$(document).ready(function(){
    $('#userModal #btnSave').click(triggerFormSubmit);
});

function triggerFormSubmit(){
    var token = $('meta[name=csrf-token]').attr('content');
    $('form#EditUserForm input[name=_token]').val(token);
    $('form#EditUserForm').submit();
}

function loadUser(btn){
    resetForm();
    username = $(btn).attr('data-value');
    path = ajaxPath_getUserByUsername+'/'+username;
    $.get(path, function(data, status){
       if(status == 'success'){

            if(data != null && data != undefined && data != ''){
                var data = data.success;
                $('#EditUserForm #Username').val(data.username);
                $('#EditUserForm input[name=current_username]').val(data.username);
                $('#EditUserForm #Email').val(data.email);
                $('#EditUserForm #Fullname').val(data.fullname);
                $('#EditUserForm #Phone').val(data.phone);
                $('#EditUserForm #Role').val(data.role);
                $('#EditUserForm #Status').val(data.status);
                    
            }
            else{
                confirm('Oops! Somethings went wrong wrong T_T');     
            }

            _userModal.modal(); 
       }
       else{
           confirm('Oops! Somethings went wrong wrong T_T');
       }
    });
}

function resetForm(){
    $('#EditUserForm input').each(function(idx){
        var $this = $(this);
        $this.val('');
    });
}

function banUser(btn){
    var link = $(btn).attr('data-link');
    swal({
        title: "Confirm",
        text: "Bạn có muốn cấm người dùng này?",
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