<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Backend</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{$static_bk}}/css/bootstrap.min.css" type="text/css"/>
        
        <link rel="stylesheet" href="{{$static_bk}}/css/AdminLTE.min.css" type="text/css"/>
        <link rel="stylesheet" href="{{$static_bk}}/css/skin-blue.min.css" type="text/css"/>
        <link rel="stylesheet" href="{{$static_bk}}/css/main.css" type="text/css"/>
        <link rel="stylesheet" href="{{$static_bk}}/js/iCheck/flat/blue.css" type="text/css"/>

        <script type="text/javascript" src="{{'third_party/jquery/jquery-1.8.2.min.js'|base_url}}"></script>
        <script type="text/javascript" src="{{'third_party/bootstrap/js/bootstrap.min.js'|base_url}}"></script>
        
        <script language="javascript">
            var baseUrl 	= '{{$site_url}}';
            var action 		= '';
	</script>
        
        {{if isset($js)}}
            {{foreach $js as $script}}
                <script type="text/javascript" src="{{$script}}"></script>
            {{/foreach}}
        {{/if}}
        
        {{if isset($css)}}
            {{foreach $css as $stylesheet}}
                <link rel="stylesheet" href="{{$stylesheet}}" type="text/css"/>
            {{/foreach}}
        {{/if}}
    </head>