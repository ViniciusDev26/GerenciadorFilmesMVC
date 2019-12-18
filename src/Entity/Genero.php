<?php

namespace Gerenciador\Doctrine\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Genero {
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
     * @ManyToMany(targetEntity="Filme", inversedBy="generos")
     */
    private $filmes;

    public function __construct(){
        $this->filmes = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }
 
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getFilme(): Collection
    {
        return $this->filmes;
    }

    public function addFilme($filme): self
    {
        if($this->filmes->contains($filme)){
            return $this;
        }

        $this->filmes->add($filme);
        $filme->addGenero($this);
        return $this;
    }
}