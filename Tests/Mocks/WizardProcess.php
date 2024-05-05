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

namespace SUDHAUS7\Sudhaus7WizardContainer\Tests\Mocks;

use SUDHAUS7\Sudhaus7Wizard\CreateProcess;
use SUDHAUS7\Sudhaus7Wizard\Interfaces\WizardProcessInterface;
use SUDHAUS7\Sudhaus7Wizard\Interfaces\WizardTemplateConfigInterface;

class WizardProcess implements WizardProcessInterface
{
    /**
     * @inheritDoc
     */
    public static function getWizardConfig(): WizardTemplateConfigInterface
    {
       return new WizardTemplateConfig();
    }

    /**
     * @inheritDoc
     */
    public static function checkWizardConfig(array $data): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getTemplateBackendUser(CreateProcess $pObj): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getTemplateBackendUserGroup(CreateProcess $pObj): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getMediaBaseDir(): string
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function finalize(CreateProcess &$pObj): void
    {
    }
}
