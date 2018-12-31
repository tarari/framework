var show_msg=function(str){
    $('#msg').show();
    $('#msg').html('<p>'+str+'</p>');
    setTimeout(function(){$('#msg').hide();},4000);
}

$(document).ready(function () {
    //initialize element
    $('#msg').hide();
    //validate email
    $('#email-reg').on('change',function(){
        var form=$('#form-reg');
        var email=$('#email-reg').val();
        $.ajax({
            url:'reg/valemail',
            type:'post',
            data:email,
            dataType:'json',
            error:function(out){
                console.log(out);
            },
            success:function(out){
                console.log(out);
                show_msg(out.msg);
                if(out.msg=="Email in use"){
                    $('#email').focus();
                }

            }
        });

    });
});