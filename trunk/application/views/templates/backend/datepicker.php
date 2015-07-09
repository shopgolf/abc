<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script>
$(function() {
    var $datepicker1 = $( "#datepicker1" );
        $datepicker1.datepicker({ dateFormat: 'dd-mm-yy' }).val();
});

$(function() {
    var $datepicker2 = $( "#datepicker2" );
        $datepicker2.datepicker({ dateFormat: 'dd-mm-yy' }).val();
});
</script>