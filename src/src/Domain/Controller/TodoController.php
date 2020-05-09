<?php


namespace App\Domain\Controller;


use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TodoController extends AbstractFOSRestController
{

    /**
     * @Rest\Get("/adapter/todos/")
     * @return JsonResponse
     */
    public function getAll()
    {
        $todos = [];
        return new JsonResponse($todos, Response::HTTP_OK);
    }
}