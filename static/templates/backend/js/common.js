/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(e) {
    $('.button-fancy-sl').on('click',function() {
           $(".button-fancy-sl").fancybox({
		type 		: 'iframe',		
		margin		: 0,
		padding		: 0,
		maxWidth	: '480px',
		maxHeight	: '400px',
		fitToView	: false,
		width		: '100%',
		height		: '100%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		titleShow	: true,
		closeBtn	: false,
                afterShow       : function() {
                        var preventFromExit = true;
                }
	}).trigger("click");
    });
});