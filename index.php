<?php

Kirby::plugin('medienbaecker/autofavicon', [
	'options' => [
		'color' => '#000000',
		'color_dark' => '#ffffff',
		'text' => kirby()->site()->title()->value()[0]
	],
	'snippets' => [
		'autofavicon' => __DIR__ . '/snippets/autofavicon.php'
	],
	'routes' => [
		[
			'pattern' => 'favicon.svg',
			'language' => '*',
			'action' => function () {
				return new Response(
					'<svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
						<style>
							circle {
								fill: ' . option('medienbaecker.autofavicon.color') . ';
							}
							@media (prefers-color-scheme: dark) {
								circle {
									fill: ' . option('medienbaecker.autofavicon.color_dark') . ';
								}
							}
						</style>
						<mask id="text">
							<rect x="0" y="0" width="100" height="100" fill="white" />
							<text font-weight="bold" x="50" y="55" fill="black" text-anchor="middle" dominant-baseline="middle" font-family="sans-serif" font-size="60">' . option('medienbaecker.autofavicon.text') . '</text>
						</mask>
						<circle mask="url(#text)" cx="50" cy="50" r="50"/>
					</svg>', 'image/svg+xml'
				);
			}
		]
	]
]);
