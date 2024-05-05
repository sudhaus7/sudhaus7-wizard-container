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

use SUDHAUS7\Sudhaus7Wizard\Interfaces\WizardTemplateConfigInterface;

class WizardTemplateConfig implements WizardTemplateConfigInterface
{
    /**
     * @inheritDoc
     */
    public function getExtension(): string
    {
        return 'sudhaus7wizard_container';
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function getSourcePid(): int|string
    {
        return 0;
    }

    /**
     * @inheritDoc
     */
    public function getFlexinfoFile(): string
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function getAddFields(): string
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function modifyRecordTCA(array $TCA): array
    {
        return $TCA;
    }
}
