<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EjemploController extends AbstractController
{
    /**
     * @Route("/ejemplo", name="app_ejemplo")
     */
    public function index(): Response
    {
        return $this->render('ejemplo/index.html.twig', [
            'controller_name' => 'EjemploController',
        ]);
    }
}
