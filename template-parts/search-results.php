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
$keyword = $_GET['q'];
?>
<style>
#head-search {
	display: none;
}
</style>

<div class="section section-default">
    <div class="container search-results-header">

		<form id="Search" class="pos-rel" action="<?php echo site_url('serp');?>">
            <span class="sr-only" id="SearchInput">Custom Google Search</span>
            <input type="text" value="<?php echo esc_attr($keyword);?>" id="q" name="q" aria-labelledby="SearchInput" placeholder="Custom Search" class="w-100 height-50 border-0 p-x-sm" />
            <button type="submit" class="pos-abs gsc-search-button right-0 top-0 width-50 height-50 border-0"><span class="ca-gov-icon-search font-size-30" aria-hidden="true"></span><span class="sr-only">Submit</span></button>
        </form>

	</div>
</div>

<div class="section">
    <div class="container">
        <div id="searchAreaResults" class="tab-content">
        	<h2>Search Results for: <?php echo esc_attr($keyword);?></h2>
			<article>
					<gcse:searchresults-only></gcse:searchresults-only>
			</article>
		</div>
	</div>
</div>
