<?php

namespace App\Repository;

use App\Entity\Client;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ClientRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Client::class);
    }

    /**
     * Methode qui permet de récupérer tous les informations client
     * @return array
     */
    public function getClientsInfo()
    {
        $qd = $this->createQueryBuilder('c')
            ->select('c.id', 'c.nom', 'c.prenom', 'c.email', 'c.dateNaissance', 'COUNT(co.id) as nbCom', 'MAX(co.dateCommande) as maxDate, SUM(a.prixUnitaire) as prixMax')
            ->leftJoin('c.commande', 'co')
            ->leftjoin('co.article', 'a')
            ->groupBy('c.id', 'a.nomArticle')
            ->getQuery()
            ->getResult();
        return $qd;
    }

    /**
     * Methode qui permet d'actualiser les informations client
     */
    public function updateClientInfo(array $clientInfos)
    {
        $queryBuilder = $this->createQueryBuilder('c');
        $queryBuilder->update()
            ->set('c.nom', ':nom')
            ->set('c.prenom', ':prenom')
            ->set('c.email', ':email')
            ->set('c.dateNaissance', ':dateNaissance')
            ->where('c.id = :id')
            ->setParameter('id', $clientInfos['idClient'])
            ->setParameter('nom', $clientInfos['nomClient'])
            ->setParameter('prenom', $clientInfos['prenomClient'])
            ->setParameter('email', $clientInfos['emailClient'])
            ->setParameter('dateNaissance', $clientInfos['dateNaissanceClient'])
            ->getQuery()
            ->execute();
    }

    public function deleteClientInfo($clientId)
    {
        $this->createQueryBuilder('c')
            ->delete()
            ->where('c.id = :id')
            ->setParameter('id', $clientId)
            ->getQuery()
            ->execute();
    }

    public function createClientInfo(array $clientInfo)
    {
        $client = new client();
        $client->setNom($clientInfo['nomClient']);
        $client->setPrenom($clientInfo['prenomClient']);
        $client->setEmail($clientInfo['emailClient']);
        $client->setDateNaissance(\DateTime::createFromFormat('Y-m-d', $clientInfo['dateNaissanceClient']));
        $this->_em->persist($client);
        $this->_em->flush();
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
