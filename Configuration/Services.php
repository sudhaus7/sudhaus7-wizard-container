<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function ( ContainerConfigurator $containerConfigurator, ContainerBuilder $containerBuilder): void {
	$services = $containerConfigurator->services();
	$services->defaults()
	         ->autowire()
	         ->autoconfigure();

	$services->load( 'SUDHAUS7\\Sudhaus7Wizard\\', __DIR__ . '/../Classes/' )
	         ->exclude( [] );

	$services->set(FixContainerRelationEventHandler::class)
		->public()
		->tag('event.listener', ['identifier' => 's7WizardContainerFixContainerRelationEventHandler']);
};
