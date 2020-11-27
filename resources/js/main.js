$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Logout
$('#logout').click(function(e){
    e.preventDefault();
    alertify.confirm("Log out ?", function (e) {
        if(e) 
            document.location.href="/logout";
        else
            return false;        
    });
});

// Remove Item
window.removeItemHandle = (elementId, method) => {
    alertify.confirm("Rmove item ?", e => {
        if (e) {
            $.ajax({
                type: "post",
                url: method,
                complete:function(data)
                {
                    if( data.responseJSON.type == 422 ){
                        alertify.alert(data.responseJSON.errors[0], function() {
                            alertify.error(data.responseJSON.errors[0])
                        });
                    } else if(data.responseJSON.type == 200) {
                        $('#' + elementId).fadeOut(() => {
                            $('#' + elementId).remove();
                        });
                    }
                }
            }); 
        }else {
            return false;
        }
    });
}

// Image Preview 
window.readURL = (input) => {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
            $('#img-preview').attr('src', e.target.result).css('display','block');
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}