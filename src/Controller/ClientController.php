<?php
/**
 * Created by PhpStorm.
 * User: jdabricot
 * Date: 01/02/18
 * Time: 12:12
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $clients = $em->getRepository('App:Commande')->getClientInfo();

        return $this->render('base.html.twig', [
            'clients' => $clients
        ]);
    }
}