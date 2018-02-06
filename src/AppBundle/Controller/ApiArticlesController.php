<?php

namespace AppBundle\Controller;

use AppBundle\Service\ArticlesSerializer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations\Get;
use AppBundle\Entity\Article;

class ApiArticlesController extends Controller
{

    /**
     * @Get("/articles")
     * Get articles list
     */
    public function getArticlesAction()
    {
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAllOrderedByTitle();

        return new JsonResponse($this->get(ArticlesSerializer::class)->serialize($articles), 200);
    }


    /**
     * @Get("/article/{id}", requirements={"id"="\d+"})
     * @param $id
     * @return JsonResponse
     */
    public function getArticleAction($id)
    {
        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findOneById($id);

        if ($article === null) {

            return new JsonResponse([], 404);
        }

        return new JsonResponse($this->get(ArticlesSerializer::class)->serialize($article), 200);
    }

}
