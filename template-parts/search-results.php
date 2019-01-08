<?php
/**
 * Template part for displaying search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CAWeb_Standard
 */

?>

<div class="section section-default">
	<div class="container search-results-header">
			<h1>Search Results</h1>
			<gcse:searchbox-only resultsUrl="<?php echo site_url('serp');?>" enableAutoComplete="true"></gcse:searchbox-only>
	</div>
</div>
<div class="section">
	<div class="container">
		<article>
				<gcse:searchresults-only></gcse:searchresults-only>
		</article>
	</div>
</div>	
