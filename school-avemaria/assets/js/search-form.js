jQuery(document).ready(function ($) {
  document.addEventListener("click", function (e) {
    if (e.target.matches(".header-search")) {
      $(".search-form-overlay").fadeIn().find(".search-form").addClass("open");
      $("html, body").toggleClass("no-scroll");
      return;
    }
    if (
      e.target.matches(".close-search-form-button") ||
      e.target.matches(".search-form-overlay")
    ) {
      $(".search-form-overlay")
        .fadeOut()
        .find(".search-form")
        .removeClass("open");
      $("html, body").toggleClass("no-scroll");
      return;
    }
  });
});
