let is_desktop;

const init = () => {
  $(() => {
    set_client_type();
    animate();
  });
};

const set_client_type = () => {
  is_desktop = $(window).width() >= 992;
  $(window).on("resize", () => {
    is_desktop = $(window).width() >= 992;
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

init();
