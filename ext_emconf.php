<?php

/**
 * Local extension configuration
 *
 * @category  Tollwerk
 * @package   Tollwerk\TwWatermark
 * @author    tollwerk GmbH <info@tollwerk.de>
 * @license   GPL https://www.gnu.org/licenses/gpl-3.0.html.en
 * @link      https://tollwerk.de
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'tollwerk Watermark Images',
    'description' => 'Automatically add watermarks to all images',
    'category' => 'plugin',
    'author' => 'tollwerk GmbH',
    'author_email' => 'info@tollwerk.de',
    'author_company' => 'tollwerk GmbH',
    'state' => 'alpha',
    'version' => '0.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '12.0.0-12.4.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
