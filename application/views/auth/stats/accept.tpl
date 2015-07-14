<link rel="stylesheet" href="{{$static_bk}}/css/notice.css" />
<script>
function continues(){
    $("#success").html("<img scr='{{$static_bk}}/images/icon/loading.gif' /><br/> Vui lòng chờ");
    setTimeout(function () {
        $.ajax(
            {
                url : '{{$link_bk}}/stats/action_accept/{{$id}}',
                type: "POST",
                cache: true,
                beforeSend: function(){
                    $("#success").html("<img scr='{{$static_bk}}/images/icon/loading.gif'><br/> Đang xử lý");
                },
                success:function(data)
                {
                    setTimeout(function () {
                        if(data==1){
                            $("#success").html("Xác nhận đơn hàng thành công!");
                            setTimeout(function () {
                                closeFancy();
                                window.top.location.href="{{$link_bk}}/stats";
                            },2000);
                        }
                    },1000);
                },
                error: function() 
                {
                    $("#success").html("Gởi tin nhắn thất bại!");
                }
            });
     },2000);
}
function closeFancy(){
    parent.jQuery.fancybox.close();
}
</script>

<div id="container2">
    <h3 id="nav2" class="logo">
        <a>VUI LÒNG XÁC NHẬN</a>
    </h3>
    <div id="wufoo-mz9i3ib0wkzqls">
        <div style="padding-left:10px">
            <div id="content-sms">
                <p style="text-align:center;">VUI LÒNG XÁC NHẬN</p>
            </div>
        </div>
        <div class="top-button">
            <button id="submit" class="btn btn-primary" onclick="continues()">Tiếp tục</button>
            <button name="" id="cancel" class="btn" onclick="closeFancy()">ĐÓNG</button>                
        </div>
        <div id="success"></div>
    </div>
</div>
