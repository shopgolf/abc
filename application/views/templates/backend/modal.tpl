<!-- Modal -->
<div id="delete_confirm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Xác nhận</h3>
  </div>
  <div class="modal-body">
    <p>Bạn thật sự muốn xóa?</p>
  </div>
  <div class="modal-footer">
    <button class="btn btn-danger" onlick="" my-type="delete_confirm">Xóa</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Bỏ qua</button>
  </div>
</div>
<script>
	function delete_confirm(url){
		$("button[my-type=delete_confirm]").attr('onclick', 'window.location="'+url+'"');
		return true;
	}
</script>

<link rel="stylesheet" href="{{$static_bk}}/css/jquery.fancybox.css">
<script type="text/javascript" src="{{$static_bk}}/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="{{$static_bk}}/js/box.js"></script>