<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Clientes;

class EjemploController extends AbstractController
{
    /**
     * @Route("/ejemplo", name="app_ejemplo")
     */
    public function index(): Response
    {
        /* insertar en bd */
        /*  $cli = new Clientes();
        $cli->setNombre('PruebaInsert');
        $cli->setPass('PruebaInsert');
        $cli->setEmail('PruebaInsert');
        $em = $this->getDoctrine()->getManager();
        $em->persist($cli);
        $em->flush(); */
        $em = $this->getDoctrine()->getManager();
        $prueba = $this->getDoctrine()->getRepository(Clientes::class)->findOneBy(array('id' => 2));
        /* $single_user = $em->getRepository()->find('Clientes', 1); */
        return $this->render('ejemplo/index.html.twig', [
            'prueba' => $prueba,
        ]);
    }
}