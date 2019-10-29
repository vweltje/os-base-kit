(function _accordion($) {
  $(".accordion .accordion-item .accordion-item-head").on("click", function() {
    const item = this;
    $(item)
      .closest(".accordion")
      .find(".accordion-item .accordion-item-head svg #vertical")
      .stop()
      .fadeIn()
      .closest(".accordion-item")
      .find("> div")
      .stop()
      .slideUp();
    if (
      !$(item)
        .find("+ div")
        .is(":visible")
    ) {
      $(item)
        .find("svg #vertical")
        .stop()
        .fadeOut();
    }
    $(item)
      .find("+ div")
      .stop()
      .slideToggle("slow", "swing", function() {
        let top = $(item).offset().top;
        let scroll = $(window).scrollTop() + $("#menu").height() + 20;
        if (top < scroll) {
          $("html, body").animate(
            {
              scrollTop: top - ($("#menu").height() + 10)
            },
            "slow"
          );
        }
      });
  });
})(jQuery);
