jQuery(document).ready(function($) {

  $('span.size-text.s-1').click(function(event) {

    $('.change-size-box span').removeClass('active');
    $(this).addClass('active');

    $('body').addClass('size-s');

    $('body').removeClass('size-m');
    $('body').removeClass('size-l');
  });
  $('span.size-text.s-2').click(function(event) {
      $('.change-size-box span').removeClass('active');
      $(this).addClass('active');

    $('body').addClass('size-m');

    $('body').removeClass('size-s');
    $('body').removeClass('size-l');
  });
  $('span.size-text.s-3').click(function(event) {
      $('.change-size-box span').removeClass('active');
      $(this).addClass('active');

    $('body').addClass('size-l');

    $('body').removeClass('size-m');
    $('body').removeClass('size-s');
  });


  $('#toggle-nav-left').click(function() {
    $(this).toggleClass('is-active');
    $('.nav-left-content').toggleClass('toggle-nav-left');
// $('body').toggleClass('locked');

  });


  $(window).on('scroll',function(){
  stop = Math.round($(window).scrollTop());
  if (stop > 300) {
  $('#toggle-nav-left').addClass('fixed');
  } else {
  $('#toggle-nav-left').removeClass('fixed');
  }
  });



      let isActive = false;

      $(".toggle-mnu").click(function() {
        if (isActive) {
          $('.menu-mobile-box').removeClass("active");
          $('.menu-mobile-box').addClass("de-active");
          isActive = false;
        } else {
          $('.menu-mobile-box').removeClass("de-active");
          $('.menu-mobile-box').addClass("active");
          isActive = true;
        }
      });

      $('.toggle-mnu').on('click', function() {
        // $(this).toggleClass('on');
        $('.toggle-mnu').toggleClass('on');
        $('.mobile-box').toggleClass('on');
      });

    //   $('.search-form li.category-item input[type="checkbox"]').click(function(e){
    //     if($(this).is(":checked")) {
    //         $('.search-form li.category-item label').addClass("checked");
    //     } else {
    //         $('.search-form li.category-item label').removeClass("checked");
    //     }
    // });
          var scroll = 1;
          $(window).scroll(function(event){
              var moved = $(this).scrollTop();
              if (moved > scroll){
                 $('.mobile-box').addClass('smaller')
              }

            if (moved === 0) {
               $('.mobile-box').removeClass('smaller')
            }
            //  if (moved > scroll){
            //    //on  UP scroll event
            //   }
              scroll = moved;
          });

});
