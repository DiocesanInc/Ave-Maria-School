/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
  window.onscroll = function () {
    stickyHeader();
  };
  let header = document.getElementById("masthead");
  let sticky = header.offsetTop;
  let hcl = header.classList;
  // let onScrollBgColor = header.dataset.onScrollColor;
  function stickyHeader() {
    if (window.pageYOffset > sticky) {
      hcl.add("sticky");
      hcl.remove("home-transparent-background-color");
    } else {
      hcl.remove("sticky");
      hcl.add("home-transparent-background-color");
    }
  }
})();
