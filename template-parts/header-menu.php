<?php
    $menu_name = 'Header';
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
    $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
    $menu_type = get_field('menu_type', wp_get_nav_menu_object($menu_name));
    $show_home_link = get_field('show_home_link', wp_get_nav_menu_object($menu_name));
?>
<nav id="navigation" class="main-navigation <?php echo esc_attr($menu_type);?> auto-highlight">
<ul id="nav_list" class="top-level-nav nav-menu">
    
    <li class="home-link nav-item">
        <?php if ($show_home_link) :?>
        <a href="/" class="first-level-link">
            <span class="ca-gov-icon-home" aria-hidden="true"></span> 
            Home
        </a>
        <?php endif; ?>
    </li>
    

    <?php
    $count = 0;
    $submenu = false;
    $unit = '';

    foreach( $menuitems as $item ):
        $link = $item->url;
        $title = $item->title;
        $menu_layout = get_field('menu_layout', $item);
        $icon = get_field('icon', $item);
        $unit = get_field('item_size', $item);
        $description = get_field('description', $item);
        $sub_background = get_field('background', $item); 
        $column_size = get_field('sub_link_size', $item); 
        // item does not have a parent so menu_item_parent equals 0 (false)
        if ( !$item->menu_item_parent ):
        // save this id for later comparison with sub-menu items
        $parent_id = $item->ID;
    ?>


    <!-- top level nav item -->
    <li class="nav-item">
        <a href="<?php echo (esc_url($link)); ?>" class="first-level-link">
        	<span class="ca-gov-<?php echo (esc_attr($icon)); ?>" aria-hidden="true"></span>	
            <?php echo (esc_attr($title));

            $parent_layout = $menu_layout;
            $parent_bg = $sub_background;
            $parent_columns = $column_size;

            ?>

        </a>
    <?php endif; ?>
		

        <?php if ( $parent_id == $item->menu_item_parent ): ?>
            
            <?php if ( !$submenu ): $submenu = true; ?>
            
            <div class="sub-nav subnav-closed" role="region" aria-expanded="false" aria-hidden="true">     
                
                <?php if ($parent_layout == 'image-half'): ?>
                    <div class="half with-image-left">
                        <div class="nav-media" style="background:url('<?php echo(esc_url($parent_bg));?>')"></div>
                    </div>

                    <div class="half offset-half">
                        <ul class="second-level-nav">

                            <li class="<?php echo $unit; ?>">
                                <a href="<?php echo $link; ?>" class="second-level-link">
                                    <span class="ca-gov-<?php echo (esc_attr($icon)); ?>" aria-hidden="true"></span>
                                    <?php echo (esc_attr($title)); ?>
                                    <?php if ($description): ?>
                                        <div class="link-description"><?php echo (esc_attr($description)); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>

                <?php elseif ($parent_layout == 'half-image'): ?>

                    <div class="half with-image-right">
                        <div class="nav-media" style="background:url('<?php echo(esc_url($parent_bg));?>')"></div>
                    </div>

                    <div class="half">
                        <ul class="second-level-nav">

                            <li class="<?php echo $unit; ?>">
                                <a href="<?php echo $link; ?>" class="second-level-link">
                                    <span class="ca-gov-<?php echo (esc_attr($icon)); ?>" aria-hidden="true"></span>
                                    <?php echo (esc_attr($title)); ?>
                                    <?php if ($description): ?>
                                        <div class="link-description"><?php echo (esc_attr($description)); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>

                <?php elseif ($parent_layout == 'image-three_quarters' && $menu_type == 'megadropdown'): ?>

                     <div class="quarter with-image-left">
                        <div class="nav-media" style="background:url('<?php echo(esc_url($parent_bg));?>')"></div>
                    </div>

                    <div class="three-quarters offset-quarter">
                        <ul class="second-level-nav">

                            <li class="<?php echo $unit; ?>">
                                <a href="<?php echo $link; ?>" class="second-level-link">
                                    <span class="ca-gov-<?php echo (esc_attr($icon)); ?>" aria-hidden="true"></span>
                                    <?php echo (esc_attr($title)); ?>
                                    <?php if ($description): ?>
                                        <div class="link-description"><?php echo (esc_attr($description)); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>

                <?php elseif ($parent_layout == 'three_quarters-image'): ?>

                    <div class="quarter with-image-right">
                        <div class="nav-media" style="background:url('<?php echo(esc_url($parent_bg));?>')"></div>
                    </div>

                    <div class="three-quarters">
                        <ul class="second-level-nav">

                            <li class="<?php echo $unit; ?>">
                                <a href="<?php echo $link; ?>" class="second-level-link">
                                    <span class="ca-gov-<?php echo (esc_attr($icon)); ?>" aria-hidden="true"></span>
                                    <?php echo (esc_attr($title)); ?>
                                    <?php if ($description): ?>
                                        <div class="link-description"><?php echo (esc_attr($description)); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>
                        
                <?php else: ?>
                   
                    <?php $columns = $menu_type == 'megadropdown' ? $parent_columns  : '' ?>
                    
                    <div class="full <?php echo(esc_attr($columns)); ?>">
                        
                       
                        <ul class="second-level-nav">

                            <li class="<?php echo $unit; ?>">
                                <a href="<?php echo $link; ?>" class="second-level-link">
                                    <span class="ca-gov-<?php echo (esc_attr($icon)); ?>" aria-hidden="true"></span>
                                    <?php echo (esc_attr($title)); ?>
                                    <?php if ($description): ?>
                                        <div class="link-description"><?php echo (esc_attr($description)); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>

                <?php endif; ?>

                

            <?php if ( !isset($menuitems[ $count + 1 ]) || $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>

                    </ul>
                </div>
            </div>
            
            <?php $submenu = false; endif; ?>

            <?php else: ?>

                        <li class="<?php echo $unit; ?>">
                            <a href="<?php echo $link; ?>" class="second-level-link">
                            	<span class="ca-gov-<?php echo (esc_attr($icon)); ?>" aria-hidden="true"></span>
                            	<?php echo $title; ?>
                                <?php if ($description): ?>
                                    <div class="link-description"><?php echo (esc_attr($description)); ?></div>
                                <?php endif; ?>
                            </a>
                        </li>

            <?php endif; ?>

            <?php if ( !isset($menuitems[ $count + 1 ]) || $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>

                    </ul>
                </div>
            </div>
            
            <?php $submenu = false; endif; ?>
        	

        <?php endif; ?>

    <?php if ( !isset($menuitems[ $count + 1 ]) || $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
    </li>                           
    <?php $submenu = false; endif; ?>

<?php $count++; endforeach; ?>

</ul>
</nav>
