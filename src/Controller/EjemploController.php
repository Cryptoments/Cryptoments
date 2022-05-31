<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Clientes;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class EjemploController extends AbstractController
{
    /**
     * @Route("/index", name="index")
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
        
        /* $single_user = $em->getRepository()->find('Clientes', 1); */
        return $this->render('ejemplo/index.html.twig');
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
        /* $encoded = $encoder->encodePassword($cli, $clave);
        $cli->setPass($encoded); */
		$cli->setPass($_POST['_password']);
        $em = $this->getDoctrine()->getManager();
        $em->persist($cli);
        $em->flush(); 
        /* $em = $this->getDoctrine()->getManager(); */
        //$prueba = $this->getDoctrine()->getRepository(Clientes::class)->findOneBy(array('id' => 2));
        /* $single_user = $em->getRepository()->find('Clientes', 1); */
        return $this->render('login2.html.twig');
    }
    

    //NOS LLEVA A LA PLANTILLA DE LOGIN

	/**
	 * @Route("/logear", name="logear")
	 */
	public function logear()
	{
        $em = $this->getDoctrine()->getManager();
        $prueba = $em->getRepository(Clientes::class)->findOneBy(array('nombre' => $_POST["_username"]));
        /* var_dump( $em->getRepository(Clientes::class)->findOneBy(array('nombre' => $_POST["_username"])));
        exit(); */
        if($prueba->getPass()==$_POST["_password"]){
            return $this->render('colecciones.html.twig');
        }
        else{
            return $this->render('login2.html.twig');
        }
		
	}

    /**
	 * @Route("/login2", name="login2")
	 */
	public function login2()
	{
		return $this->render('logIn2.html.twig');
	}

    //NOS LLEVA A LA PLANTILLA DE SIGN UP

	/**
	 * @Route("/signUp", name="signUp")
	 */
	public function signUp()
	{
		return $this->render('signUp2.html.twig');
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