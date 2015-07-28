<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{$config.site_title}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link href="/static/templates/backend/css/style_login.css" rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="/third_party/jquery/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="http://teampat.net/third_party/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/static/templates/backend/js/md5.js"></script>
        <script type="text/javascript" src="/static/templates/backend/js/main.js"></script>		
        <script language="javascript">
        var baseUrl = "{{$link_bk}}";
        var action = '';
        </script>
        <style>.hidden{display:none;}</style>
    </head>
    <body>
        <h1>Administrator {{$config.site_title}}</h1>
        <div class="app-cross">
            <div class="cross"><img src="/static/templates/backend/images/auth/cross.png" class="img-responsive" alt="" /></div>
            <h2>ĐĂNG NHẬP</h2>
            {{form_open("/auth/home/authenticate",["formType"=>"hashPassword","autocomplete"=>"off"])}}
                    {{form_input(["type"=>"password","class"=>"hidden"])}}
                    {{form_input(["type"=>"text","name"=>"username","class"=>"text",value=>"","placeholder"=>"Tên đăng nhập"])}}
                    {{form_input(["autocomplete"=>"off","type"=>"password","name"=>"password","class"=>"text",value=>"","placeholder"=>"Mật khẩu đăng nhập"])}}
                    <div class="submit">{{form_input(["type"=>"submit",value=>"ĐĂNG NHẬP",name=>"submit","id"=>"submit"])}}</div>
                    <div class="clear"></div>
            {{form_close()}}
        </div>
        <div class="copy-right">
            <p>Copyright &copy; 2015  All rights {{$config.site_title}}</p>
        </div>    
        <script>
            var published = "";
        </script>
    </body>
</html>