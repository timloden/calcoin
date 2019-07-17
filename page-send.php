<?php
/**
 * Template Name: Send
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package CalCoin
 */

get_header('app');
$user = wp_get_current_user();
$user_id = $user->ID;

$private_key = get_field('private_key', 'user_' . $user_id);

?>

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
			<div id="send-alert" class="animated fadeIn faster hide card-header" data-closable>
				<div class="card-header-title">
					<span id="send-alert-message"></span>
				</div>
				<div class="card-header-action">
					<button type="button" data-close>
					    <i class="la la-close"></i>
					</button>
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
						<input type="hidden" value="<?php echo esc_attr($private_key); ?>" id="from-private-key">
						<input type="hidden" value="<?php echo esc_attr($address); ?>" id="from-address">
						<input id="cam-qr-result" class="send-address" type="text" placeholder="0x4B4D...">
						<a id="open-camera" class="button small open-camera"><i class="la la-camera"></i></a>
					</div>

					<div class="send-amount">
						<label>How much do you want to send?</label>
						<input id="coin-amount" type="text" placeholder="0">
					</div>
				</form>
				<div class="button-container single-button">
					<a id="send-coin-button" onclick="sendToken()" class="button button-primary">Send CalCoin <i class="la la-money"></i></a>
				</div>
			</div>

		</div>

	</div>
</div>

<script>

</script>

 <?php

get_footer('app');
