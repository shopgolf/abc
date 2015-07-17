<div id="foneadd">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
        <input type="file" accept='image/*' class="upload" id="1" onchange="getValueById(this)">
        <input type="text" class="form-control" id="image1" name="image[]" placeholder="">
        <input type="hidden" name="img-submit[]" id="img-submit-1" value=""/>
    </div>
</div>
<br/><button name="" type="button" class="btn btn-success" id="more">MORE</button>
<script type="text/javascript">
    $(document).ready(function() {
        var fone_add = 2;
        $("#more").on('click',function (e) {
            $("#foneadd").append('<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span><input type="file" class="upload" id="'+fone_add+'" onchange="getValueById(this)"><input style="width:83.5%" type="text" class="form-control" id="image'+fone_add+'"name="image[]" placeholder=""><input type="hidden" name="img-submit[]" id="img-submit-'+fone_add+'" value=""/>&nbsp;&nbsp;<button name="" type="button" class="btn btn-danger" onclick="javascript:$(this).parent().remove();">DELETE</button></div>');
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
</script>