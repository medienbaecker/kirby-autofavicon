# Kirby AutoFavicon

Automatically generates an SVG favicon. Simply insert `<?php snippet('autofavicon') ?>` in your `<head>` and the plugin will insert link tags for modern browsers and Safari.

![Preview](https://user-images.githubusercontent.com/7975568/90232430-f808d380-de1c-11ea-8e02-164142d19e1d.gif)

## Options

By default, AutoFavicon will use the first letter of your site title and a black or white background color — depending on the system's `prefers-color-scheme` setting.

```php
# site/config/config.php
return [
	'medienbaecker.autofavicon.text' => 'B',
	'medienbaecker.autofavicon.color' => '#000000',
	'medienbaecker.autofavicon.color_dark' => '#FFFFFF'
]
```