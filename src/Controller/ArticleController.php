<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    /**
     * @Route("/article", name="article")
     */
    public function index(Request $request)
    {
        if ($request->request->has('idArt'))
        {
            $em = $this->getDoctrine()->getManager();
            $article = $em->getRepository('App:Article')->findBy(array('id' => $request->request->get("idArt")));
            return $this->render('article.html.twig', [
                'article' => $article
            ]);
        }
    }
}