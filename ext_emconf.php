<?php
$EM_CONF[$_EXTKEY] = [
	'title' => 'Woe',
	'description' => 'Geowoe database with coordinates and timezone',
	'category' => 'fe',
	'version' => '1.0.0',
	'state' => 'stable',
	'clearcacheonload' => true,
	'author' => 'Tanel Põld',
	'author_email' => 'tanel@brightside.ee',
	'author_company' => 'Brightside OÜ / t3brightside.com',
	'constraints' => [
		'depends' => [
			'typo3' => '12.4.0 - 12.4.99',
		],
	],
	'autoload' => [
		 'psr-4' => [
				'Brightside\\Woe\\' => 'Classes'
		 ]
	],
];
