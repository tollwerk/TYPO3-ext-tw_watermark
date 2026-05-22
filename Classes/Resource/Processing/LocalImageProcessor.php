<?php

/**
 * LocalImageProcessor
 *
 * @category   Tollwerk
 * @package    Tollwerk\TwWatermark
 * @subpackage Tollwerk\TwWatermark\Resource\Processing
 * @author     tollwerk GmbH <info@tollwerk.de>
 * @license    GPL https://www.gnu.org/licenses/gpl-3.0.html.en
 * @link       https://tollwerk.de
 */

namespace Tollwerk\TwWatermark\Resource\Processing;

use Psr\Log\LoggerAwareInterface;
use TYPO3\CMS\Core\Resource\Processing\LocalPreviewHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Resource\Processing\ProcessorInterface;
use TYPO3\CMS\Core\Resource\Processing\LocalImageProcessor as CoreLocalImageProcessor;
use InvalidArgumentException;

/**
 * Overwrite the LocalImageProcessor from TYPO3 core to use the LocalCropScaleMaskHelper from tw_watermark
 *
 * @category   Tollwerk
 * @package    Tollwerk\TwWatermark
 * @subpackage Tollwerk\TwWatermark\Resource\Processing
 * @author     tollwerk GmbH <info@tollwerk.de>
 * @license    GPL https://www.gnu.org/licenses/gpl-3.0.html.en
 * @link       https://tollwerk.de
 */
class LocalImageProcessor extends CoreLocalImageProcessor implements ProcessorInterface, LoggerAwareInterface
{
    /**
     * Processes an image described in a task, but optionally uses a given local image
     *
     * @param string $taskName Task name
     *
     * @return LocalCropScaleMaskHelper|LocalPreviewHelper
     *
     * @throws InvalidArgumentException
     */
    protected function getHelperByTaskName($taskName)
    {
        switch ($taskName) {
            case 'Preview':
                // Keep using the base LocalPreviewHelper from TYPO3 core.
                $helper = GeneralUtility::makeInstance(LocalPreviewHelper::class);
                break;
            case 'CropScaleMask':
                // Use our own LocalCropScaleMaskHelper from tw_watermark.
                $helper = GeneralUtility::makeInstance(LocalCropScaleMaskHelper::class);
                break;
            default:
                throw new InvalidArgumentException(
                    'Cannot find helper for task name: "' . $taskName . '"',
                    1353401352
                );
        }

        return $helper;
    }
}
