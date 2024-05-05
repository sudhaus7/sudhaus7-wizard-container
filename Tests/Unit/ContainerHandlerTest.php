<?php

/*
 * This file is part of the TYPO3 project.
 *
 * @author Frank Berger <fberger@sudhaus7.de>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace SUDHAUS7\Sudhaus7WizardContainer\Tests\Unit;

use SUDHAUS7\Sudhaus7Wizard\CreateProcess;
use SUDHAUS7\Sudhaus7Wizard\Events\FinalContentEvent;
use SUDHAUS7\Sudhaus7WizardContainer\FixContainerRelationEventHandler;
use SUDHAUS7\Sudhaus7WizardContainer\Tests\Mocks\WizardProcess;
use TYPO3\CMS\Core\EventDispatcher\EventDispatcher;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class ContainerHandlerTest extends UnitTestCase
{
	protected CreateProcess $create_process;

	/**
	 * @test
	 * @return void
	 */
	public function testTtcontentSubstitutionForContainerChildren()
	{
		$event = new FinalContentEvent( 'tt_content', [
			'uid'=>15,
			'tx_container_parent'=>1,
		], $this->create_process);

		$handler = new FixContainerRelationEventHandler();
		$handler($event);
		$this->assertEquals(10,$event->getRecord()['tx_container_parent']);

	}

	/**
	 * @test
	 * @return void
	 */
	public function testNoSubstitutionForContainerChildrenIfUnkownIdentifierIsGiven()
	{
		$event = new FinalContentEvent( 'tt_content', [
			'uid'=>15,
			'tx_container_parent'=>100,
		], $this->create_process);

		$handler = new FixContainerRelationEventHandler();
		$handler($event);
		$this->assertEquals(100,$event->getRecord()['tx_container_parent']);

	}

	public function testIgnoreContentThatHasNoContainerParent () {
		$event = new FinalContentEvent( 'tt_content', [
			'uid'=>15,
			'tx_container_parent'=>0,
		], $this->create_process);

		$handler = new FixContainerRelationEventHandler();
		$handler($event);
		$this->assertEquals(0,$event->getRecord()['tx_container_parent']);

	}

	protected function setUp(): void
	{
		$eventDispatcher = $this->createMock(EventDispatcher::class);

		$this->create_process = new CreateProcess($eventDispatcher);
		$this->create_process->setTemplate( new WizardProcess());
		$this->create_process->pageMap = [
			1 => 10,
			2 => 20,
			3 => 30,
		];
		$this->create_process->contentMap = [
			'pages' => $this->create_process->pageMap,
			'tt_content' => $this->create_process->pageMap,
		];

		parent::setUp();
	}
}
