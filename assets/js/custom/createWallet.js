// Create our wallet demo

(function ($) {
	//console.log('loaded wallet');

	function createWallet() {
		var wallet = ethers.Wallet.createRandom();
		$( ".address" ).html(wallet.address);
		$( ".key" ).html(wallet.privateKey);
		var typeNumber = 20;
		var errorCorrectionLevel = 'L';
		var qr = qrcode(typeNumber, errorCorrectionLevel);
		qr.addData(wallet.address);
		qr.make();
		document.getElementById('placeHolder').innerHTML = qr.createImgTag();
	}

	$( ".generate-wallet" ).click(function() {
 		createWallet();
	});

})(jQuery);
