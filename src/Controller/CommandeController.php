<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommandeController extends Controller
{
    /**
     * @Route("/commande", name="commande")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->request->has('com')){
            $em = $this->getDoctrine()->getManager();
            $commande = $em->getRepository('App:Commande')->findBy(array('client' => $request->request->get("com")));
            return $this->render('commande.html.twig', [
                'commande' => $commande
            ]);
        }else{
            echo 'problème';
        }
    }
}
