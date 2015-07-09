/* 
    Project     : 48c6c450f1a4a0cc53d9585dc0fee742
    Created on  : Mar 16, 2013, 11:29:15 PM
    Author      : Mr Phuc - nguyenvanphuc0626@gmail.com
    Description :
        Purpose of the stylesheet follows.
*/
isrunning =false;
function includejs(url){ 
    try{
    var headID = document.getElementsByTagName("head")[0];         
    var newScript = document.createElement('script');
    newScript.type = 'text/javascript';
    newScript.src = url;
    headID.appendChild(newScript);
    return;
    var _ui = document.createElement('script'); 
    _ui.type = 'text/javascript';
    _ui.src = url;
    var s = document.getElementsByTagName('script')[0]; 
    s.parentNode.insertBefore(_ui, s);
    }catch(e){}
}
function includecss(url){ 
    try{
    var headID = document.getElementsByTagName("head")[0];         
    var cssNode = document.createElement('link');
    cssNode.type = 'text/css';
    cssNode.rel = 'stylesheet';
    cssNode.href = url;
    cssNode.media = 'screen';
    headID.appendChild(cssNode);
    return;
    var _ui = document.createElement('link'); 
    _ui.rel = 'stylesheet';
    _ui.type = 'text/javascript';
    _ui.href = url;
    var s = document.getElementsByTagName('link')[0]; 
    s.parentNode.insertBefore(_ui, s);
    }catch(e){}
}
function checkStrength(password){
	//initial strength
	var strength = 0;
	//if the password length is less than 6, return message.
	if (password.length < 6)return 'Too short';
	//length is ok, lets continue.
	//if length is 8 characters or more, increase strength value
	if (password.length >=6) strength += 1;
	//if password contains both lower and uppercase characters, increase strength value
	if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1;
	//if it has numbers and characters, increase strength value
	if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 ;
	//if it has one special character, increase strength value
	if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1;
	//if it has two special characters, increase strength value
	if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
	//now we have calculated strength value, we can return messages
	//if value is less than 2
	if ( strength ===1 ) return 'Weak';
	else if (strength === 2 ) return 'Fair';
	else if (strength === 3 ) return 'Good';
	else if (strength === 4 ) return 'Strong';
	else return 'Verry Strong';
}
function ShowLoadding(){
    $("#loaddingbar").show();
    $("#loaddingbar div").stop(true).width(0).css({
        bottom:1
    })
    .animate({
        width:'30%'
    },500)
    .animate({
        width:'50%'
    },1000)
    .animate({
        width:'75%'
    },2000)
    .animate({
        width:'95%'
    },5000);
}
function HideLoadding(){
    $("#loaddingbar div").stop(true)
    .animate({
        width:'100%'
    },1000,function(){
        $("#loaddingbar").hide();
    });
        
        
}
function HideLoadding(){
    $("#loaddingAjax .proccessbar").stop(true)
    .animate({
        width:'100%',
        backgroundColor:"red"
    },500,function(){
        $("#loaddingAjax").hide();
    });
        
        
}
function uiMessage(msg,auto){
        
    if($("#uiMessage").length===0 || typeof($("#uiMessage")) === 'undefined' || $("#uiMessage") === null || $("#uiMessage") === undefined){
        $('body').append('<div id="uiMessage" onmouseover="stoptipui()" class="tranf-b-20 b-r-5 ui-corner-all d-p-n" style="position: fixed; left: 50%; top: 36px; padding: 8px;z-index: 99999;margin-left:-360px;">\
    <div class="ui-dialog-content ui-widget-content p-8 o-v-f-h o-v-f-x-a f-z-11" style="min-width: 720px;" > \
    </div>\
    <div class="p-a t-8 r-8 w-16 h-16 c-s-p t-a-c a t-d-n" onclick="untipui()" style="">×</div>\
</div>');
    }
    $("#uiMessage .ui-dialog-content").html(msg);
    if(auto===undefined){
        $("#uiMessage").stop().fadeIn().delay(5000).fadeOut();
    }else{
        $("#uiMessage").stop().hide().fadeIn();
    }
}
function untipui(){
    $("#uiMessage").stop().hide();
}
function stoptipui(){
    $("#uiMessage").stop().css({display:"block",opacity:1});
}
function bckdialog(_option){
    var me=this;
    this.option={
        type        :   "",//notice,error,question,custom
        title       :   null,
        message     :   null,
        uidialog    :   $("#dialog-message"),
        icon        :   '',
        hideclose   :   false,
        autoOpen    :   false,
        minwidth    :   '320px',
        height      :   'auto',
        proc_start  :   null,
        proc_end    :   null,
        onload      :   null,
        onclose     :   null,
        onopen      :   null,
        callback    :   null
    };
	var option=this.option;
	if(_option){
		//$.map(_option,function(value,key){
		//	option[key]=value;
		//});
		$.each(_option,function(index,value){
			option[index]=value;
		});
		this.option=option;
	}
	if($("#bckdialog").length===0){
        $('body').append('\
        <span class="d-p-n">\
            <div id="dialog-message" title="Notice Message !"></div>\
        </span>\
        ');
    }
    if(option.type==="notice"){
        //if(option.icon===null)
            //option.icon="<img class='p-a t-8 l-8' src='"+base_url+"libraries/ui/themes/base/images/dialog_warning.png'/>";
        option.title="<font class='p-l-20'>"+(option.title===null?"Thông báo !":option.title)+"</font>";
    }else if(option.type==="error"){
        //if(option.icon===null)
            //option.icon="<img class='p-a t-8 l-8' src='"+base_url+"libraries/ui/themes/base/images/dialog_error.png'/>";
        option.title="<font class='p-l-20 erc'>"+(option.title===null?"Thông báo lỗi !":option.title)+"</font>";
    }else{
        option.icon='';
        option.title="<font class='p-l-20'>"+(option.title===null?"Thông báo !":option.title)+"</font>";
    }
    
    if(option.message===null || option.message ===undefined){
        //$("#dialog-message").html("Message type must be String or HTML DOM Element !");
        option.uidialog=$("#dialog-message");
    }else if(typeof(option.message)==="object"){
        option.uidialog=option.message;
    }else if(typeof(option.message)==="string"){
        $("#dialog-message").html(option.message);
        option.uidialog=$("#dialog-message");
    }else{
        $("#dialog-message").html("Message type must be String or HTML DOM element !");
        option.uidialog=$("#dialog-message");
    }
    
    return {
        open:function(str){
            if(str)$("#dialog-message").html('<div class="p-20">'+str+'<div class="t-a-c p-t-40"><button onclick="bckdialog().close()" class="classic-button">Đồng ý</button></div></div>');
            option.uidialog.dialog({
                modal           : true,
                //autoOpen        : option.autoOpen,
                minwidth        : option.minwidth,
                dialogClass     :'b-s-d-32 pie',
                resizable       : false,
                width           :'auto',
                title           : option.icon + option.title,
                closeOnEscape   : true,
                //hide                : "explode",
                buttons         : {
                },
                open           : function(event, ui) { 
                    if (option.onopen && typeof(option.onopen) === "function") { 
                        try{
                            option.onopen();           
                        }catch(e){}
                    } 
                    $(event.target).dialog('widget')
                    .css({ position: 'fixed' })
                    .position({ my: 'center', at: 'center', of: window });
                },
                close           : function(event, ui) { 
                    if (option.onclose && typeof(option.onclose) === "function") { 
                        try{
                            option.onclose();           
                        }catch(e){}
                    }
                },
                create          :function(){
                    if(option.hideclose===true){
                        $(this).closest(".ui-dialog")
                        .find(".ui-dialog-titlebar-close")
                        .hide();
                    }
                }
            }); 
        },
        close:function(){
            option.uidialog.dialog('close');
        }
    };
}
function backend(_option){
    var option={
        url         :   null,
        data        :   null,
        datatype    :   "json",
        proc_start  :   null,
        proc_end    :   null,
        callback    :   null
    };
    if(_option) $.each(_option,function(index,value){
        option[index]=value;
    });
    if(option.datatype.toUpperCase()==='JSON'){
        option.data.ajaxtype='json';
    }
    return {
        call:function(_url,_data,_callback){
            if(isrunning===true)return;
            if(_url)    option.url=_url;
            if(_data)   option.data=_data;
            if(_callback)   option.callback=_callback;
            if(typeof(option.proc_start)==='function')option.proc_start();
            jQuery.ajax({
                type:"POST", 
                //cache:false,
                //timeout:10000,
                data:option.data, 
                dataType:option.datatype, 
                url:option.url, 
                success: function (data_result){
                    isrunning=false;
                    if(typeof(option.callback)==='function')option.callback(data_result);
                    if(typeof(option.proc_end)==='function')option.proc_end();
                },
                error: function (xhr, ajaxOptions, thrownError){
                    isrunning=false;
                    if(typeof(option.proc_end)==='function')option.proc_end();
                    new bckdialog({type:'error'}).open("Sorry. Your request could not be completed.<br/> Please check your input data and try again.");
                    //uiMessage("Sorry. Your request could not be completed.<br/> Please check your input data and try again.");
                    console.log(
                        "Status:"+xhr.status+
                        "\nThrownError:"+thrownError+
                        "\nURL:"+option.url+"\n↵ Error"
                    );
                }
            });
        }
    };
}
function BrowseServer( elementid )
{
    if($('#'+elementid).length===0)uiMessage("Input element is not exist.");
    try{
        window.KCFinder = {};
        window.KCFinder.callBack = function(url) { 
            window.KCFinder = null;
            $('#'+elementid).val(url);
        };
        window.open( base_url+'syslib/kcfinder/browse.php?lang=vi', 'kcfinder_textbox',
            'status=0, toolbar=0, location=0, menubar=0, directories=0, resizable=1, scrollbars=0, width=700, height=500'
            );
    }catch(e){
        //uiMessage(e.message);
        //console.log("JSON Error:"+e.message+"\n↵ Error");
        bckdialog({type:'error'}).open(e.message);
    }
}
function addRedactorEditor(Element){
    Element.redactor({
        //air: true,
        //wym: true,
        buttons: ['html','formatting', '|', 'bold', 'italic', 'deleted', '|','unorderedlist','orderedlist','outdent','indent','alignment','|','video','link','|','fontcolor','backcolor']
        ,
        plugins: ['advanced']
    });
}
function addEditorContent(ElementID,height){
    try{
        tinyMCE.init({// <![CDATA[
            // General options
//            document_base_url : "/",
//            relative_urls : true,
//            remove_script_host : true,
            language	: 'en',
            mode        : "exact",
            elements    : ElementID,
            body_class  : 'my-content',
            theme       : "advanced",
            //skin : "o2k7",
			//skin_variant : "silver",
			//plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
            plugins     : "safari,pagebreak,autolink,lists,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,media,paste,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
            noneditable_regexp: /\[\[[^\]]+\]\]/g,
            height      :height?height:500,
            width       : "100%",
            // Theme options
            theme_advanced_buttons1 : "newdocument,undo,redo,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,outdent,indent,|,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "forecolor,backcolor,styleprops,|,blockquote,link,unlink,|,hr,sub,sup,charmap,emotions,iespell,image,media,|,template,|,removeformat,visualaid,cleanup,help,code,fullscreen",
            theme_advanced_buttons3 : "tablecontrols",
            theme_advanced_buttons4 : "",
            theme_advanced_toolbar_location     : "top",
            theme_advanced_toolbar_align        : "left",
            theme_advanced_statusbar_location   : "bottom",
            //theme_advanced_resizing : true,

            // Example content CSS (should be your site CSS)
            content_css : base_url?base_url+"libraries/typography/typography.css":null,
            template_templates:[
                {
                        title       : "Backend Tabs Editor",
                        src         : base_url+"backend/template/tab.html",
                        description : "Backend Tabs Editor"
                },
                {
                        title       : "Win Tabs Editor",
                        src         : base_url+"backend/template/wintab.html",
                        description : "Win Tabs Editor"
                }
            ],
            // Drop lists for link/image/media/template dialogs
            //template_external_list_url : "js/template_list.js",
            //external_link_list_url : "js/link_list.js",
            //external_image_list_url : "js/image_list.js",
            //media_external_list_url : "js/media_list.js",

            file_browser_callback: 'openKCFinder',
            setup :function(ed) {
                //ed.onInit.add(function(ed, evt) {
                //    tinymce.ScriptLoader.add(tinyMCE.baseURL+"/../script/mcontent.jquery.js");
                //    tinymce.ScriptLoader.loadQueue();
                //});
            }// ]]>
        });
    }catch(e){
        uiMessage(e.message);
    }
    
}
function openKCFinder(field_name, url, type, win) {
    try{
        tinyMCE.activeEditor.windowManager.open({
            file: base_url+'libraries/kcfinder/browse.php?opener=tinymce&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            resizable: "yes",
            inline: true,
            close_previous: "no",
            popup_css: false
        }, {
            window: win,
            input: field_name
        });
    }catch(e){
        uiMessage(e.message);
    }
    return false;
}
function proc_sart(elem){
    $(".i-l-d",$(elem))
        .addClass("b-g-c-w-50")
        .show();
    
}
function proc_end(elem){
    $(".i-l-d",$(elem))
        .removeClass("b-g-c-w-50")
        .fadeOut(500);
    
}
function islc(opt){
    try{
        $(opt.element).multiselect({
            multiple        : opt.multi     ? opt.multi     : false,
            header          : opt.header    ? opt.header    : opt.filter ? opt.filter : false,
            noneSelectedText: opt.title     ? opt.title     : (opt.multi?"Select an Option":"Select a Option"),
            selectedList    : opt.num       ? opt.num       : 1,
            menuwidth       : opt.menuwidth ? opt.menuwidth : null,
            minWidth        : opt.minwidth  ? opt.minwidth  : 'auto',//$(opt.element).parent().width(),
            height          : opt.height    ? opt.height    : 'auto',
            classes         : opt.aclass    ? opt.aclass    : null,
            style           : opt.style     ? opt.style     : null,
            biz             : opt.biz       ? opt.biz       : null,
            click           : opt.click     ? opt.click     : null,
            beforeclose     : function(){
                try{
                    if($(this).hasClass("validate")){
                        if($(this).show().validationEngine('validate')){
                            $(this).multiselect("option",{classes:opt.multi?'_mul erb':null});
                        }else{
                            $(this).multiselect("option",{classes:opt.multi?'_mul':null});
                        }
                        $(this).hide();
                    }
                }catch(e){uiMessage(e.message);}
            }
        });
        if(opt.filter) $(opt.element).multiselectfilter();
    }catch(e){uiMessage(e.message);}
}