<?php do_action('onea_elated_action_before_top_navigation'); ?>
<nav class="eltdf-header-bottom-menu">
    <?php
    wp_nav_menu(array(
        'theme_location'  => 'header-bottom-navigation',
        'container'       => '',
        'container_class' => '',
        'menu_class'      => '',
        'menu_id'         => '',
        'fallback_cb'     => 'top_navigation_fallback',
        'link_before'     => '<span>',
        'link_after'      => '</span>',
        'walker'          => new OneaElatedClassHeaderBottomNavigationWalker()
    ));
    ?>
</nav>
<?php do_action('onea_elated_action_after_top_navigation'); ?>