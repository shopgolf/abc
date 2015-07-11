/**
 *  tinymce function
 *
 * @package XGO CMS v3.0
 * @subpackage tinymce
 * @link http://sunsoft.vn
 */
var tinymcePath = baseUrl + 'third_party/tiny_mce/';
// JavaScript Document
$(document).ready(function() {
	tinymceFull($('textarea.tinymcefull'));
	$('textarea.tinymcesimple').tinymce({
		// Location of TinyMCE script
		script_url : tinymcePath + 'tiny_mce.min.js',
		// General options
		language : "vi",
		document_base_url : baseUrl,		
		relative_urls : true,
		theme: "modern",
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
		toolbar2: "print preview fullscreen | link image media | forecolor backcolor textcolor fontsize",		
		templates: [
		],
	    file_browser_callback:  function (fieldName, url, type, win) {
			ckFileBrowser(fieldName, url, type, win);
		}
	});
});

var tinymceFull = function(element){
	element.tinymce({
		// Location of TinyMCE script
		script_url : tinymcePath + 'tiny_mce.min.js',
		// General options
		language : "vi",
		document_base_url : baseUrl,
		relative_urls : true,
		theme: "modern",
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"template paste textcolor "
		],
		toolbar1: "insertfile undo redo | styleselect fontselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image paste",
		toolbar2: "print preview fullscreen | link image media | forecolor backcolor textcolor charmap removeformat",
		templates: [
		],
	    file_browser_callback:  function (fieldName, url, type, win) {
			ckFileBrowser(fieldName, url, type, win);
		},
		style_formats: [       
        {title: 'Header 1', block: 'h1',classes: 'content-event-h1'},
		{title: 'Header 2', block: 'h2',classes: 'content-event-h2'},
        {title: 'First characters', inline: 'span', classes: 'content-event-first'},
		{title: 'Bold text', inline: 'b'},
		{title: 'Box text', block:'fieldset',classes:'fieldset-note',wrapper: true},
		{title: 'Box title text', block:'legend'},
		{title: 'Link text', block : 'a'}
		],
		
	removeformat : [
    {selector : 'b,strong,em,i,font,u,strike', remove : 'all', split : true, expand : false, block_expand : true, deep : true},
    {selector : 'span', attributes : ['style', 'class'], remove : 'empty', split : true, expand : false, deep : true},
    {selector : '*', attributes : ['style', 'class'], split : false, expand : false, deep : true}
]


	});
}
