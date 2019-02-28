<?php
/**
 * Template part for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */
$google_settings = get_field('google', 'option');
$search_engine_id = isset($google_settings['search_engine_id']) ? $google_settings['search_engine_id'] : false;
$url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
parse_str($parts['query'], $query);
$keyword = $query['q'];
?>

<div class="section section-default">
	<div class="container search-results-header">
			<h1>Search Results for: <?php echo esc_attr($keyword);?></h1>
			<form action="<?php echo site_url('serp');?>" class="google-search" id="cse-search-box">
			    <input name="cx" type="hidden" value="<?php echo esc_attr($search_engine_id);?>">
			    <input name="ie" type="hidden" value="UTF-8">
			    <input class="search-box" id="q" name="q" value="<?php echo esc_attr($keyword);?>" onfocus="document.getElementById('q').value=''" type="text" placeholder="Search..." aria-label="Website Search">
			    <button type="submit" class="search-button"><span class="ca-gov-icon-search"></span></button>
				<button type="button" class="clear-search"><span class="ca-gov-icon-close-mark"></span></button>
			</form>
	</div>
</div>
<div class="section">
	<div class="container">
		<article>
				<gcse:searchresults-only></gcse:searchresults-only>
		</article>
	</div>
</div>
