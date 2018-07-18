<?php

function drs_default($key){

	$default = [
		'drs_options_subscriber_price' => [
			'subscription' => [500, 1000, 2000, 5000, 10000, 15000, 20000, 25000, 50000, 100000, 200000, 300000],
		    'price' => [0, 10, 39, 59, 99, 139, 169, 199, 249, 479, 899, 0],
		    'urls' => array_fill(0, 12, site_url())
		],
		'drs_options_general' => [
			'title' => 'Proper payment for every size',
			'result' => "Engage up to [subscribers] subscribers \n for [price] per month",
			'peak' => "If you have more subscribers \n feel free to contact us"
		],
		'replace' => [
			'[subscribers]' => '<span class="subscribers"></span>',
			'[price]' => '<span class="price"></span>',
		]
	];

	return $default[$key];

}

function drs_format_texts($string){

	$replacers = drs_default('replace');
	foreach ($replacers as $key => $value) {
		$string = str_replace($key, $value, $string);
	}

	return $string;

}