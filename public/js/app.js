var show_msg=function(str){
    $('#msg').show();
    $('#msg').html('<p>'+str+'</p>');
    setTimeout(function(){$('#msg').hide();},4000);
}

$(document).ready(function () {
    //initialize element
    $('#msg').hide();
    //login
    $('#btn-log').on('click',function(){
        var email=$('#email').val();
        var form=$('#form-log');
        var dataStr=form.serialize();
        var url=form.attr('action');
        $.ajax({
            url:url,
            type:'post',
            data:dataStr,
            dataType:'json',
            error:function(out){
                $('#msg').attr('class','alert alert-danger fade in col-sm-offset-2 col-sm-8');
                console.log(out);
            },
            success:function(out){

                console.log(out);
                if( out.redir=="home"){
                    show_msg(out.msg);
                    //window.location=out.redir;

                } else{
                    window.location=out.redir;
                }
            }
        });
    });
    //validate email
    $('#email-reg').on('change',function(){
        var form=$('#form-reg');
        var email=$('#email-reg').val();
        $.ajax({
            url:'reg/valemail',
            type:'post',
            data:{email:email},
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