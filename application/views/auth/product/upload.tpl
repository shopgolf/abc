<div id="foneadd">
    {{if $segment == "add"}}
        <div class="input-group">
            <div id="fileuploader">Upload</div>
        </div>
    {{else}}
        {{foreach $product->image as $key => $value }}
            <div class="input-group" {{if $key > 0}}style="padding:2px 0"{{/if}}>
                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                <input type="file" accept='image/*' class="upload" id="{{$key+1}}" onchange="getValueById(this)">
                <input style="width:83.5%" type="text" class="form-control" id="image{{$key+1}}" name="image[]" placeholder="" value="{{$value}}">&nbsp;&nbsp;<button value="{{$value}}" name="" type="button" class="btn btn-danger" onclick="deleteImg(this)">DELETE</button>
                <input type="hidden" name="img-submit[]" id="img-submit-{{$key+1}}" value=""/>
            </div>
        {{/foreach}}
    {{/if}}
</div>

<link href="{{$static_bk}}/css/uploadfile.css" rel="stylesheet">
<script src="{{$static_bk}}/js/jquery.uploadfile.min.js"></script>

<script>
$(document).ready(function()
{
	$("#fileuploader").uploadFile({
            url:"{{$link_bk}}/product/upload/",
            fileName:"myfile",
            //showStatusAfterSuccess: false,
            showAbort: false,
            showDone: false,
            showDelete: true,
            showProgress: true,
            afterUploadAll: function (data) {
                responses = JSON.parse(data['responses']);//JSON.parse(data);
                //ajax-file-upload-red
                
                    //var h1 = document.getElementsByClassName("ajax-file-upload-red");
                    //$(".ajax-file-upload-red").attr("alt");
{*                    this.del=("<div>delete</div>").appendTo("#ajax-file-upload-red").hide()*}
   
            }
	});
});
</script>