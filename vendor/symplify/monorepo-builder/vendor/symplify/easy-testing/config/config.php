<?php

declare (strict_types=1);
namespace MonorepoBuilder20211223;

use MonorepoBuilder20211223\Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use MonorepoBuilder20211223\Symplify\EasyTesting\Command\ValidateFixtureSkipNamingCommand;
use function MonorepoBuilder20211223\Symfony\Component\DependencyInjection\Loader\Configurator\service;
return static function (\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->defaults()->public()->autowire()->autoconfigure();
    $services->load('MonorepoBuilder20211223\Symplify\EasyTesting\\', __DIR__ . '/../src')->exclude([__DIR__ . '/../src/DataProvider', __DIR__ . '/../src/Kernel', __DIR__ . '/../src/ValueObject']);
    // console
    $services->set(\MonorepoBuilder20211223\Symfony\Component\Console\Application::class)->call('add', [\MonorepoBuilder20211223\Symfony\Component\DependencyInjection\Loader\Configurator\service(\MonorepoBuilder20211223\Symplify\EasyTesting\Command\ValidateFixtureSkipNamingCommand::class)]);
};
