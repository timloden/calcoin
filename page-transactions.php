<?php
/**
 * Template Name: Transactions
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package CalCoin
 */

get_header('app');
?>
<div class="row align-center">
	<div class="large-6 columns">
		<div class="card">
			<div id="chart"></div>
		</div>

		<div class="card">
			<div class="card-header">
				<div class="expanded button-group transaction-filter">
					<a id="all-transactions" class="button active">All</a>
					<a id="sent-transactions" class="button inactive">Sent</a>
					<a id="recieved-transactions" class="button inactive">Received</a>
				</div>
			</div>

			<div class="transaction-container all-transactions">
				<ul class="transaction-list">
					<li class="transaction wow slideInLeft faster">
						<div class="tran-source">
							<p class="vendor-name">Farmers Market</p>
							<p class="vendor-meta">06/06/19 | 10:39 AM</p>
						</div>
						<div class="tran-total">
							-35 CC
						</div>
					</li>
					<li class="transaction wow slideInLeft faster">
						<div class="tran-source">
							<p class="vendor-name">Farmers Market</p>
							<p class="vendor-meta">06/06/19 | 10:39 AM</p>
						</div>
						<div class="tran-total">
							+35 CC
						</div>
					</li>
					<li class="transaction wow slideInLeft faster">
						<div class="tran-source">
							<p class="vendor-name">Farmers Market</p>
							<p class="vendor-meta">06/06/19 | 10:39 AM</p>
						</div>
						<div class="tran-total">
							+35 CC
						</div>
					</li>
					<li class="transaction wow slideInLeft faster">
						<div class="tran-source">
							<p class="vendor-name">Farmers Market</p>
							<p class="vendor-meta">06/06/19 | 10:39 AM</p>
						</div>
						<div class="tran-total">
							-35 CC
						</div>
					</li>
					<li class="transaction wow slideInLeft faster">
						<div class="tran-source">
							<p class="vendor-name">Farmers Market</p>
							<p class="vendor-meta">06/06/19 | 10:39 AM</p>
						</div>
						<div class="tran-total">
							-35 CC
						</div>
					</li>
				</ul>
			</div>

			<div class="transaction-container sent-transactions">
				<ul class="transaction-list">
					<li class="transaction">
						<div class="tran-source">
							<p class="vendor-name">Farmers Market</p>
							<p class="vendor-meta">06/06/19 | 10:39 AM</p>
						</div>
						<div class="tran-total">
							-35 CC
						</div>
					</li>
					<li class="transaction">
						<div class="tran-source">
							<p class="vendor-name">Farmers Market</p>
							<p class="vendor-meta">06/06/19 | 10:39 AM</p>
						</div>
						<div class="tran-total">
							-35 CC
						</div>
					</li>
					<li class="transaction">
						<div class="tran-source">
							<p class="vendor-name">Farmers Market</p>
							<p class="vendor-meta">06/06/19 | 10:39 AM</p>
						</div>
						<div class="tran-total">
							-35 CC
						</div>
					</li>
				</ul>
			</div>

			<div class="transaction-container recieved-transactions">
				<ul class="transaction-list">
					<li class="transaction">
						<div class="tran-source">
							<p class="vendor-name">Farmers Market</p>
							<p class="vendor-meta">06/06/19 | 10:39 AM</p>
						</div>
						<div class="tran-total">
							+35 CC
						</div>
					</li>
					<li class="transaction">
						<div class="tran-source">
							<p class="vendor-name">Farmers Market</p>
							<p class="vendor-meta">06/06/19 | 10:39 AM</p>
						</div>
						<div class="tran-total">
							+35 CC
						</div>
					</li>
				</ul>
			</div>

		</div>
	</div>
</div>


<script>

new WOW().init();

var options = {
    chart: {
        height: 200,
        type: 'area',
        toolbar: {
        	show: false,
        },
        width: '100%',
        sparkline: {
        	enabled: true,
    	}
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    series: [{
        name: 'sent',
        data: [31, 40, 28, 51, 42, 109, 100]
    }, {
        name: 'recieved',
        data: [11, 32, 45, 32, 34, 52, 41]
    }],
    xaxis: {
    	labels: {
            show: false,
    	},
    	axisTicks: {
            show: false,
        },
        min: 0,
    },
    grid: {
    	show: true,
	},
    yaxis: {
    	show: false,
    }
}


var chart = new ApexCharts(
    document.querySelector("#chart"),
    options
);

chart.render();


(function ($) {
	$( document ).ready(function() {

		$( '.transaction-filter a' ).click(function() {

			var t = $(this).attr('id');

			if( $(this).hasClass('active') ) { //this is the start of our condition

			} else {
				$( '.transaction-filter a' ).removeClass('active');
				$(this).addClass('active');
				$( '.transaction-container' ).hide();
				$( '.' + t ).fadeIn();
			}

		});

	});

})(jQuery);

</script>

<?php

get_footer('app');
