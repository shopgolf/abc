(function($)
{
    $(document).ready(function()
    {
        $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {
                $('#notice').hide();
                $('#loading').show();
            },
            complete: function() {
                $('#loading').hide();
                $('#notice').show();
            },
            success: function() {
                $('#loading').hide();
                $('#notice').show();
            }
        });
        var $container = $("#notice");
        $container.load("/notice");
        var refreshId = setInterval(function()
        {
            $container.load('/notice');
        }, 7200000);//2h refesh 36 000 000 000
    });
})(jQuery);