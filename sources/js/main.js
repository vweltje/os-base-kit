"use_strict";

const init = () => {
  define_globals();
  $(() => {
    // Document ready
  });
};

const define_globals = () => {
  window.breakpoint = {
    extra_small: 450,
    small: 768,
    medium: 992,
    large: 1200,
    extra_large: 1440
  };
};

init();
