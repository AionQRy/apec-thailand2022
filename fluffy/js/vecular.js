function addClass(e,l){var elements=document.querySelectorAll(e);for(var s=0;s<elements.length;s++)elements[s].classList.add(l)}function removeClass(e,l){var elements=document.querySelectorAll(e);for(var s=0;s<elements.length;s++)elements[s].classList.remove(l)}

document.addEventListener(
  "click",
  function (event) {

    // Mobile Toggle
    if (event.target.closest("#toggle-main-menu")) {
      if (!event.target.classList.contains("is-active")) {
          addClass("#toggle-main-menu,#mobile_menu_wrap,.overlay_menu_m", "is-active");
      }
    }

    if (event.target.closest("#close-mobile-menu,.overlay_menu_m")) {
      removeClass("#toggle-main-menu,#mobile_menu_wrap,.overlay_menu_m", "is-active");
    }




    // Sub menu Toggle
    // if (event.target.closest(".wrap-toggle-mobile")) {
    //
    //   if (event.target.parentNode.parentNode.classList.contains(".menu-item-has-children")) {
    //     event.target.parent().add("is-active-mobile");
    //
    //   }
    //   else {
    //     event.target.parent().classList.remove("is-active-mobile");
    //
    //   }
    // }

    // if (event.target.closest("#close-mobile-menu")) {
    //   removeClass("#toggle-main-menu,#mobile_menu_wrap,.overlay_menu_m", "is-active");
    // }
 //
 // if (event.target.closest(".wrap-toggle-mobile")) {
 //    event.target(this).parent().classList.toggle("is-active-mobile");
 //  }


  },
  false
);


jQuery(document).ready(function($) {

  $('.toggle-search svg').on('click', function() {
    $('.popup_search').addClass('active');
    $('.cancel-btn_search svg').addClass('active');
  });
  $('.cancel-btn_search svg').on('click', function() {
    $('.popup_search').removeClass('active');
    $('.cancel-btn_search svg').removeClass('active');
  });

  $('.wrap-toggle-mobile').click(function() {
  var parent_li = $(this).parent();
  parent_li.toggleClass('is-active-mobile');

  // $('.sub-menu').slideDown('400');


  });
});
