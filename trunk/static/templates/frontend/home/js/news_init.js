
$(document).ready(function(){	
	$('.wp-news-li-title').click(function(e){
		e.preventDefault();
		$('.wp-news-li-title').removeClass('active');
		$(this).addClass('active');
		$('.content-more').stop(true,true).slideUp(300);
		$(this).next().stop(true,true).slideDown(300);
	});
});

function go_page(_obj){	
	var uri  = $(_obj).find('a').attr('href');
	var cont = $(_obj).parent().parent().parent();	
	$.ajax({
		 url : uri,		
		 dataType: 'html',
		 success : function(data){
			 $(cont).empty();
			 $(cont).html(data);
			// width_pading();
		 },
		 error : function(){
			console.log('ajax error');			
		 }  						
	});	
}

function go_link(){	
	$('.container-content-event a').click(function(event){  
	      	
	    var url = $(this).attr('href')	   
	    
	    var isIndex = url.indexOf('#');
	    
	    
	    
	    if(isIndex == -1){
	    	
	    	//alert("link truc tiep");
	    	
	    }
	    else{
	    	
	    	//alert("link truot");
	    	
	    	event.preventDefault(); 
	    	
	    	hash = url.substring(url.indexOf('#'));
	    	var top = $(hash).offset().top;
	    	 
	 	    $('body,html').animate({scrollTop : top},800);
	    }
	    
	    
	});
}
