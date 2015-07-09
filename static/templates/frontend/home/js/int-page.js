jQuery(function () {
	Tab('.tab-li');
	Tab('.menu-li');
	next_menu();
	pre_menu();
	toget_news('.news','#tab_1');
	toget_news('.news','#tab_2');
	toget_news('.news','#tab_3');
	gallery();
	scroll_left();
});
function Tab(_obj){	
	var sub_hide = $($(_obj).find('a').attr('href')).attr('class');
	var sub_cont = $(_obj+'.active').find('a').attr('href');	
	$('.'+sub_hide).hide();
	$(sub_cont).show();
	$(_obj).click(function(event){
		event.preventDefault();
		$(_obj).removeClass('active');
		$(this).addClass('active');
		var sub_cont = $(_obj+'.active').find('a').attr('href');
		var sub_hide = $($(this).find('a').attr('href')).attr('class');		
		$('.'+sub_hide).hide();
		$(sub_cont).show();
	});
}

function toget_news(_obj,parent){	
	var sub_hide  = $($(parent + ' ' + _obj).attr('rel')).attr('class');		
	if($(parent + ' ' + _obj).hasClass('active')){
		$(parent + ' ' + _obj+'.active').find('a').addClass('title_1');
	}
	
	$(parent + ' '+_obj+'.active').find('p').hide();
	var sub_cont = $(parent + ' ' + _obj+'.active').attr('rel');	
	
	$(parent + ' .'+sub_hide).hide();	
	$(parent + ' ' +sub_cont).show();	
	
	$(parent + ' ' + _obj).hover(function(event){	
		$(parent + ' ' + _obj).removeClass('active');
		$(parent + ' ' + _obj).find('a').removeClass('title_1');		
		$(this).addClass('active');			
		var sub_cont = $(parent + ' ' + _obj + '.active').attr('rel');
		$(parent + ' ' + _obj+'.active').find('a').addClass('title_1');
		$(parent + ' ' +'.news p').stop(true,true).slideDown(200);
		$(this).find('p').stop(true,true).slideUp(200);
		$(parent + ' .'+sub_hide).stop(true,true).slideUp(200);		
		$(parent + ' ' +sub_cont).stop(true,true).slideDown(200);		
	},
	function(){
		
	});
}

function next_menu(){
	$('.group.act').css({'display':'block'});
	$('.next').click(function(){
		var curren_a = $('.group.act').attr('id');
		hash = curren_a.substring(curren_a.indexOf('_') + 1);		
		if(hash < $('.group').length - 1 ){
			$('.group').removeClass('act');
			$('#group_'+ (parseInt(hash) + 1)).addClass('act');	
			$('.group').hide();
			$('.group.act').css({'display':'block'});
		}
	});
}
function pre_menu(){
	$('.group.act').css({'display':'block'});
	$('.pre').click(function(){
		var curren_a = $('.group.act').attr('id');
		hash = curren_a.substring(curren_a.indexOf('_') + 1);		
		if(hash > 0){
			$('.group').removeClass('act');			
			$('#group_'+ (parseInt(hash) - 1)).addClass('act');	
			$('.group').hide();
			$('.group.act').css({'display':'block'});
		}
		
	});
}

function scroll_left(){   
	v_height = $( window ).height();
	$(".hotline").css({'bottom' : (v_height - 484)+'px'}); 
	$(window).bind('scroll', function(){
		var a = $(window).scrollTop();
		var myWidth = window.innerWidth;
		width = myWidth/2 - 539 ;			
		if(a < 500){
			$(".hotline").css('position','fixed');
			$(".hotline").css({'bottom' : (v_height - 721)+'px'}); 
			$('.hotline').css({'left': width + 'px'});	
		}
		else{
			$(".hotline").css('position','absolute');
			$(".hotline").css({'bottom' : (a - 645 - 338)+'px'}); 
			$('.hotline').css({'left':  '0px'});					
		}
	});
	loadmenuLeft();
}	

function loadmenuLeft(){
var myWidth = window.innerWidth;
	width = myWidth/2 - (685) ;	
	$('.hotline').css({'left': width + 'px'});	

$(window).resize(function(){		
	var myWidth = window.innerWidth;
	width = myWidth/2 - (685) ;	
	$('.hotline').css({'left': width + 'px'});	
});		
}


function gallery(){
	$('.container-item .item').hover(function(){
		$(this).find('.overlay_').show();
	},
	function(){
		$(this).find('.overlay_').hide();
	});
}