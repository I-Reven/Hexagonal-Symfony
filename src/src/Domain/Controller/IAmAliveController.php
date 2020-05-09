<?php

namespace App\Domain\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IAmAliveController
 * @package App\Domain\Controller
 */
class IAmAliveController extends AbstractFOSRestController
{

    /**
     * @Rest\Get("/api/i-am-alive")
     * @return JsonResponse
     */
    public function handle()
    {
        return new JsonResponse('OK', Response::HTTP_OK);
    }
}