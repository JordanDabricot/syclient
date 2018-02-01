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
     * @ORM\Column(name="date_commande", type="date")
     */
    private $dateCommande;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="compteConnecteur")
     * @ORM\JoinColumn(name="id_connecteur", referencedColumnName="id", nullable=false)
     */
    private $clientCommande;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Article")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     */
    private $article;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clientCommande = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add clientCommande
     *
     * @param \App\Entity\clientCommande $clientCommande
     *
     * @return clientCommande
     */
    public function addclientCommande(\App\Entity\Client $clientCommande)
    {
        $this->clientCommande[] = $clientCommande;

        return $this;
    }

    /**
     * Get clientCommande
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClientCommande()
    {
        return $this->clientCommande;
    }

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


}
