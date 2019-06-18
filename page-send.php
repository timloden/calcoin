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
<!--
<div>
    <b>Device has camera: </b>
    <span id="cam-has-camera"></span>
    <br>
    <video muted playsinline id="qr-video" style="width: 300px;"></video>
</div>
-->

<script type="module">
    import QrScanner from "/wp-content/themes/calcoin/assets/js/vendor/lib/qr-scanner.min.js";
    QrScanner.WORKER_PATH = '/wp-content/themes/calcoin/assets/js/vendor/lib/qr-scanner-worker.min.js';
    
    const video = document.getElementById('qr-video');
    const camQrResult = document.getElementById('cam-qr-result');

    function setResult(label, result) {
        label.value = result;
    }

    const scanner = new QrScanner(video, result => setResult(camQrResult, result));
    
    let camera = document.getElementById('scanner');
        
    document.getElementById('open-camera').addEventListener('click', ()=> {
	    
	    camera.classList.add('animated', 'fadeIn', 'faster');
	    scanner.start();
	});
	
	document.getElementById('close-camera').addEventListener('click', ()=> {
	    
	    camera.classList.remove('animated', 'fadeIn', 'faster');
	    
	});
</script>

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
			<div id="scanner" class="scanner">
				<p>
					<a id="close-camera" class="close-camera"><i class="la la-close"></i></a>
				</p>
				<video muted playsinline id="qr-video" style="width: 100%;"></video>
			</div>
			<div class="send-form">
				<form>
					<label>Send to:</label>
					<div class="send-to-field">
						<input id="cam-qr-result" class="send-address" type="text" placeholder="0x4B4D...">
						<a id="open-camera" class="button small open-camera"><i class="la la-camera"></i></a>
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
/*
(function ($) {
	$( '.open-camera' ).click(function() {
		$('.scanner').toggle().addClass('animated fadeIn faster');
	});

	$( '.close-camera' ).click(function() {
		$('.scanner').hide();
		$('#reader').html5_qrcode_stop();
	});



})(jQuery);
*/
</script>

 <?php

get_footer('app');
