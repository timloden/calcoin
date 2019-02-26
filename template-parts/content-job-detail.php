<?php
/**
 * Template part for displaying Jobs detail page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

$department_name    = get_field( 'department_name' );
$department_address    = get_field( 'department_address' );
$timebase    = get_field( 'timebase' );
$shift    = get_field( 'shift' );
$work_hours    = get_field( 'work_hours' );
$salary_rage    = get_field( 'salary_rage' );
$position_number    = get_field( 'position_number' );
$duty_statement    = get_field( 'duty_statement' );
$final_filing_date    = get_field( 'final_filing_date' );
$apply_to_department    = get_field( 'apply_to_department' );
$apply_to_street_address    = get_field( 'apply_to_street_address' );
$apply_to_city    = get_field( 'apply_to_city' );
$apply_to_zip_code    = get_field( 'apply_to_zip_code' );
$apply_to_contact_person    = get_field( 'apply_to_contact_person' );
$apply_to_contact_phone    = get_field( 'apply_to_contact_phone' );
$job_description    = get_field( 'job_description' );
$desired_skills_and_experience    = get_field( 'desired_skills_and_experience' );
$about_this_department    = get_field( 'about_this_department' );
$additional_information    = get_field( 'additional_information' );
$show_sidebar_on_job_detail_page = get_field( 'show_sidebar_on_job_detail_page', 'option' );
?>
<div class="section">
	<main class="main-primary">
		<article id="course-<?php the_ID(); ?>" class="job-detail">
			<header class="header">
				<h1 itemprop="name"><span class="ca-gov-icon-arrow-down"></span> <?php echo esc_attr( the_title() ); ?></h1>
			</header>

			 <div class="sub-header">
		        <div class="entity">
		        	<?php if ( $department_name ) : ?><strong><?php echo esc_attr( $department_name ); ?></strong><?php endif; ?> <?php if ( $department_address ) : ?><span class="ca-gov-icon-road-pin"></span> <a href=""><?php echo esc_attr( $department_address ); ?></a><?php endif; ?>
		        </div>
		        <div class="published">Published: <time datetime="2014-08-26"><?php echo get_the_date( 'l F j, Y' ); ?> - </time> <span class="fuzzy-date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
		        </div>
		    </div>

		     <div class="group">
		        <div class="half">
		            <div class="well">
		                <div class="well-body">
		                    <p>
		                    	<?php if ( $timebase ) : ?><span class="timebase"><?php echo esc_attr( $timebase ); ?></span>, <?php endif; ?>
		                    	<?php if ( $shift ) : ?><span class="shift"><?php echo esc_attr( $shift ); ?></span>, <?php endif; ?>
		                    	<?php if ( $work_hours ) : ?><span class="work-hours"><?php echo esc_attr( $work_hours ); ?></span><?php endif; ?>
		                    	<br>
		                    	<?php if ( $salary_rage ) : ?><span class="salary">Salary Range: <?php echo esc_attr( $salary_rage ); ?></span><br><?php endif; ?>
		                    	<?php if ( $salary_rage ) : ?><span class="rpa">Position Number: 362-410-5237-000, RPA #14-023</span><br><?php endif; ?>
		                    	<?php if ( $duty_statement ) : ?>Duty Statement (<a href="<?php echo esc_url( $duty_statement ); ?>">PDF</a>)<?php endif; ?>
		                	</p>
		                    <?php if ( $salary_rage ) : ?><p><span class="filing-date">Final Filing Date: <time datetime="YYYY-MM-DD"><?php echo esc_attr( $salary_rage ); ?></time></span></p><?php endif; ?>
		                </div>
		            </div>
		        </div>

		        <div class="half">
		            <div class="well">
		                <div class="well-body">
		                    <p><strong>Apply To:</strong><br>
		                    <?php echo esc_attr( $apply_to_department ); ?><br>
		                    <?php echo esc_attr( $apply_to_street_address ); ?><br>
		                    <?php echo esc_attr( $apply_to_city ); ?>, CA, <?php echo esc_attr( $apply_to_zip_code ); ?>
		                    </p>
		                    <p><strong>Questions</strong><br>
		                    <?php echo esc_attr( $apply_to_contact_person ); ?> at <?php echo esc_attr( $apply_to_contact_phone ); ?>
		                    </p>
		                </div>
		            </div>
		        </div>
		    </div>

		    <div class="summary">
		        <!-- JOB DESCRIPTION -->
		        <?php if ( $job_description ) : ?>
		        <div class="job-description">
		            <h2>Job Description</h2>
		            <p><?php echo esc_attr( $job_description ); ?></p>
		        </div>
		        <hr>
		        <?php endif; ?>

		        <!-- SKILLS AND EXPERIENCE -->
		        <?php if ( $desired_skills_and_experience ) : ?>
		        <div class="skills-experience">
		            <h2>Desired Skills and Experience</h2>
		            <?php echo wp_kses_post( apply_filters( 'the_content', $desired_skills_and_experience ) ); ?>
		        </div>
		        <?php endif; ?>

		         <!-- ABOUT THIS DEPARTMENT -->
		        <?php if ( $about_this_department ) : ?>
		        <div class="panel panel-understated about-department">
		            <div class="panel-heading">
		                <h4>About this Department</h4>
		            </div>
		            <div class="panel-body">
		                <p><?php echo esc_attr( $about_this_department ); ?></p>
		            </div>
		        </div>
		        <?php endif; ?>

		        <!-- ADDITIONAL INFORMATION -->
		        <?php if ( $desired_skills_and_experience ) : ?>
		        <div class="additional-information">
		            <h2>Additional Information</h2>
		            <?php echo wp_kses_post( apply_filters( 'the_content', $additional_information ) ); ?>
		        </div>
		        <?php endif; ?>
		    </div>

		</article>
	</main>

	<?php if ( $show_sidebar_on_job_detail_page == 1 ) : ?>
	<div class="main-secondary">
		<?php
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			get_sidebar(); }
		?>
	</div>
	<?php endif; ?>

</div>


