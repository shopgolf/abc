$(document).ready(function() {
    $('.checkbox_button').hide();
    // add button
    $('.checkbox_button').after(function(){
        if ($(this).is(':checked')) {
            return '<a href="#" class="checkbox_checked checkbox_toggle" ref="'+$(this).attr('id')+'"></a>';
        }else{
            return '<a href="#" class="checkbox_unchecked checkbox_toggle" ref="'+$(this).attr('id')+'"></a>';
        }
    });
    // event click button 
    $('.checkbox_toggle').click(function(e) {
        e.preventDefault();
        var checkboxID = $(this).attr('ref');
        var checkbox = $('#'+checkboxID);
        if (checkbox.is(':checked')) {
            checkbox.removeAttr('checked');
            $(this).removeClass('checkbox_checked');
            $(this).addClass('checkbox_unchecked');
        }else{
            checkbox.attr('checked','checked');
            $(this).removeClass('checkbox_unchecked');
            $(this).addClass('checkbox_checked');
        }
    });
});