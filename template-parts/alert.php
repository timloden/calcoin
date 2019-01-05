<?php 

$icon = get_sub_field('icon');
$read_more = get_sub_field('add_read_more_button');
$display_on = get_sub_field('display_on');
$uniqueid = 'alert-' . get_row_index();

if (!$icon) {
	$icon = 'icon-important';
}

$cookie = isset($_COOKIE['dismissed-notifications']) ? $_COOKIE['dismissed-notifications'] : false;

if ($cookie != ('#' . $uniqueid)) :
?>
<div class="alert alert-severe alert-dismissible alert-banner" id="<?php echo esc_attr( $uniqueid ); ?>" style="background-color: <?php echo (esc_attr(the_sub_field('banner_background_color'))); ?>;">
    <div class="container">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="alert-level">
        	<span class="ca-gov-<?php echo (esc_attr($icon)); ?>" aria-hidden="true"></span>
        	<?php echo (esc_attr(the_sub_field('header'))); ?>
 
       	</span>
        <span class="alert-text">
        	<?php echo (esc_attr(the_sub_field('message'))); ?>
        </span>
        <?php if ($read_more): 
        	$link_target = get_sub_field('open_in_new_tab');
        	$target = ($link_target == true ? '_blank' : '_self');
        ?>
        	<a href="<?php echo (esc_url(the_sub_field('button_url'))); ?>" target="<?php echo (esc_attr($target)); ?>" class="alert-link btn btn-default btn-xs">Read More</a>
        <?php endif; ?>
    </div>
</div>

<?php endif; ?>