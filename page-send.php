<?php
/**
 * Template Name: Send
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package CalCoin
 */

get_header('app');
?>
<div class="row">
	<div class="columns">
		<div class="card">
			<div class="card-header">
				<div class="card-header-title">
					<span>Available balance:</span>
				</div>
				<div class="card-header-action">
					100000
				</div>
			</div>
			<div class="scanner">
				<p>
					<a class="close-camera"><i class="la la-close"></i></a>
				</p>
				<div id="reader" style="width:300px;height:250px"></div>
			</div>
			<div class="send-form">
				<form>
					<label>Send to:</label>
					<div class="send-to-field">
						<input class="send-address" type="text" placeholder="0x4B4D...">
						<a class="button small open-camera"><i class="la la-camera"></i></a>
					</div>

					<div class="send-amount">
						<label>How much do you want to send?</label>
						<input type="text" placeholder="0">
					</div>
				</form>
				<div class="button-container single-button">
					<a class="button button-primary" href="/send">Send CalCoin <i class="la la-money"></i></a>
				</div>
			</div>

		</div>

	</div>
</div>

<script>
(function ($) {
	$( '.open-camera' ).click(function() {
		$('.scanner').toggle().addClass('animated fadeIn faster');
	});

	$( '.close-camera' ).click(function() {
		$('.scanner').toggle();
	});

	$('#reader').html5_qrcode(function(data){
	 		// do something when code is read
	 		console.log('code scanned');
	 		$('.send-address').val(data);
	 	},
	 	function(error){
			//show read errors
		}, function(videoError){
			//the video stream could be opened
		}
	);


})(jQuery);
</script>

 <?php

get_footer('app');
