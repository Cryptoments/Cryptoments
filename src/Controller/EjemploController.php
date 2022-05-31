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

    //CONTROLADOR DEL INDEX
    /**
     * @Route("/index", name="index")
     */
    public function index(): Response
    {
        return $this->render('index.html');
    }

    
    //CONTROLADOR QUE REGISTRA UN USUARIO
    /**
     * @Route("/crearUsuario", name="crearUsuario")
     */
    public function crearUsuario(UserPasswordEncoderInterface $encoder): Response
    {
        
        /* insertar en bd */
        $cli = new Clientes();
        $cli->setNombre($_POST['_username']);
        $cli->setEmail($_POST['_email']);
        $clave = $_POST['_password'];
		$cli->setPass($clave);
        $em = $this->getDoctrine()->getManager();
        $em->persist($cli);
        $em->flush(); 
        return $this->render('login.html.twig');
    }
    
    //CONTROLADOR QUE DEVUELVE EL LOGIN
    /**
	 * @Route("/login", name="acceso_login")
	 */
	public function login()
	{
		return $this->render('login.html.twig');
	}

    //CONTROLADOR QUE DEVUELVE EL REGISTRO
	/**
	 * @Route("/registration", name="acceso_registration")
	 */
	public function registration()
	{
		return $this->render('registration.html.twig');
	}

    //CONTROLADOR QUE MUESTRA LAS COLECCIONES
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