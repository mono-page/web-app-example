<?php declare(strict_types=1);

use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once 'vendor/autoload.php';

$config = Setup::createConfiguration(
    $isDevMode = true,
    $proxyDir = null,
    $cache = null
);
$config->setMetadataDriverImpl(new PHPDriver(__DIR__ . '/src/mapping'));

return $entityManager = EntityManager::create([
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
], $config);
