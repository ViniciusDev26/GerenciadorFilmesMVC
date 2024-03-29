<?php
namespace Gerenciador\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir . '/src'],true
        );
        $connectionParams = array(
            'dbname' => 'gerenciadorFilmes',
            'user' => 'postgres',
            'password' => 'asdasd',
            'host' => 'localhost',
            'driver' => 'pdo_pgsql',
        );
        return EntityManager::create($connectionParams, $config);
    }
}