<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommandeController extends Controller
{
    /**
     * @Route("/commande")
     */
    public function index(Request $request)
    {
        if ($request->request->has('com')){
            $em = $this->getDoctrine()->getManager();
            $commande = $em->getRepository('App:Commande')->find($request->request->get("com"));
            var_dump($commande);
            die();
            return $this->render('commande.html.twig', [
                'commande' => $commande
            ]);
        }

        $this->render('commande.html.twig');
    }
}
