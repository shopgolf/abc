/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
        $('#btn_wheel').click(function() {
            var total = parseInt($('#totalactive').text());
            var active = parseInt($('#numactive').text());
                //if (active < total) {
                    var length = 12;
                    $('#mask').show();
                    //onClick(num, length);
                        jQuery.ajax({
                                type:"POST", 
                                data: {}, 
                                dataType:'JSON', 
                                url: '/quay/excution', 
                                success: function (data){					
                                        isrunning=false;
                                        onClick(data, length, 'Tu thuy tinh', 2);
                                },
                                error: function (xhr, ajaxOptions, thrownError){
                                        isrunning=false;
                                        alert("Sorry. Your request could not be completed.<br/> Please check your input data and try again.");
                                        console.log(
                                                "Status:"+xhr.status+
                                                "\nThrownError:"+thrownError
                                        );
                                }
                        });
                //}
            return false;
        });
});
var message = '';
function onClick(num, length, mess, rs_sv) {
    message = mess;
    var aMax = (num * 100) / length;
    var bMax = (aMax * 360) / 100;
    var aMin = ((num - 1) * 100) / length;
    var bMin = (aMin * 360) / 100;
    //var r = 360 - (Math.floor(Math.random() * (bMax - bMin + 1) + bMin));
    var r = 360 - ((bMax + bMin) / 2);
    r = r + (2 * 360) + 15 ;

    var rotation = function() {
        $("#wheel").rotate({
            angle: 0,
            animateTo: r,
            easing: $.easing.easeInOutBack,
            duration: 10000,
            callback: function(){
                if( num != 2 && num != 0 && num != 3 )
                {
                    ID_GIFT = rs_sv._id;
                    TYPE_GIFT = 5;
                    console.log(num);
                }
                else if( num == 3 )
                {
                    alert('Bạn được 1 vỏ sò');
                }
                else
                {
                    alert('Chúc bạn may mắn lần sau!');
                }
                $('#totalactive').html(rs_sv.amount);
            }
        });
    }
    rotation();
    return false;
}