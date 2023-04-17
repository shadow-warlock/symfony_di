<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Routing\Annotation\Route;

class RootController extends AbstractController
{
    #[Route(path: '/')]
    public function root(): Response
    {
        if (
            !$this->isGranted('KERNEL_OVERWRITE') ||
            !$this->isGranted('DECORATOR_OVERWRITE')
        ) {
            throw new AccessDeniedHttpException();
        }
        return new JsonResponse();
    }
}