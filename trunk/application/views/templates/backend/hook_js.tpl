<script type="text/javascript">
function get_Checked_Checkbox_By_Name(Input_Name) {
    var arr = [];
    $("input[name='" + Input_Name + "']:checked:enabled").each(function () {
        arr.push($(this).val());
    });
    document.getElementById("trashAll").value           = arr;
}
function trashAll(){
    var trash = $("#trashAll").val();
    if(trash == ""){
        alert("{{$lang.deleteInfo}}");return false;
    }
    
    $.ajax({
        type        : "POST",
        cache       : false,
        url         : "{{$link_bk}}/{{$controller}}/trashAll",
        data        : {id:trash},
        success: function(data) {
            if(data == 1){
               window.location.href="{{$link_bk}}/{{$controller}}";
            } else {
                alert("{{$lang.error}}");
            }
            return false;
        }
    });
    
}
</script>