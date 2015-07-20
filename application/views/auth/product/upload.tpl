<div id="foneadd">
    {{if $segment == "add"}}
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
            <input type="file" accept='image/*' class="upload" id="1" onchange="getValueById(this)">
            <input type="text" class="form-control" id="image1" name="image[]" placeholder="">
            <input type="hidden" name="img-submit[]" id="img-submit-1" value=""/>
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
<br/><button name="" type="button" class="btn btn-success" id="more">MORE</button>
<script type="text/javascript">
    $(document).ready(function() {
        {{if isset($count_img)}}
            var fone_add = {{$count_img}}+1;
        {{else}}
            var fone_add = 2;
        {{/if}}
        $("#more").on('click',function (e) {
            $("#foneadd").append('<div class="input-group" style="padding:2px 0"><span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span><input type="file" class="upload" id="'+fone_add+'" onchange="getValueById(this)"><input style="width:83.5%" type="text" class="form-control" id="image'+fone_add+'"name="image[]" placeholder=""><input type="hidden" name="img-submit[]" id="img-submit-'+fone_add+'" value=""/>&nbsp;&nbsp;<button name="" type="button" class="btn btn-danger" onclick="javascript:$(this).parent().remove();">DELETE</button></div>');
            fone_add = fone_add+1;
        });
    });
    
    function getValueById(input){
        var id      = input.id;
        var val   = input.value;

        document.getElementById("image"+id).value       = val.replace("C:\\fakepath\\", "");
        readURL(input,id);
    }
    
    function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (input) {
                $('#img-submit-'+id).attr('value', reader.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function deleteImg(input){
        if (confirm('Are you sure you want to delete this thing outto the database?')) {
            // delete it!
            setTimeout(function () {
                    $.ajax({
                            url : '{{$link_bk}}/product/deleteImg',
                            type: 'POST',
                            data: {img:input.value,id:$("#id").val()},
                            beforeSend: function(){
                                
                            },
                            success:function(data)
                            {
                                if(data == 1){
                                    alert("{{$lang.delete_successful}}");
                                    $(input).parent().remove();
                                } else {
                                    alert("{{$lang.delete_error}}");
                                }
                            },
                            error: function() 
                            {
                                
                            }
                        });
             },1000);
        } else {
            // Do nothing!
        }
    }
</script>