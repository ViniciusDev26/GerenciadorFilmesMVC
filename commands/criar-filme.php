<?php

use Gerenciador\Doctrine\Entity\Filme;
use Gerenciador\Doctrine\Entity\Genero;
use Gerenciador\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerFactory())->getEntityManager();

$nome = $argv[1];
$sinopse = $argv[2];

$filme = new Filme();
$filme->setNome($nome);
$filme->setSinopse($sinopse);

for($i = 3; $i < $argc; $i++){
    $genero = $entityManager->find(Genero::class, $argv[$i]);
    $filme->addGenero($genero);
}

$entityManager->persist($filme);
$entityManager->flush();