let is_desktop;

const init = () => {
  $(() => {
    set_client_type();
    search_box();
    animate();
    mobile_button();
  });
};

const set_client_type = () => {
  is_desktop = $(window).width() >= 992;
  $(window).on("resize", () => {
    is_desktop = $(window).width() >= 992;
  });
};

const search_box = () => {
  $("#search-button").on("click", () => {
    $("#search-box")
      .addClass("active")
      .animate({ opacity: "1" }, 300);
    $("#search-box")
      .find('input[type="search"]')
      .focus();
  });
  $("#search-box")
    .find('input[type="search"]')
    .on("focusout", () => {
      if (!is_desktop) return;
      $("#search-box").animate({ opacity: "0" }, 300);
      setTimeout(() => {
        $("#search-box").removeClass("active");
      }, 400);
    });
};

const animate = () => {
  const check_scroll = () => {
    if (!is_desktop) return;
    if ($(window).scrollTop() > 20) $("#menu").addClass("scrolled");
    else $("#menu").removeClass("scrolled");
  };
  $(window).on("scroll", check_scroll);
  check_scroll();
};

const mobile_button = () => {
  $(".burger").on("click", () => {
    if (is_desktop) return;
    $("#menu").toggleClass("active");
    if ($("#menu").hasClass("active")) {
      $("body").css("overflow", "hidden");
    } else {
      $("body").removeAttr("style");
    }
  });
};

init();
