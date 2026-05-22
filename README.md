# TYPO3 Watermark Images

[![TYPO3](https://img.shields.io/badge/TYPO3-13-green.svg)](https://get.typo3.org/version/12)
[![TYPO3](https://img.shields.io/badge/License-GPL%203%20or%20later-lightgray.svg)](https://get.typo3.org/version/12)


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

Use _Admin Tools > Settings > Extension Configuration > tw_watermark_ to change position and size of the watermark. 
If you change settings here and want them to be applied to existing images, you have to clear the processed images files
by using _Admin Tools > Maintenance > Remove Temporary Assets_ and clicking on "Delete files" for 
_/fileadmin/_processed_/_.
