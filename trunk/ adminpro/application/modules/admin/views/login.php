<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url('assets/admin');?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url('assets/admin');?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/admin');?>/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <form action="" method="post">
                <div class="body bg-gray">
                    <div class="alert warning" style="text-align:center;"></div>
                    <div class="form-group">
                        <input type="text" id = "userid" name="userid" class="form-control" placeholder="User ID"/>
                    </div>
                    <div class="form-group">
                        <input type="password" id ="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block ok">Sign me in</button>  
                </div>
            </form>
        </div>

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url('assets/admin');?>/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(e) {
             $('.ok').click(function(){
                var user = $('#userid').val();
                var pass = $('#password').val();
                var type = 'abc'; 
                if(user == ""){
                    $('.warning').removeClass('alert-info');
                    $('.warning').addClass('alert-danger');          
                    $('.warning').html('Please Enter User !');
                    $('#userid').focus();
                    return false;
                }
                if(pass  == ""){
                    $('.warning').removeClass('alert-info');
                    $('.warning').addClass('alert-danger');
                    $('.warning').html('Please Enter password !');
                    $('#password').focus();
                    return false;
                }
                $.ajax({
                    'url' :  '<?php echo base_url() ;?>admin/login',
                    'type' : 'post',
                    'data' : 'type='+type+'&username='+user+'&password='+pass,
                    'async' : 'false',
                    beforeSend : function(){
                        //$("#result_login").html("Đang load dữ liệu...");
                        //<img class='check_suscess' src='"+links+"public/admin/images/load_form.gif' />
                        $('.warning').removeClass('alert-info')
                        $('.warning').removeClass('alert')
                        $('.warning').removeClass('alert-danger')
                        $('.warning').html('<img src="<?php echo base_url();?>assets/admin/img/Progressbar.gif" width="100" height="50px" />');
                    },
                    success: function(result){
                        if(result === 'false'){
                            $('.warning').removeClass('alert-info');
                            $('.warning').addClass('alert-danger');
                            $('.warning').addClass('alert');
                            $('.warning').html('Wrong username or password !');
                            return false;
                        }else if(result === 'notactive'){
                            $('.warning').removeClass('alert-info');
                            $('.warning').addClass('alert-danger');
                            $('.warning').addClass('alert');
                            $('.warning').html('This account is not activated yet! Please check email or contact Administrator. Thanks!');
                            return false;
                        }
                        else if(result === 'true'){
                            window.location.replace('index'); 
                        }
                    }
                });
                return false;
            });
        });

        </script>     
    </body>
</html>