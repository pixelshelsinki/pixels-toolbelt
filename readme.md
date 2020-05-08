[![Build Status](https://travis-ci.org/pixelshelsinki/pixels-toolbelt.svg?branch=master)](https://travis-ci.org/pixelshelsinki/pixels-toolbelt)

# Pixels Toolbelt

Pixels Toolbelt is a small must-use plugin for WordPress. It takes care of certain modifications and setups that are used in most Pixels Helsinki Projects, but may be useful for other developers in their own projects.

## What it does

Pixels Toolbelt handles the following tasks:

- Hides the Advanced Custom Fields admin menu on non development environments.
- Allows you to set the Google API Key from a constant for Advanced Custom Fields for the google maps field type.
- Allows you to specify a plugin to be the save point for Advanced Custom Fields' JSON configuration files.
- Allows you to specify a plugin as an additional load point for Advanced Custom Fields' JSON configuration files.
- Handles languages for Advanced Custom Fields' options pages if using Polylang.
- Moves the SEO Framework metabox to the end of the single post edit screen.
- Moves the Yoast SEO metabox to the end of the single post edit screen.
- Enables SVG uploads in WordPress.

## How to Install

### Manual Upload

Download the zip and upload to your MU plugins directory. Note you will need to have an autoloader enabled to allow this.

### Composer

Install via composer and Pixels Packages. Add the following to your array of repositories in your composer.json file if not already there:

```
{
  "type": "composer",
		"url": "https://packages.pixels.fi/satispress/"
}
```

Then add the following to your `require` array:

`"pixels-packages/pixels-toolbelt": "^1.0.3"`

Then under "extra" > "installer-paths" > "web/app/mu-plugins/{$name}/" add "pixels-packages/pixelstoolbelt" to the array.

Then run `composer update`

## How to Setup

Most of the plugin requires no setup, but there are a few things you will need to add.

### Advanced Custom Fields' load and save points.

To enable this feature, you will need to define the constant `PIX_PROJECT_PLUGIN_SLUG` to the name of the plugin where you would like the json files to be saved and loaded from. This plugin will need a directory called `acf-json` for this to work. The constant should be defined in your `wp-config.php` folder, or in the case of alternative WordPress setups, wherever your constants are set.

e.g.: `define( 'PIX_PROJECT_PLUGIN_SLUG', 'amazing-plugin' );`

Note: JSON files will still be loaded from the Theme's `acf-json` folder, if it exists. This can be useful for separating fields that are for content type data, versus fields that are used for content display, such as page template fields.

### Advanced Custom Fields' Google API Key

Advanced Custom Fields requires a Google API Key with the correct Google Maps APIs enabled for the admin Google Maps field to work correctly. Once you have set this up within Google, you can set the `GOOGLE_API_KEY` constant and Pixels Toolbelt will handle the Advanced Custom Fields filter. The constant should be defined in your `wp-config.php` folder, or in the case of alternative WordPress setups, wherever your constants are set.

e.g.: `define( 'GOOGLE_API_KEY', '<your Google API key>' );`

Note: This will not enable the Google Maps JS library to work, for that you will still need to load the Google Maps library, but you can use the same `GOOGLE_API_KEY` constant when enqueuing the script.
