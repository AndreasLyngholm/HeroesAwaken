// remap jQuery to $
(function($){})(window.jQuery);

$(document).ready(function (){

  /*
    START STRICT MODE
  */
  'use strict';

/*-----------------------------------------------------------------------------------*/
/*  FOOTER COPYRIGHT YEAR
/*-----------------------------------------------------------------------------------*/
  var currentYear = (new Date).getFullYear();
  $('span.date').text(currentYear);

/*-----------------------------------------------------------------------------------*/
/*  ADD ACTIVE CLASS TO MAIN NAVIGATION ITEMS BASED ON URL
/*-----------------------------------------------------------------------------------*/
  $(function() {
    var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
    $("#main-nav ul li a").each(function(){
      if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
      $(this).addClass("active");
    });
  });

/*-----------------------------------------------------------------------------------*/
/*  RESPONSIVE NAVIGATION
/*-----------------------------------------------------------------------------------*/
  $('#main-nav ul').slicknav({
    prependTo:'.mobile-menu',
    label: '<img src="assets/images/icons/burger.svg"/>',
    //label: 'menu',
    closeOnClick: true
  });

/*-----------------------------------------------------------------------------------*/
/*  HOMEPAGE TOP SLIDER & INNER PAGES SLIDER
/*-----------------------------------------------------------------------------------*/
  $('#home-slider, .inner-slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    fade: true,
    autoplay: true,
    autoplaySpeed: 5000
  });

/*-----------------------------------------------------------------------------------*/
/*  GAMES PAGE LITEBOX (GALLERY)
/*-----------------------------------------------------------------------------------*/
  $('.game-gallery').liteBox({
    revealSpeed: 400,
    background: 'rgba(0,0,0,.8)',
    overlayClose: true,
    escKey: true,
    navKey: true,
    errorMessage: 'Error loading content.'
  });

});

/*-----------------------------------------------------------------------------------*/
/*  CONTACT FORM
/*-----------------------------------------------------------------------------------*/
$(document).ready(function (){
  $("#ajax-contact-form").submit(function() {
    var str = $(this).serialize();

    $.ajax({
      type: "POST",
      url: "includes/contact-process.php",
      data: str,
      success: function(msg) {
          // Message Sent? Show the 'Thank You' message
          if(msg == 'OK') {
            result = '<div class="notification_ok">Your message has been sent. Thank you!</div>';
          } else {
            result = msg;
          }
          $('#note').html(result);
      }
    });
    return false;
  });
});
