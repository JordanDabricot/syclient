<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="nom_article", type="string", length=100)
     */
    private $nomArticle;

    /**
     * @ORM\Column(name="prix_unitaire", type="decimal", scale=2)
     */
    private $prixUnitaire;

    /**
     * @ORM\Column(name="quantite_article", type="integer")
     */
    private $quantiteArticle;

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
    public function getNom()
    {
        return $this->nomArticle;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nomArticle)
    {
        $this->nomArticle = $nomArticle;
    }

    /**
     * @return mixed
     */
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    /**
     * @param mixed $prixUnitaire
     */
    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;
    }

    /**
     * @return mixed
     */
    public function getQuantiteArticle()
    {
        return $this->quantiteArticle;
    }

    /**
     * @param mixed $quantiteArticle
     */
    public function setQuantiteArticle($quantiteArticle)
    {
        $this->quantiteArticle = $quantiteArticle;
    }


}
