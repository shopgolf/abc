$(function () {
	
	$('#view-hits').click(function(event){	
		event.preventDefault();
		var day = $('#published').val();
		uri = $(this).attr('href');		
		$.ajax({
			type : 'post',
			url  : uri,
			data : {day :day},
		 success: function(html){
			 $('#content-top-hits').empty();
			 $('#content-top-hits').html(html);
		 },
		 error : function(html){
             alert('ngu');
         }
		})
	});
});