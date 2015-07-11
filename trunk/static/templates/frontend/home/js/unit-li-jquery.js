$(document).ready(function(){
	
});
function login(uri){
	$('#login-giftcode').addClass('load');
	$('.form-login').hide();
	$.ajax({
			 url : uri,
			 dataType: 'html',
			 type : 'POST',
			 data : {username : $('#username').val(),password : $('#password').val() },
			 success : function(data){					
				$('#login-giftcode').empty();	
				$('#login-giftcode').removeClass('load');				
				$('#login-giftcode').html(data);	 
			 },
			 error : function(){	
				console.log('login error');
			 }  						
		});		
}

