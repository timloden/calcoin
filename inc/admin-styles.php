<?php
add_action('admin_head', 'acf_styles');

function acf_styles() {
  echo '<style>
    .menu-item-depth-0 [data-name="item_size"], .menu-item-depth-0 [data-name="description"] {
        display: none;
    }
    .menu-item-depth-1 [data-name="menu_layout"], .menu-item-depth-1 [data-name="sub_link_size"] {
        display: none;
    }
  </style>';
}