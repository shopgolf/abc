/*
common.js for js page home bathiendia
code by phuc
*/
//Js slider cuoi trang
$(window).load(function() {
    $("#flexiselDemo1").flexisel({
        clone:false
    });
    $("#flexiselDemo2").flexisel({
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3
            }
        }
    });

    $("#flexiselDemo3").flexisel({
        visibleItems: 5,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3
            }
        }
    });

    $("#flexiselDemo4").flexisel({
        clone:false
    });
    
});
/*
 * tad jquery
 */
$(window).load(function() {
        $('.blueberry').blueberry({
                interval: 5000,
                duration: 1000,
                lineheight: 0
        });

        $("#tabber>.tabs>div").hide();
        $("#tabber>.tabs>div:first").show();
        $("#tabber>.tablist>li:first").addClass("active");
        $("#tabber>.tablist>li>a").click(function(){
                $('#tabber>.tablist>li').removeClass("active");
                $(this).parent().addClass("active");

                var current = $(this).attr("href");

                $("#tabber>.tabs>div:visible").fadeOut("fast",function(){
                        $(current).fadeIn("fast");
/*			$("#tabber>.tabs").animate({"height":$(current).outerHeight()}); */
                });
                return false;
        });
});