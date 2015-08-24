<div id="foneadd">
    {{if $segment == "add"}}
        <div class="input-group">
            <div id="fileuploader">Upload</div>
            <div id="_files"></div>
        </div>
    {{else}}
         <div class="input-group">
            <div id="fileuploader">Upload</div>
            <div id="_files">
                <ul>
                    {{foreach $product->image as $key => $value}}
                        <li id="del_{{$key}}">
                            <input type="hidden" value="{{$value}}" id="{{$value}}" name="files[]"/>
                            <img width="20%" src="{{$site_url}}{{$UPLOAD_DIR}}product/{{$value}}" />
                            <div class="ajax-file-upload-red" id="deleteImg" value="{{$value}}" onclick="deleteImg(this)">{{$lang.delete}}</div>
                        </li>
                    {{/foreach}}
                </ul>
            </div>
        </div>
    {{/if}}
</div>
<style>
#_files ul
{
    margin: 0;
    padding: 0;
    list-style-type: none;
}
#_files ul li { display: inline; }
</style>
<link href="{{$static_bk}}/css/uploadfile.css" rel="stylesheet">
<script src="{{$static_bk}}/js/jquery.uploadfile.min.js"></script>
<script>
$(document).ready(function()
{
	$("#fileuploader").uploadFile({
            url:"{{$link_bk}}/product/upload/",
            fileName:"myfile",
            showAbort: false,
            showDone: false,
            showDelete: true,
            showProgress: true,
            acceptFiles: "jpeg,png,gif",
            statusBarWidth:475,
            dragdropWidth:480,
            deleteCallback: function (data) {
                setTimeout(function () {
                    $.ajax({
                            url : '/auth/product/deleteImage',
                            type: "POST",
                            data : {url:data},
                            cache: true,
                            success:function(responseData) 
                            {
                                if(responseData != 0){
                                    var element = document.getElementById(responseData);
                                    element.outerHTML = "";
                                    delete element;
                                    alert("Xóa ảnh thành công!");
                                } else {
                                    alert("Delete Image Fail!");
                                }
                            },
                            error: function() 
                            {

                            }
                    });
                }, 1000);
            },
            onSuccess: function (files, response, xhr, pd) {
                    $("#_files").append("<input type='hidden' name=files[] value='"+response+"' id='"+response+"' />");
            }
	});
});

function deleteImg(input){
    var del = input.getAttribute("value");
    setTimeout(function () {
        $.ajax({
                url : '/auth/product/deleteImage',
                type: "POST",
                data : {url:del},
                cache: false,
                success:function(responseData) 
                {
                    if(responseData != 0){
                        var element = document.getElementById(responseData);
                        element.outerHTML = "";
                        delete element;

                        $(input).parent().remove();

                        alert("Xóa ảnh thành công!");
                    } else {
                        alert("Delete Image Fail!");
                    }
                },
                error: function() 
                {

                }
        });
    }, 1000);
}
</script>