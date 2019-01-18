<?php
//$your_shortcodes = preg_match_all( '#[cacm_*.*?]#s', $content, $matches );
global $shortcode_tags;
echo('<pre>');
print_r($shortcode_tags);
echo('</pre>');