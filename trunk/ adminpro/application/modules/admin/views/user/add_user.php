<div>aaaaaaaaaa</div>
<script>
	jQuery(document).ready(function($) {
		$('.btn-index').css({display:'none'});
		$('.btn-edit').css({display:'none'});
		$('.btn-copy').css({display:'none'});
		$('.btn-add').css({display:'inline-block'});
	});

   function Add(){
        $('.content').load('<?php echo base_url("admin/users/add"); ?>',function(){

        });
    }
</script>