<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Clientes;
use App\Entity\Drops;
use App\Entity\Encuestas;
use App\Entity\Usuarios;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class EjemploController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(): Response
    {
        return $this->render('index.html');
    }


    /**
     * @Route("/crearUsuario", name="crearUsuario")
     */
    public function crearUsuario(UserPasswordEncoderInterface $encoder): Response
    {
        
        /* insertar en bd */
        $cli = new Clientes();
        $cli->setNombre($_POST['_username']);
        $cli->setEmail("prueba@asda.com");
        $clave = $_POST['_password'];
		$cli->setPass($_POST['_password']);
        $em = $this->getDoctrine()->getManager();
        $em->persist($cli);
        $em->flush(); 
        return $this->render('login2.html.twig');
    }
    

    /**
	 * @Route("/login", name="acceso_login")
	 */
	public function login()
	{
		return $this->render('login.html.twig');
	}

    //NOS LLEVA A LA PLANTILLA DE SIGN UP

	/**
	 * @Route("/registration", name="acceso_registration")
	 */
	public function registration()
	{
		return $this->render('registration.html.twig');
	}

    /**
     * @Route("/colecciones", name="colecciones")
     */
    public function colecciones(): Response
    {
        return $this->render('colecciones.html.twig');
    }

    /**
     * @Route("/coleccion/{nombre}", name="coleccion")
     */
    public function coleccion($nombre): Response
    {
        return $this->render('coleccion.html.twig',array(
            'nombre' => $nombre));
    }

    

}