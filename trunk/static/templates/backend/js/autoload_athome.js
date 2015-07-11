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
                $('#autoathome').hide();
            },
            complete: function() {
                //$('#loading').hide();
                $('#autoathome').show();
            },
            success: function() {
                //$('#loading').hide();
                $('#autoathome').show();
            }
        });
        var $container = $("#autoathome");
            $container.load("/auth/paymentAtHome/ajaxAutoload");
            var refreshId = setTimeout(function()
            {
                $container.load('/auth/paymentAtHome/ajaxAutoload');
            }, 600000);//10 phut request
    });
})(jQuery);