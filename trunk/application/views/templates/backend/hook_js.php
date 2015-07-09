<script>
	function delete_confirm(url){
		$("button[my-type=delete_confirm]").attr('onclick', 'window.location="'+url+'"');
		return true;
	}
</script>