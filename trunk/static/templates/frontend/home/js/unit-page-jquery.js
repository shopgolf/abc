$(document).ready(function(){
	Tab('#menu .menu-ul .menu-li');	
	mon_phai();
	go_top();
	gallery();
	Tab('.tab-li');
	cam_nan();	
	
});

function myFocus(element)
{
	if (element.value == element.defaultValue) {
	element.value = '';
	}
}
function myBlur(element)
{
	if (element.value == '') {
	element.value = element.defaultValue;
	}
} 


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
		$('.'+sub_hide).hide();
		$(sub_cont).show();
	});
}

function mon_phai(){	
	var rel =$('.nav-li.active').find('a').attr('href');
	$(rel).stop(true,true).fadeIn(200);
	$('.nav-li').hover(function(){
		$('.nav-li').removeClass('active');
		$(this).addClass('active');
		var rel = $(this).find('a').attr('href');
		var sub_hide = $('.charater .item').stop(true,true).fadeOut(200);
		$(rel).stop(true,true).fadeIn(200);
		
	});
}
function go_top(){
	$('.top').click(function(){
		$('body,html').animate({
			scrollTop : 0
			},800);	
	});	
}

function menu(){
	$('#header .menu .menu-ul .menu-li').hover(function(){
		$(this).find('.menu-child').stop().css({display:'none'}).slideDown();	
	},function(){
		$(this).find('.menu-child').stop().css({display:'block'}).slideUp();	
	});	
	$('.menu ul li a').click(function(){
		$('.menu ul li a').removeClass('activex1');		
		$(this).addClass('activex1');
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

function cam_nan(){	
	$('.container-choice .choice.active').next().stop(true,true).slideDown(200);
	$('.container-choice .choice').hover(function(){
		$('.container-choice').children('div').removeClass('active')
		$(this).addClass('active');
		$('.container-choice').children('.list-detail').stop(true,true).slideUp(200);
		$(this).next().stop(true,true).slideDown(200);
	},
	function(){
		
	});
}

function load_page(obj,uri){	
	var val = $(obj).attr('data');	
	var id  = $(obj).parent().parent().attr('id');console.log(uri);// attr('href');	
	$.ajax({
		type : 'post',	
		url  : uri,
		data : {segment : val}, 
		success : function(data){console.log(data)
			$('#'+id + ' .view-more').remove();
			$('#'+id).append(data);			
		},
		error : function(){
			console.log('ajax load error');
		}  						
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
