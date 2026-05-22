<?php

/**
 * ImageCropScaleMaskTask
 *
 * @category   Tollwerk
 * @package    Tollwerk\TwWatermark
 * @subpackage Tollwerk\TwWatermark\Resource\Processing
 * @author     tollwerk GmbH <info@tollwerk.de>
 * @license    GPL https://www.gnu.org/licenses/gpl-3.0.html.en
 * @link       https://tollwerk.de
 */

namespace Tollwerk\TwWatermark\Resource\Processing;

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * ImageCropScaleMaskTask
 *
 * @category   Tollwerk
 * @package    Tollwerk\TwWatermark
 * @subpackage Tollwerk\TwWatermark\Resource\Processing
 * @author     tollwerk GmbH <info@tollwerk.de>
 * @license    GPL https://www.gnu.org/licenses/gpl-3.0.html.en
 * @link       https://tollwerk.de
 */
class ImageCropScaleMaskTask extends \TYPO3\CMS\Core\Resource\Processing\ImageCropScaleMaskTask
{
    /**
     * Returns the checksum for this task's configuration, also taking the file and task type into account.
     *
     * @return array
     */
    public function getChecksumData(): array
    {
        // Get checksum data from base class.
        $checksumData = parent::getChecksumData();

        // If set, add copyright text to checksum data.
        $copyright = $this->getSourceFile()->getProperty('copyright');
        if ($copyright) {
            $checksumData[] = $copyright;
        }

        return $checksumData;
    }
}
