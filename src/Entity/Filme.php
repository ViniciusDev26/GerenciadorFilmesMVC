<?php

namespace Gerenciador\Doctrine\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Filme {
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    
    /** 
     * @Column(type="string")
     */
    private $nome;
    /** 
     * @Column(type="string")
     */
    private $sinopse;
    /**
     * @ManyToMany(targetEntity="Genero", mappedBy="filmes", cascade={"remove","persist"})
     */
    private $generos;

    public function __construct(){
        $this->generos = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getSinopse()
    {
        return $this->sinopse;
    }

    public function setSinopse($sinopse)
    {
        $this->sinopse = $sinopse;
        return $this;
    }

    public function getGeneros(): Collection
    {
        return $this->generos;
    }

    public function addGenero(Genero $genero): self
    {
        if($this->generos->contains($genero)){
            return $this;
        }

        $this->generos->add($genero);
        $genero->addFilme($this);
        return $this;
    }
}