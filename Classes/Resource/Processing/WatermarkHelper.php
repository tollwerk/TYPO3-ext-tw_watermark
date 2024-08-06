<?php

/**
 * WatermarkHelper
 *
 * @category   Tollwerk
 * @package    Tollwerk\TwWatermark
 * @subpackage Tollwerk\TwWatermark\Resource\Processing
 * @author     tollwerk GmbH <info@tollwerk.de>
 * @copyright  2024 tollwerk GmbH <info@tollwerk.de>
 * @license    GPL https://www.gnu.org/licenses/gpl-3.0.html.en
 * @link       https://tollwerk.de
 */

namespace Tollwerk\TwWatermark\Resource\Processing;

/**
 * WatermarkHelper
 *
 * @category   Tollwerk
 * @package    Tollwerk\TwWatermark
 * @subpackage Tollwerk\TwWatermark\Resource\Processing
 * @author     tollwerk GmbH <info@tollwerk.de>
 * @license    GPL https://www.gnu.org/licenses/gpl-3.0.html.en
 * @link       https://tollwerk.de
 */
class WatermarkHelper
{
    /**
     * Default configuration
     */
    const DEFAULT_CONFIGURATION = [
        'fontPath' => '../vendor/tollwerk/tw-watermark/Resources/Public/Fonts/NimbusSans-Regular.t1',
        'logFile' => '',
        'size' => 12,
        'gravity' => 'southeast',
        'color' => '#0000FF00',
        'backgroundColor' => '#FFFFFF00',
        'positionX' => 10,
        'positionY' => 10,
    ];

    /**
     * Get configuration
     *
     * @return array
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function getConfiguration(): array
    {
        // Merge default configuration with custom extension configuration.
        return array_merge(
            self::DEFAULT_CONFIGURATION,
            array_filter($GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['tw_watermark'])
        );
    }

    /**
     * Add all GraphicsMagick parameters to add the watermark text to the image.
     *
     * @param string|null $text Text that should be added to the image
     *
     * @return string
     */
    public function addTextToGmParams(?string $text = null): string
    {
        // Do nothing if text is empty.
        if ($text === null || !trim($text)) {
            return '';
        }

        // Get configuration and set base parameters for rendering the watermark.
        $configuration = $this->getConfiguration();
        $parameters = [
            ' ',
            '-pointsize ' . $configuration['size'],
            '-undercolor \'' . $configuration['backgroundColor'] . '\'',
            '-gravity ' . $configuration['gravity'],
            '-font ' . $configuration['fontPath'],
            '-fill \'' . $configuration['color'] . '\'',
            sprintf(
                '-draw "text %s,%s \'%s%s\'"',
                $configuration['positionX'],
                $configuration['positionY'],
                strlen($configuration['textPrefix']) ? $configuration['textPrefix'] : '',
                $text
            ),
        ];

        // If set, write ImageMagick output to a log file.
        if (strlen(trim($configuration['logFile']))) {
            $parameters[] = '-verbose > ' . $configuration['logFile'] . ' 2>&1';
        }

        return implode(' ', $parameters);
    }
}
