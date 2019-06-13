(function ($) {
	$( document ).ready(function() {

		// create wallet on signup

		$( ".generate-wallet" ).click(function() {
			//console.log('clicked create wallet');
	 		createWallet();
		});

		// Show wallet

		$( '.wallet a' ).click(function() {

			$('.wallet-container').addClass('open-wallet');
			animateCSS('.wallet-card', 'slideInUp');
			animateCSS('.wallet-container', 'fadeIn');

		});

		$( '.wallet-close' ).click(function() {

			animateCSS('.wallet-card', 'slideOutDown');
			animateCSS('.wallet-container', 'fadeOut', function(){
				$('.wallet-container').removeClass('open-wallet');
			});
		});

	});

})(jQuery);

function animateCSS(element, animationName, callback) {
    const node = document.querySelector(element)
    node.classList.add('animated', animationName)

    function handleAnimationEnd() {
        node.classList.remove('animated', animationName)
        node.removeEventListener('animationend', handleAnimationEnd)

        if (typeof callback === 'function') callback()
    }

    node.addEventListener('animationend', handleAnimationEnd)
}
