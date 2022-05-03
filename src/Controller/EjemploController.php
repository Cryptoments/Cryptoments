<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EjemploController extends AbstractController
{
    /**
     * @Route("/inicio", name="inicio")
     */
    public function index(): Response
    {
        return $this->render('ejemplo/index.html.twig');
    }
        /**
     * @Route("/principal", name="principal")
     */
    public function principal(): Response
    {
        return $this->render('principal.html.twig');
    }
}
