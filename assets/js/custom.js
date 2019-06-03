"use strict";

// Create our wallet demo
(function ($) {
  //console.log('loaded wallet');
  function createWallet() {
    var wallet = ethers.Wallet.createRandom();
    $(".address").html(wallet.address);
    $(".key").html(wallet.privateKey);
    var typeNumber = 0;
    var errorCorrectionLevel = 'L';
    var qr = qrcode(typeNumber, errorCorrectionLevel);
    qr.addData(wallet.address);
    qr.make();
    document.getElementById('placeHolder').innerHTML = qr.createImgTag('10', '0', 'Address QR Code');
  }

  $(".generate-wallet").click(function () {
    createWallet();
  });
})(jQuery);
"use strict";

// Init foundation
(function ($) {
  $(document).foundation();
})(jQuery);
"use strict";

var swup = new Swup();