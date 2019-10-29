function create_cookie(name, value, days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    var expires = "; expires=" + date.toGMTString();
  } else {
    var expires = "";
  }
  document.cookie = name + "=" + value + expires + "; path=/";
}

$(function() {
  $("#cookie-notice-agree").on("click", function(e) {
    e.preventDefault();
    create_cookie("os-base-theme-cookie-statement", "accepted", 365);
    $("#cookie-notice").slideUp({
      complete: function() {
        $("#cookie-notice").remove();
      }
    });
  });
});
