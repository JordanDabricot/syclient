<?php
/**
 * Created by PhpStorm.
 * User: jdabricot
 * Date: 01/02/18
 * Time: 12:12
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientController extends Controller
{
    /**
     * Page d'accueil, affichage informations clients
     * @Route("/")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $clients = $em->getRepository('App:Client')->getClientsInfo();
        return $this->render('base.html.twig', [
            'clients' => $clients
        ]);
    }

    /**
     * Process generate update form and delete Information client
     * @Route("/process")
     */
    public function processAction(Request $request)
    {
        if($request->request->has("edit")){
            $em = $this->getDoctrine()->getManager();
            $client = $em->getRepository('App:Client')->find($request->request->get("edit"));
            return $this->render('updateClient.html.twig', [
                'client' => $client
            ]);
        }
        if($request->request->has("delete")){
            $this->getDoctrine()->getManager()->getRepository('App:Commande')->deleteCommandeClientInfo($request->request->get("delete"));
            $this->getDoctrine()->getManager()->getRepository('App:Client')->deleteClientInfo($request->request->get("delete"));
            return $this->redirect("/");
        }
        else{
            return 'impossible';
        }
    }

    /**
     * Process update form validation and update client information
     * @Route("/update")
     * @param Request $request
     * @return Response
     */
    public function updateAction(Request $request)
    {
        if($request->request->has("submit")){
            $dataPost = array(
                'idClient' => $request->request->get("submit"),
                'nomClient' => $request->request->get("nom"),
                'prenomClient' => $request->request->get("prenom"),
                'emailClient' => $request->request->get("email"),
                'dateNaissanceClient' => $request->request->get("dateNaissance")
            );
            $this->getDoctrine()->getManager()->getRepository('App:Client')->updateClientInfo($dataPost);
            return $this->redirect("/");
        }
    }

    /**
     * Process add Client
     * @Route("/create")
     * @param Request $request
     * @return Response
     */
    public function createClientAction(Request $request)
    {
        if($request->request->has("submit")){
            $dataPost = array(
                'nomClient' => $request->request->get("nom"),
                'prenomClient' => $request->request->get("prenom"),
                'emailClient' => $request->request->get("email"),
                'dateNaissanceClient' => $request->request->get("dateNaissance")
            );
            var_dump($dataPost);
            $this->getDoctrine()->getManager()->getRepository('App:Client')->createClientInfo($dataPost);
            return $this->redirect("/");
        }
        return $this->render('createClient.html.twig');
    }
}