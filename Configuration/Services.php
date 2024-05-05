<?php

declare(strict_types=1);

use SUDHAUS7\Sudhaus7WizardContainer\FixContainerRelationEventHandler;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function ( ContainerConfigurator $containerConfigurator, ContainerBuilder $containerBuilder): void {
	$services = $containerConfigurator->services();
	$services->defaults()
	         ->autowire()
	         ->autoconfigure();

	$services->load( 'SUDHAUS7\\Sudhaus7WizardContainer\\', __DIR__ . '/../Classes/' )
	         ->exclude( [] );

	$services->set(FixContainerRelationEventHandler::class)
		->public()
		->tag('event.listener', ['identifier' => 's7WizardContainerFixContainerRelationEventHandler']);
};
