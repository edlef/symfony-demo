<?php

namespace AppBundle\Controller;

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
     */
    public function getArticlesAction()
    {
        return new JsonResponse('ok', 200);
    }

}
