<?php

/**
 * Lenevor Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file license.md.
 * It is also available through the world-wide-web at this URL:
 * https://lenevor.com/license
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@Lenevor.com so we can send you a copy immediately.
 *
 * @package     Lenevor
 * @subpackage  Base
 * @link        https://lenevor.com
 * @copyright   Copyright (c) 2019 - 2021 Alexander Campo <jalexcam@gmail.com>
 * @license     https://opensource.org/licenses/BSD-3-Clause New BSD license or see https://lenevor.com/license or see /license.md
 */

namespace Syscodes\Console\Concerns;

use Syscodes\Console\Style\ColorTag;

/**
 * Trait ApplicationHelp.
 * 
 * @author Alexander Campo <jalexcam@gmail.com>
 */
trait ApplicationHelp
{
    /**
     * Displays the version info.
     * 
     * @param  \Syscodes\Contracts\Console\Output  $output  The output interface implemented
     * 
     * @return int
     */
    public function displayVersionInfo($output) 
    {
        $output->writeln($this->getConsoleWithLogo());
    }

    /**
     * Returns the version of the console with logo.
     *
     * @return string
     */
    public function getConsoleWithLogo(): string
    {
        $updateAt  = $this->getParam('updateAt', 'Unknown');
        $createdAt = $this->getParam('createdAt', 'Unknown');

        if ($logoTxt = $this->getLogoText()) {
            $logo = ColorTag::wrap($logoTxt, $this->getLogoStyle());
        }

        $info = "$logo\n".$this->getConsoleVersion().
                "\n\n<suc>Application Info</suc>: Update at <green>$updateAt</green>, created at <green>$createdAt</green>";

        if ($hUrl = $this->getParam('homepage')) {
            $info .= "\n\t<suc>Homepage</suc>: $hUrl\n";
        } elseif ('' !== $this->getParam('homePage')) {
            $info .= "\n";
        }

        return $info;
    }

    /**
     * Returns the version of the console.
     *
     * @return string
     */
    public function getConsoleVersion()
    {
        if ('UNKNOWN' !== $this->getName()) {
            if ('UNKNOWN' !== $this->getVersion()) {
                return sprintf('%s <info>%s</info> (env: <comment>%s</comment>, debug: <comment>%s</comment>) [<magenta>%s</magenta>]', 
                    $this->getName(), 
                    $this->getVersion(),
                    env('APP_ENV'),
                    env('APP_DEBUG') ? 'true' : 'false',
			        PHP_OS
                );
            }

            return $this->getName();
        }

        return 'Lenevor CLI Console';
    }
}