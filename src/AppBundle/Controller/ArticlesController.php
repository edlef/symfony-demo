<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticlesController extends Controller
{
    /**
     * @Route("/admin/articles", name="articles_list")
     */
    public function listAction()
    {

        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAllOrderedByTitle();

        dump($articles);

        return $this->render('@App/articles/list.html.twig');
    }
}
