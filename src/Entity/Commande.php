<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="prix", type="decimal", scale=2)
     */
    private $prix;

    /**
     * @ORM\Column(name="nombre_article", type="integer")
     */
    private $nombreArticle;

    /**
     * @ORM\Column(name="date_commande", type="date")
     */
    private $dateCommande;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="commande")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="commande")
     * @ORM\JoinColumn(name="id_article", referencedColumnName="id")
     */
    private $article;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * @param mixed $dateCommande
     */
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param mixed $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
    }

    /**
     * @return mixed
     */
    public function getNombreArticle()
    {
        return $this->nombreArticle;
    }

    /**
     * @param mixed $nombreArticle
     */
    public function setNombreArticle($nombreArticle)
    {
        $this->nombreArticle = $nombreArticle;
    }



}
