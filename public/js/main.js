$(document).ready(function(){
  $("#signin-form").hide(100);
   $( "#logins" ).addClass( "name" );
    $("#login").click(function(){
        $( "#registers" ).removeClass( "name" );
        $("#signin-form").hide(100);
        $("#login-form").show(200);
        $( "#logins" ).addClass( "name" );
    });
    $("#register").click(function(){
        $( "#logins" ).removeClass( "name" );
        $("#login-form").hide(100);
        $("#signin-form").show(200);
        $( "#registers" ).addClass( "name" );
    });
    $("#login-link").click(function(){
        $( "#registers" ).removeClass( "name" );
        $("#signin-form").hide(100);
        $("#login-form").show(200);
        $( "#logins" ).addClass( "name" );
    });
    $("#register-link").click(function(){
        $( "#logins" ).removeClass( "name" );
        $("#login-form").hide(100);
        $("#signin-form").show(200);
        $( "#registers" ).addClass( "name" );
    });


    $("#cloth").show();
    $("#food").hide();
    $("#elec").hide();
    $( "#ones" ).addClass( "but-foc" );
    $("#one").click(function(){

        $("#food").hide();
        $("#elec").hide();
        $("#cloth").show();

        $( "#twos" ).removeClass( "but-foc" );
        $( "#threes" ).removeClass( "but-foc" );
        $( "#ones" ).addClass( "but-foc" );

    });
    $("#two").click(function(){

        $("#cloth").hide();
        $("#elec").hide();
        $("#food").show();

        $( "#threes" ).removeClass( "but-foc" );
        $( "#ones" ).removeClass( "but-foc" );
        $( "#twos" ).addClass( "but-foc" );
    });
    $("#three").click(function(){

        $("#cloth").hide();
        $("#food").hide();
        $("#elec").show();

        $( "#ones" ).removeClass( "but-foc" );
        $( "#twos" ).removeClass( "but-foc" );
        $( "#threes" ).addClass( "but-foc" );

    });
    $("#detail").hide();
    $( "#detail-class" ).removeClass( "col-lg-3" );
    $( "#detail-class" ).addClass( "col-lg-8" );

    $( "#detail-class" ).removeClass( "col-md-3" );
    $( "#detail-class" ).addClass( "col-md-8" );

    $( "#detail-class" ).removeClass( "col-sm-5" );
    $( "#detail-class" ).addClass( "col-sm-12" );
    $("#show-detail").click(function(){
        $("#detail").toggle(100);
        $( "#detail-class" ).toggleClass( "col-lg-8" );
        $( "#detail-class" ).toggleClass( "col-lg-3" );

        $( "#detail-class" ).toggleClass( "col-md-8" );
        $( "#detail-class" ).toggleClass( "col-md-3" );

        $( "#detail-class" ).toggleClass( "col-sm-12" );
        $( "#detail-class" ).toggleClass( "col-sm-5" );

    });



    // if ( $(window).width() <= 568) {
    //     $('.dropright').removeClass('dropright');
    // }
    // else {
    //     $('.dropright').addClass('dropright');
    // }

    //Dialog Box
    // $('#dialog-close').click(function(){
    // 	alert('Thanks');
    //   $('.dialogbox').css('display', 'none');
    // });
    // var visit = getCookie("cookie");
    // if (visit == null) {
    //     $('.dialogbox').css('display', 'block');
    //     var expire = new Date();
    //     expire = new Date(expire.getTime() + 7776000000);
    //     document.cookie = "cookie=here; expires=" + expire;
    // }

    // function getCookie(c_name) {
    //     var c_value = document.cookie;
    //     var c_start = c_value.indexOf(" " + c_name + "=");
    //     if (c_start == -1) {
    //         c_start = c_value.indexOf(c_name + "=");
    //     }
    //     if (c_start == -1) {
    //         c_value = null;
    //     } else {
    //         c_start = c_value.indexOf("=", c_start) + 1;
    //         var c_end = c_value.indexOf(";", c_start);
    //         if (c_end == -1) {
    //             c_end = c_value.length;
    //         }
    //         c_value = unescape(c_value.substring(c_start, c_end));
    //     }
    //     return c_value;
    // }
});

// $(window).scroll(function(){
//     if ($(window).scrollTop() >= 600) {
//        /*$('#show-top').addClass('sticky');*/
//        $('#show').addClass('sticky');
//        $('#show').css({"background-color": "DodgerBlue"});

//     }
//     else {
//        $('#show').removeClass('sticky');

//     }
// });

$(document).ready(function() {

  // If the 'hide cookie is not set we show the message
  if (!readCookie('hide')) {
    $('.dialogbox').show();
    setTimeout(function(){
        $('.dialogbox').hide();
        createCookie('hide', true, 1)
        return false;
    }, 5000);
  }

  // Add the event that closes the popup and sets the cookie that tells us to
  // not show it again until one day has passed.
  $('#dialog-close').click(function() {
    $('.dialogbox').hide();
    createCookie('hide', true, 1)
    return false;
  });

});

// ---
// And some generic cookie logic
// ---
function createCookie(name,value,days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
  }
  else var expires = "";
  document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}

function eraseCookie(name) {
  createCookie(name,"",-1);
}
