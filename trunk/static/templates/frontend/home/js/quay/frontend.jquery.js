$(document).ready(function() {
    
        $('#btn_wheel').click(function() {
            //alert($('#totalactive').text());
            
            var total = parseInt($('#totalactive').text());
            var active = parseInt($('#numactive').text());
            if (($('#totalactive').length > 0) && ($('#numactive').length > 0)) {
        
                //if (active < total) {
                    var length = 12;
                    $('#mask').show();
                    //onClick(num, length);
                    
					
					jQuery.ajax({
						type:"POST", 
						data: {}, 
						dataType:'JSON', 
						url: '/excution/wheeling', 
						success: function (rs){					
							isrunning=false;
							try {
                                if (rs.result >= 0) {
                                    onClick(rs.result, length, rs.message, rs);
                                } else {
                                    //bckdialog().open(rs.message);
									alert(rs.message);
                                }
                                $('#numactive').html(rs.active);
                                console.log(rs);
                            } catch (e) {
                                //bckdialog().open("Loi he thong");
								alert('Lỗi hệ thống');
                            }
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
            } else {
                
                alert('Vui lòng chọn server và đăng nhập!');
            }
            
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
                    TYPE_GIFT = 2;
                    show_pp( rs_sv.image, rs_sv._name, name_user );
                }
                else if( num == 3 )
                {
                    alert('Bạn được 1 vỏ sò');
                }
                else
                {
                    alert('Chúc bạn mai mắn lần sau!');
                }
                $('#totalactive').html(rs_sv.amount);
            }
        });
    }
    rotation();
    
    return false;

}
function done() {
    $('#mask').hide();
    //-- show message
    //bckdialog().open(message);
	alert(message);
    //-- show history
    $("#histories").load('/excution/history');
}