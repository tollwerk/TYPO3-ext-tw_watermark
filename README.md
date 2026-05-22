# TYPO3 Watermark Images

Automatically add watermarks to all images with copyright or author metadata.

## Installation 

Install the extension with composer.
```
composer require tollwerk/tw-watermark
```

## Usage

Inside the fileadmin, add some information to the `copyright` field of an image.
If you use this image inside an image or textpic content element, it will be rendered
with the copyright information included.

Use _Admin Tools > Settings > Extension Configuration > tw_watermark_ to change position 
and size of the watermark.
