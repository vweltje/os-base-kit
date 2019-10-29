let is_desktop;
let is_mobile;

const init = () => {
  $(() => {
    console.log("grid");
    if (!$(".grid").length) return;
    set_client_type();
    grid();
  });
};

const set_client_type = () => {
  is_desktop = $(window).width() >= 992;
  is_mobile = $(window).width() >= 768;
  $(window).on("resize", () => {
    is_desktop = $(window).width() >= 992;
    is_mobile = $(window).width() >= 768;
  });
};

const grid = () => {
  $(".grid")
    .not(".employee-grid")
    .each((i, grid) => {
      const items_per_page = $(grid).data("items-per-page");
      let current_page = $(grid).data("current-page");
      set_visivle_items(grid, items_per_page, current_page);
      set_height(grid);
      grid_resize(grid);
      load_more_button(grid, items_per_page, current_page);
    });
};

const set_visivle_items = (grid, items_per_page, current_page) => {
  const items_to_show = items_per_page * current_page;
  $(grid)
    .find(".post-card")
    .each((i, post_card) => {
      const child_number = i + 1;
      if (child_number <= items_to_show) {
        $(post_card).removeClass("hidden");
      } else {
        return false; // break $.each
      }
    });
};

const set_height = grid => {
  let number_visible_items = $(grid)
    .find(".post-card")
    .not(".fixed-grid-item")
    .not(".hidden").length;
  const post_card_height = $(grid)
      .find(".post-card:first-of-type")
      .height(),
    post_card_width = $(grid)
      .find(".post-card:first-of-type")
      .width(),
    cards_per_row = Math.floor($(grid).width() / post_card_width),
    fixed_grid_item = $(grid).find(".fixed-grid-item");
  number_visible_items += get_fixed_item_card_size(
    fixed_grid_item,
    post_card_width,
    post_card_height
  );
  const number_unfinished_row_cards = number_visible_items % cards_per_row;
  let row_count = number_visible_items / cards_per_row;
  if (number_unfinished_row_cards > 0) row_count = Math.floor(row_count) + 1;
  const total_gap_size = get_gap_size(
    grid,
    cards_per_row,
    number_visible_items,
    post_card_height,
    row_count
  );
  const total_height = row_count * post_card_height + total_gap_size;
  $(grid).css("height", total_height);
};

const get_fixed_item_card_size = (
  fixed_grid_item,
  post_card_width,
  post_card_height
) => {
  if (!$(fixed_grid_item).length) return 0;
  const fixed_grid_item_width = $(fixed_grid_item).width(),
    fixed_grid_item_height = $(fixed_grid_item).height(),
    fixed_item_rows = Math.floor(fixed_grid_item_width / post_card_width),
    fixed_item_colums = Math.floor(fixed_grid_item_height / post_card_height);
  return fixed_item_rows * fixed_item_colums;
};

const get_gap_size = (
  grid,
  cards_per_row,
  number_visible_items,
  post_card_height,
  row_count
) => {
  if (number_visible_items > cards_per_row) {
    const first_row_end_position =
        $(grid)
          .find(".post-card:first-of-type")
          .offset().top + post_card_height,
      second_row_start_position = $(grid)
        .find(".post-card:nth-child(" + (cards_per_row + 1) + ")")
        .offset().top,
      gap_count = row_count - 1,
      gap_size = second_row_start_position - first_row_end_position;
    return Math.ceil(gap_size * gap_count);
  }
  return 0;
};

const grid_resize = grid => {
  $(window).on("resize", () => {
    wait_for_final_event(() => {
      setTimeout(() => {
        set_height(grid);
      }, 300);
    });
  });
};

const wait_for_final_event = (() => {
  var timers = {};
  return (callback, ms, unique_id) => {
    if (!unique_id) unique_id = "Don't call this twice without a uniqueId";
    if (timers[unique_id]) clearTimeout(timers[unique_id]);
    timers[unique_id] = setTimeout(callback, ms);
  };
})();

const load_more_button = (grid, items_per_page, current_page) => {
  $(grid)
    .next(".grid-increase-limit")
    .on("click", () => {
      $(grid)
        .find(
          ".post-card:nth-child(n+" +
            current_page * items_per_page +
            "):nth-child(-n+" +
            (current_page + 1) * items_per_page +
            ")"
        )
        .removeClass("hidden");
      current_page++;
      $(grid).attr("data-current-page", current_page);
      if (
        !$(grid)
          .find(".post-card:last-of-type")
          .hasClass("hidden")
      ) {
        $(grid)
          .next(".grid-increase-limit")
          .animate({ opacity: 0 }, 300, () => {
            $(grid)
              .next(".grid-increase-limit")
              .remove();
          });
      }
      set_height(grid);
    });
};

init();
