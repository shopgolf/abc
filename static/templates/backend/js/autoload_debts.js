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
                $('#cong-no').hide();
            },
            complete: function() {
                //$('#loading').hide();
                $('#cong-no').show();
            },
            success: function() {
                //$('#loading').hide();
                $('#cong-no').show();
            }
        });
        var $container = $("#cong-no");
            $container.load("/auth/paymentDebts/ajaxAutoload");
            var refreshId = setTimeout(function()
            {
                $container.load('/auth/paymentDebts/ajaxAutoload');
            }, 600000);//10 phut request
    });
})(jQuery);