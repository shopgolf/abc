function changecaptcha(e){
    $.ajax({
        url: base_url+'ajax_excution/captchaimage',
        dataType:'text',
        type:'post',
        success:function(data){
            $(e).attr('src', data);
        }
    });
}

function copyuname(flag){
    var uname;
    if(flag == 0){
        uname = $("input[name='username']").val();
        $("input[name='reg_username']").val(uname);
    }else if(flag == 1){
        uname = $("input[name='reg_username']").val();
        $("input[name='username']").val(uname);
    }
}
function copypword(flag){
    var pword;
    if(flag == 0){
        pword = $("input[name='password']").val();
        $("input[name='reg_password']").val(pword);
        $("input[name='reg_repassword']").val(pword);
    }else if(flag == 1){
        pword = $("input[name='reg_password']").val();
        $("input[name='password']").val(pword);
    }
}

$(document).ready(function(){
    $('form').submit(function(){
    	 $("#btn_reg").click();
    });
    //------------ REGISTER -------------
    $("#btn_reg").click(function(){
        var username        = $("input[name='reg_username']").val();
        var password        = $("input[name='reg_password']").val();
        var repassword      = $("input[name='reg_repassword']").val();
        var email           = $("input[name='reg_email']").val();
        var captcha         = $("input[name='captcha']").val();
        var data = {
            username:username,
            password:password,
            repassword:repassword,
            email:email,
            captcha:captcha
        };
        //$("#Msg").empty();
        $.ajax({
            url: base_url+'ajax_excution/register',
            dataType: 'text',
            type: 'post',
            data: data,
            success:function(data){
                var result = JSON.parse(data);console.log(result.message);
                if(result.result==1){
                    
                    //$("#Msg").html('<span style="color:green;">Đăng ký thành cô</span>');
//                    setTimeout(function(){
                        location.reload();
//                    }, 3000);
//                    document.reg_form.reset();
//                    changecaptcha("#img-captcha-kg");
                }
                else if (result.result==2){
                    window.location.href = base_url + "vao-game/may-chu/"+ result.message;
                }else{
                    $("#err_regis_msg").html('<span style="color:red;">'+result.message+'</span>');
                    changecaptcha("#img-captcha-kg");
                }
            },
            error:function(){
                
            }
        });
    });
    
    //---------------- LOGIN -----------------
    $("#btn_login_2").click(function(event){    	
    	event.preventDefault();
        var username        = $("input[name='username']").val();
        var password        = $("input[name='password']").val();
       // var captcha         = $("input[name='captcha']").val();
        var data = {
            username:username,
            password:password,
           // captcha:captcha
        };
        //$("#Msg").empty();
        $.ajax({
            url: base_url+'ajax_excution/login',
            dataType: 'text',
            type: 'post',
            data: data,
            success:function(data){
                var result = JSON.parse(data);console.log(result);               
                if(result.result==1){
                    location.reload();
                }
                else if(result.result==2){
                    
                }else{
                    $("#err_login_msg").html('<span style="color:red;">'+result.message+'</span>');
                }
                
            },
            error:function(){
                console.log('login faid');
            }
        });
    });
    $("#btn_login_1").click(function(){
        var username        = $("input[name='username1']").val();
        var password        = $("input[name='password1']").val();
        //var captcha         = $("input[name='captcha']").val();
        var data = {
            username:username,
            password:password
            //captcha:captcha
        };
        $("#Msg").empty();
        $.ajax({
            url: base_url+'ajax_excution/login',
            dataType: 'text',
            type: 'post',
            data: data,
            success:function(data){
                var result = JSON.parse(data);console.log(result);
                //$("#img-captcha-login").click();
                if(result.result==1){
                    
                    //$("#Msg").html('<span style="color:green;">Đăng ký thành cô</span>');
//                    setTimeout(function(){
                        location.reload();
//                    }, 3000);
//                    document.reg_form.reset();
                    //changecaptcha("#img-captcha-login");
                }
                else if(result.result==2){
                    
                }else{
                    $("#err_login_msg").html('<span style="color:red;">'+result.message+'</span>');
                }
                
            },
            error:function(){
                
            }
        });
    });
})
    
