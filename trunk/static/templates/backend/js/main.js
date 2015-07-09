/**
 *  Main Javascript
 *
 * @package XGO CMS v3.0
 * @subpackage main
 * @link http://sunsoft.vn
 */

(jQuery)(function(){
	
/**************************************************BACKEND*/
	/**
	 *md5 hash password before send
	 */
	var elementFormLogin = (jQuery)('form[formType=hashPassword]');
	elementFormLogin.submit(function(){
		var elementPassword   = (jQuery)('input[name=password]');		
		if(elementPassword.val()==""){
			return true;
		}
		
		try {
			if(action=='updateuser'){
				var elementRePassword = (jQuery)('input[name=re_password]');
				if(typeof elementRePassword !== undefined){
					if(elementRePassword.val()!=""){
						elementRePassword.val(MD5(elementRePassword.val()));
					}
				}
			}	
			if(elementPassword.val()!=""){
				elementPassword.val(MD5(elementPassword.val()));
			}
			return true;
		}catch(e){
			alert(language.hash_password_failed);
			return false;
		}
	});
	
	try{
		if(published!==""){
		    (jQuery)('#datetimepicker').datetimepicker({
		        language: 'en',
		        pick12HourFormat: true
		     }).ready(function(){
		    	 (jQuery)("input[name=published]").val(published);
		     });
		}
	}catch(e){
		
	}
    (jQuery)('.checkbox_button').hide();
    // add button
    (jQuery)('.checkbox_button').after(function(){
        if ((jQuery)(this).is(':checked')) {
            return '<a href="#" class="checkbox_checked checkbox_toggle" ref="'+(jQuery)(this).attr('id')+'"></a>';
        }else{
            return '<a href="#" class="checkbox_unchecked checkbox_toggle" ref="'+(jQuery)(this).attr('id')+'"></a>';
        }
    });
    
    // event click button 
    (jQuery)('.checkbox_toggle').click(function(e) {
        e.preventDefault();
        var checkboxID = (jQuery)(this).attr('ref');
        var _obj = (jQuery)(this);
        var checkbox = (jQuery)('#'+checkboxID);
        var form_data = 'group='+groupId+'&value='+checkboxID+'&checked='+!checkbox.is(':checked');
        if (checkbox.is(':checked')) {
            (jQuery).ajax({
                url: baseUrl+'auth/group/right',
                type: 'POST',
                data: form_data,
                dataType: 'html',
                error: function(){
                    alert('error ajax post');
                },
                success: function(html){
                    if(html == 'OK'){
                        checkbox.removeAttr('checked');
                        _obj.removeClass('checkbox_checked');
                        _obj.addClass('checkbox_unchecked');
                    }else{
                        alert(html);
                    }
                }
            });
        }else{
            (jQuery).ajax({
         	   url: baseUrl+'auth/group/right',
                type: 'POST',
                data: form_data,
                dataType: 'html',
                error: function(){
                    alert('error ajax post');
                },
                success: function(html){
                    if(html == 'OK'){
                        checkbox.attr('checked','checked');
                        _obj.removeClass('checkbox_unchecked');
                        _obj.addClass('checkbox_checked');
                    }else{
                        alert(html);
                    }
                }
            });
        }
    });
});

var addEventTab = function(element){
	//console.log(element.parent().index()-1);
	//console.log(element.parent().siblings().last().index());
	//console.log(element.parent().index()+1==element.parent().siblings().last().index() || element.parent().siblings().last().index()=='-1');
	if(element.parent().index()-1==element.parent().siblings().last().index()
	|| element.parent().siblings().last().index()=='-1'){
		element.parent().parent().append(htmlTab);
		tinymceFull(element.parent().siblings().last().children('input.tinymcefull'));
	}
}

var removeEventTab = function(element){
	element.parent().remove();
	return false;
}
/* End of file main.js */
/* Location: ./data/templates/backend/js/main.js */