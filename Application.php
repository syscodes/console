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

namespace Syscodes\Console;

use Syscodes\Version;
use Syscodes\Console\Formatter\Color;
use Syscodes\Support\Facades\Request;
use Syscodes\Contracts\Container\Container;
use Syscodes\Console\Formatter\OutputFormatterStyles;
use Syscodes\Contracts\Console\Application as ApplicationContracts;

/**
 * Console application.
 * 
 * @author Alexander Campo <jalexcam@gmail.com>
 */
class Application extends Console implements ApplicationContracts
{
	/**
	 * The default command.
	 * 
	 * @var string $defaultCommand
	 */
	protected $defaultCommand;

	/**
	 * The Lenevor application instance..
	 * 
	 * @var \Syscodes\Contracts\Container|Container $lenevor
	 */
	protected $lenevor;

	/**
	 * Console constructor. Initialize the console of Lenevor.
	 *
	 * @param  \Syscodes\Contracts\Core\Container  $lenevor
	 * @param  string  $version
	 * 
	 * @return void
	 */
	public function __construct(Container $lenevor, string $version)
	{
		parent::__construct(Version::NAME, $version);

		$this->lenevor 		  = $lenevor;
		$this->defaultCommand = 'list';
	}

	/**
	 * Runs the current command discovered on the CLI.
	 *
	 * @return void
	 */
	public function run()
	{
		echo $this->getVersion().\PHP_EOL;

		echo (new OutputFormatterStyles('cyan'))->apply('asasas').\PHP_EOL;
	}
}