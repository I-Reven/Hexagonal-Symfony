<?php


namespace App\Domain\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Domain\Contract\Service\DeveloperServiceContract;
use FOS\RestBundle\Controller\Annotations\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DeveloperController
 * @package App\Domain\Controller
 * @Route("/api")
 */
class DeveloperController extends AbstractFOSRestController
{
    /** @var DeveloperServiceContract  */
    private DeveloperServiceContract $developerService;

    public function __construct(DeveloperServiceContract $developerService)
    {
        $this->developerService = $developerService;
    }

    /**
     * @Rest\Get("/developers")
     * @return JsonResponse
     */
    public function getAll()
    {
        return new JsonResponse($this->developerService->getDevelopers(), Response::HTTP_OK);
    }
}