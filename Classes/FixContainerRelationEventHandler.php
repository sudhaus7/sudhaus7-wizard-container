<?php
declare(strict_types=1);

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

namespace SUDHAUS7\Sudhaus7WizardContainer;

use SUDHAUS7\Sudhaus7Wizard\Events\FinalContentEvent;
use SUDHAUS7\Sudhaus7Wizard\Interfaces\WizardProcessInterface;

class FixContainerRelationEventHandler
{
    public function __invoke(FinalContentEvent $event): void
    {
        if (
            $event->getCreateProcess()->getTemplate() instanceof WizardProcessInterface
             && $event->getTable() === 'tt_content'
        ) {
            $record = $event->getRecord();
            if (isset($record['tx_container_parent']) && (int)$record['tx_container_parent'] > 0) {
                $record['tx_container_parent'] = $event->getCreateProcess()
                                                  ->getTranslateUid('tt_content', (int)$record['tx_container_parent']);

                $event->setRecord($record);
            }
        }
    }
}
