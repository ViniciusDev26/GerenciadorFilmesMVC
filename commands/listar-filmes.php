<?php

use Gerenciador\Doctrine\Entity\Filme;
use Gerenciador\Doctrine\Entity\Genero;
use Gerenciador\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerFactory())->getEntityManager();

$filme_class = Filme::class;
$dql = "SELECT f, g from $filme_class f JOIN f.generos g";
$query = $entityManager->createQuery($dql);
$filmes = $query->getResult();

foreach($filmes as $filme){
    echo "ID: {$filme->getId()}\n";
    echo "Nome: {$filme->getNome()}\n";

    $generos = $filme->getGeneros();
    foreach($generos as $genero){
        echo "\t ID Genero: {$genero->getId()}\n";
        echo "\t Genero: {$genero->getNome()}\n";
        echo "\n";
    }
    echo "\n";
}