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

        return $this->render('@App/articles/list.html.twig', [ 'articles' => $articles ]);
    }

    /**
     * @Route("/admin/articles/{id}", name="article_detail", requirements={"id" = "\d+"})
     * @param $id
     * @return Response
     */
    public function detailAction($id)
    {

        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findOneById($id);

        dump($article);

        return $this->render('@App/articles/detail.html.twig', [ 'article' => $article ]);
    }
}
