
	//check all list
	$('#check-all').click(function(event) {
		if(this.checked = true){
			$('.check-list').each(function(){
				this.checked = true;
			
			})	
		}else{
			$('.check-list').each(function(){
				this.checked = false;
			})	
		}
	});	
