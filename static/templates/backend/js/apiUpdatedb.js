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
                //$('#notice').hide();
            },
            complete: function() {
                //$('#loading').hide();
                $('#api_database').show();
            },
            success: function() {
                //$('#loading').hide();
                $('#api_database').show();
            }
        });
        var $container = $("#api_database");
            var refreshId = setInterval(function()
            {
                $container.load('apiUpdateDb');
            }, 7200000);//28800000
    });
})(jQuery);