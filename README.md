kirby-minigallery
=================

This is a fork of [kirby-minigallery](https://github.com/chbach/kirby-minigallery) implemented in form of tag for Kirby 2.

## Requirements

This plugin is written with support of [Lightbox2](http://lokeshdhakar.com/projects/lightbox2/) script for showing modal windows.

If you want to use any other fancybox script - you can fork this repo and do this by yourself ;)

You have to copy the `minigallery.php` in your `site/tags` directory.

## Usage

First of all, you need to initialize the lightbox as it described in it's [docs](http://lokeshdhakar.com/projects/lightbox2/)

You can create a simple gallery with a kirby tag in your text file like this:

	(minigallery:01.jpg|02.jpg|03.jpg)

If you want to specify some titles, you can do it like this: 

	(minigallery:01.jpg|02.jpg|03.jpg titles:foo|bar|title)

If you want to have more than one gallery and don't want them to be connected through the fancybox, you can specify another `rel` like this:

	(minigallery:01.jpg|02.jpg|03.jpg rel:first)
	(minigallery:01.jpg|02.jpg|03.jpg rel:second)

To disable the link to the original you can set `lightbox:false`.

For a custom CSS class of the block use `class:classname`.

For a custom CSS class of the thumb use `img-class:classname`.

The rest of the available options relate to the Thumb plugin. So it is possible to set the maximum width and height like this: `width:240` and `height:320`.
