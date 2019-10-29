const init = () => {};

// Document ready
$(() => {
  init();
  $(".main-carousel").flickity({
    // options
    contain: true,
    prevNextButtons: true,
    pageDots: false,
    wrapAround: true
  });

  const carousel = $(".owl-carousel");
  carousel.owlCarousel({
    loop: true,
    center: true,
    responsive: {
      0: {
        items: 1
      },
      480: {
        items: 2
      },
      768: {
        items: 3
      }
    }
  });
  $(".owl-next").click(function() {
    carousel.trigger("next.owl.carousel");
  });
  $(".owl-previous").click(function() {
    carousel.trigger("prev.owl.carousel");
  });
});
