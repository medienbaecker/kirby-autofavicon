<?php

use Kirby\Cms\App as Kirby;
use Kirby\Cms\Response;

Kirby::plugin('medienbaecker/autofavicon', [
	'options' => [
		'text' => kirby()->site()->title()->value()[0] ?? 'K',
		// Light mode
		'color' => '#000000',
		'text_color' => '#ffffff',
		// Dark mode
		'color_dark' => '#ffffff',
		'text_color_dark' => '#000000',
	],
	'snippets' => [
		'autofavicon' => __DIR__ . '/snippets/autofavicon.php'
	],
	'routes' => [
		[
			'pattern' => 'favicon.svg',
			'language' => '*',
			'action' => function () {
				$bgLight = option('medienbaecker.autofavicon.color');
				$bgDark = option('medienbaecker.autofavicon.color_dark');
				$text = option('medienbaecker.autofavicon.text');
				$textColor = option('medienbaecker.autofavicon.text_color');
				$textColorDark = option('medienbaecker.autofavicon.text_color_dark');

				$svg = `
				<svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
					<style>
						.bg {
							fill: {$bgLight};
						}
						.text {
							fill: {$textColor};
						}
						@media (prefers-color-scheme: dark) {
							.bg {
								fill: {$bgDark};
							}
							.text {
								fill: {$textColorDark};
							}
						}
					</style>
					<circle class="bg" cx="50" cy="50" r="50"/>
					<text class="text" x="50" y="55" text-anchor="middle" dominant-baseline="middle" font-family="sans-serif" font-weight="bold" font-size="60">{$text}</text>
				</svg>
				`;

				return new Response($svg, 'image/svg+xml');
			}
		]
	]
]);
