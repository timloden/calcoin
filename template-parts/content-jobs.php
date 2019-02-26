<?php
/**
 * Template part for displaying Job archive item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

$timebase    = get_field( 'timebase' );
$shift    = get_field( 'shift' );
$work_hours    = get_field( 'work_hours' );
$salary_rage    = get_field( 'salary_rage' );
$position_number    = get_field( 'position_number' );
$final_filing_date    = get_field( 'final_filing_date' );
$apply_to_city    = get_field( 'apply_to_city' );
?>
<article class="job-item">
	<div class="header">
        <div class="title"><a href="<?php the_permalink(); ?>"><?php echo esc_attr( the_title() ); ?></a></div>
        <div class="filing-date">Final Filing Date <time datetime="<?php echo esc_attr( $final_filing_date ); ?>"><?php echo esc_attr( $final_filing_date ); ?></time></div>
    </div>
    <div class="body">
        <?php if ( $position_number ) : ?><div class="position-number">Position Number: <span><?php echo esc_attr( $position_number ); ?></span></div><?php endif; ?>
        <?php if ( $timebase || $shift || $work_hours ) : ?><div class="schedule"><?php echo esc_attr( $timebase ); ?>, <span class="shift"><?php echo esc_attr( $shift ); ?></span>, <span class="work-hours"><?php echo esc_attr( $work_hours ); ?></span></div><?php endif; ?>
        <?php if ( $salary_rage ) : ?><div class="salary-range">Salary Range: <span><?php echo esc_attr( $salary_rage ); ?></span></div><?php endif; ?>
        <?php if ( $apply_to_city ) : ?><div class="location">Location: <?php echo esc_attr( $apply_to_city ); ?>, CA</div><?php endif; ?>
    </div>
    <div class="footer">
        <a href="<?php the_permalink(); ?>" class="btn btn-default">View More Details</a>
    </div>
</article>
