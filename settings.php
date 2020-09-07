<?php

$settings = [
	'settings' => [
		'displayErrorDetails' => false,
		'renderer' => [
			'template_path' => ROOT . '/views/',
		],
		'site' => [
			'name' => 'AlphaReign',
			'short' => 'AR',
			'lead' => 'A Private Torrent Search Engine',
			'domain' => 'example.com',
			'url' => 'https://example.com',
			'version' => '0.0.8',
			'contact' => 'contact@example.com'
		],
		'elasticsearch' => [
			'hosts' => [
				[
					'host' => $_SERVER['ELASTIC_HOST'],
					'port' => $_SERVER['ELASTIC_PORT'],
					// 'scheme' => 'https',
					// 'path' => '/elastic',
					'user' => $_SERVER['ELASTIC_USER'],
					'pass' => $_SERVER['ELASTIC_PASS']
				]
			]
		]
	]
];

return $settings;

?>
