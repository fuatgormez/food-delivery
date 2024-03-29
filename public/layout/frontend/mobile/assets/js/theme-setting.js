(function ($) {
  "use strict";
  /*========================
     Dark local storage setting js
      ==========================*/
  $("#darkButton").change(function () {
    if ($(this).is(":checked")) {
      $("body").addClass("dark");
      $("#change-link").attr(
        "href",
        "./public/layout/frontend/mobile/assets/css/dark.css"
      );
      localStorage.setItem("body", "dark");
      localStorage.setItem(
        "layoutcss",
        "./public/layout/frontend/mobile/assets/css/dark.css"
      );
    } else {
      $("body").removeClass("dark");
      $("#change-link").attr(
        "href",
        "./public/layout/frontend/mobile/assets/css/style.css"
      );
      localStorage.setItem("body", "");
      localStorage.setItem(
        "layoutcss",
        "./public/layout/frontend/mobile/assets/css/style.css"
      );
    }
  });

  $("body").attr("class", localStorage.getItem("body"));
  $("#change-link").attr(
    "href",
    localStorage.getItem("layoutcss")
      ? localStorage.getItem("layoutcss")
      : "./public/layout/frontend/mobile/assets/css/style.css"
  );
  localStorage.getItem("body") ? $("#darkButton").attr("checked", true) : "";

  /*========================
     RTL local storage setting js
     ==========================*/
  $("#rtlButton").change(function () {
    if ($(this).is(":checked")) {
      $("html").attr("dir", "rtl");
      $("#rtl-link").attr(
        "href",
        "./public/layout/frontend/mobile/assets/css/vendors/bootstrap.rtl.css"
      );
      localStorage.setItem(
        "rtlcss",
        "./public/layout/frontend/mobile/assets/css/vendors/bootstrap.rtl.css"
      );
      localStorage.setItem("dir", "rtl");
    } else {
      $("html").attr("dir", "");
      localStorage.setItem("dir", "");
      $("#rtl-link").attr(
        "href",
        "./public/layout/frontend/mobile/assets/css/vendors/bootstrap.css"
      );
      localStorage.setItem(
        "rtlcss",
        "./public/layout/frontend/mobile/assets/css/vendors/bootstrap.css"
      );
    }
  });
  $("html").attr("dir", localStorage.getItem("dir"));
  $("#rtl-link").attr(
    "href",
    localStorage.getItem("rtlcss")
      ? localStorage.getItem("rtlcss")
      : "./public/layout/frontend/mobile/assets/css/vendors/bootstrap.css"
  );
  localStorage.getItem("dir") ? $("#rtlButton").attr("checked", true) : "";
})(jQuery);
