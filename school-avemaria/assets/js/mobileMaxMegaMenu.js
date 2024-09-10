jQuery(document).ready(function ($) {
  $(".mega-menu").on("after_mega_menu_init", function () {
    /**
     * Remove on click listener of a tags
     * so click on the link redirects to page
     * and click on arrow opens submenu
     */
    $(".main-navigation .mega-menu-wrap .mega-menu-item-has-children a").off(
      "click"
    );

    /**
     * hide mobile menu on click on search
     */
    $("li.mega-menu-item .header-search").on("click", function () {
      if($("#mega-menu-wrap-menu-1 .mega-menu-toggle").hasClass("mega-menu-open")){
        $("#mega-menu-wrap-menu-1 .mega-menu-toggle").removeClass("mega-menu-open");
      }
    });
    /**
     * hide mobile menu on click on close menu button
     */
    $("li.mega-menu-item .close-mobile").on("click", function () {
      if($("#mega-menu-wrap-menu-1 .mega-menu-toggle").hasClass("mega-menu-open")){
        $("#mega-menu-wrap-menu-1 .mega-menu-toggle").removeClass("mega-menu-open");
      }
    });
  });
});
