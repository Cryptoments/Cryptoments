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


    /**
     * @Route("/crearUsuario", name="crearUsuario")
     */
    public function crearUsuario(UserPasswordEncoderInterface $encoder, UserInterface $cosa): Response
    {
        
        /* insertar en bd */
        $cli = new Clientes();
        $cli->setNombre($_POST['nombre_usu']);
        $clave = $_POST['clave_usu'];
		$encoded = $encoder->encodePassword($cosa, $clave);
		$cli->setPass($encoded);
        $em = $this->getDoctrine()->getManager();
        $em->persist($cli);
        $em->flush(); 
        $em = $this->getDoctrine()->getManager();
        //$prueba = $this->getDoctrine()->getRepository(Clientes::class)->findOneBy(array('id' => 2));
        /* $single_user = $em->getRepository()->find('Clientes', 1); */
        return $this->render('login2.html.twig');
    }
    

    //NOS LLEVA A LA PLANTILLA DE LOGIN

	/**
	 * @Route("/login", name="acceso_login")
	 */
	public function login()
	{
		return $this->render('logIn.html.twig');
	}

    /**
	 * @Route("/login2", name="acceso_login")
	 */
	public function login2()
	{
		return $this->render('logIn2.html.twig');
	}

    //NOS LLEVA A LA PLANTILLA DE SIGN UP

	/**
	 * @Route("/signUp", name="acceso_signUp")
	 */
	public function signUp()
	{
		return $this->render('signUp2.html.twig');
	}

    

    

}