<?php

namespace App\Domain\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IAmAliveController
 * @package App\Domain\Controller
 * @Route("/api")
 */
class IAmAliveController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/i-am-alive")
     * @return JsonResponse
     */
    public function handle()
    {
        return new JsonResponse('OK', Response::HTTP_OK);
    }
}