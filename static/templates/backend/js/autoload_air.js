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
                $('#autoair').hide();
            },
            complete: function() {
                //$('#loading').hide();
                $('#autoair').show();
            },
            success: function() {
                //$('#loading').hide();
                $('#autoair').show();
            }
        });
        var $container = $("#autoair");
            $container.load("/auth/paymentAir/ajaxAutoload");
            var refreshId = setTimeout(function()
            {
                $container.load('/auth/paymentAir/ajaxAutoload');
            }, 600000);//10 phut request
    });
})(jQuery);