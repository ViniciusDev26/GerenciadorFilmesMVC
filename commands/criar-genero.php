<?php

use Gerenciador\Doctrine\Entity\Genero;
use Gerenciador\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerFactory())->getEntityManager();

$nome = $argv[1];

$genero = new Genero();
$genero->setNome($nome);

$entityManager->persist($genero);
$entityManager->flush();