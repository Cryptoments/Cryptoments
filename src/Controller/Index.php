<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Clientes;
use App\Entity\Drops;
use App\Entity\Encuestas;
use App\Entity\Usuarios;

class Index extends AbstractController
{
    /**
     * @Route("/index", name="ctrl_index")
     */
    public function index()
    {
        return $this->render('index.html');
    }
}