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
                $('#autobank').hide();
            },
            complete: function() {
                //$('#loading').hide();
                $('#autobank').show();
            },
            success: function() {
                //$('#loading').hide();
                $('#autobank').show();
            }
        });
        var $container = $("#autobank");
            $container.load("/auth/paymentBank/ajaxAutoload");
            var refreshId = setTimeout(function()
            {
                $container.load('/auth/paymentBank/ajaxAutoload');
            }, 600000);//10 phut request
    });
})(jQuery);