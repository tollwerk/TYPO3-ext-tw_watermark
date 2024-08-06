<?php

/**
 * File ext_localconf.php
 *
 * @category  Tollwerk
 * @package   Tollwerk\TwWatermark
 * @author    tollwerk GmbH <info@tollwerk.de>
 * @copyright 2024 tollwerk GmbH <info@tollwerk.de>
 * @license   GPL https://www.gnu.org/licenses/gpl-3.0.html.en
 * @link      https://tollwerk.de
 */

if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(
    function () {
        // Use custom file processingTaskTypes and custom file processor for adding copyright watermarks to images.
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['fal']['processingTaskTypes']['Image.CropScaleMask']
            = \Tollwerk\TwWatermark\Resource\Processing\ImageCropScaleMaskTask::class;
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['fal']['processors']['TwWatermark_LocalImageProcessor'] = [
            'className' => \Tollwerk\TwWatermark\Resource\Processing\LocalImageProcessor::class,
            'before' => ['LocalImageProcessor']
        ];
    }
);
