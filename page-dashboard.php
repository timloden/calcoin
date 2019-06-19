<?php
/**
 * Template Name: Dashboard
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package CalCoin
 */

get_header('app');
?>
<div class="dashboard">
	<div class="row">
		<div class="columns">

			<div class="card">
				<div class="wallet-total">
					<h1 class="odometer"></h1>
					<p class="text-center">Available CalCoin</p>
				</div>
				<div id="chart"></div>


				<div class="button-container dash-buttons">
					<div><a class="button button-secondary" href="/send">Send CalCoin <i class="la la-money"></i></a></div>
					<div class="wallet"><a class="button button-primary">Open wallet <i class="la la-qrcode"></i></a></div>
				</div>


				<div class="card-header">
					<div class="card-header-title">
						<span>Recent transactions</span>
					</div>
					<div class="card-header-action">
						<a href="/transactions">All transactions <i class="la la-arrow-right"></i></a>
					</div>
				</div>
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

		</div>
	</div>
</div>

<script>

new WOW().init();

(function ($) {

	$(document).ready(function() {

		setTimeout( function() {
		    $('.odometer').html(100000);
		}, 0);

	});

})(jQuery);

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
        name: 'Balance',
        data: [31, 40, 28, 51, 42, 109, 100]
    }],

    xaxis: {
    	labels: {
            show: false,
    	},
    	axisTicks: {
            show: false,
        },
        min: 0,
        //categories: ['6/5','6/6','6/7','6/8','6/9','6/10','6/11'],
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
</script>
<?php

get_footer('app');
