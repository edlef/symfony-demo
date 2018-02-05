<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations\Get;

class ApiArticlesController extends Controller
{

    /**
     * @Get("/places")
     */
    public function getArticlesAction(Request $request)
    {
        return new JsonResponse('olo');
    }

}
