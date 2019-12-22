<?php declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Doctrine\ORM\EntityManager;
use Monopage\Languages\Repositories\Interfaces\LanguageRepositoryInterface;
use Monopage\Languages\Repositories\LanguageDefaultRepository;

return static function (ContainerConfigurator $configurator) {
    $services = $configurator->services()
        ->defaults()
        ->autowire()
        ->autoconfigure();

    // todo нужно сконфигурировать: Connection $conn, Configuration $config, EventManager $eventManager
    $services->set(EntityManager::class)
        ->autowire();

    $services->set(LanguageDefaultRepository::class)
        ->autowire()
        ->autoconfigure()
        ->alias(
            LanguageRepositoryInterface::class,
            LanguageDefaultRepository::class
        );
};
