/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


(function($)
{
    $(document).ready(function()
    {
        $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {
                $('#autooffice').hide();
            },
            complete: function() {
                //$('#loading').hide();
                $('#autooffice').show();
            },
            success: function() {
                //$('#loading').hide();
                $('#autooffice').show();
            }
        });
        var $container = $("#autooffice");
            $container.load("/auth/paymentOffice/ajaxAutoload");
            var refreshId = setTimeout(function()
            {
                $container.load('/auth/paymentOffice/ajaxAutoload');
            }, 600000);//10 phut request
    });
})(jQuery);