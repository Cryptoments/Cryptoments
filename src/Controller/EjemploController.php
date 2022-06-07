<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Clientes;
use App\Entity\Colecciones;
use App\Entity\ClientesColecciones;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class EjemploController extends AbstractController
{
    
    /**
	 * @Route("/", name="inicio")
	 */
	public function inicio()
	{
        return $this->render('index.html.twig');
	}
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
        return $this->render('index.html.twig');
    }

    //CONTROLADOR QUE DEVUELVE LA PRINCIPAL
    /**
	 * @Route("/principal", name="acceso_principal")
	 */
	public function principal(Request $request)
	{
        
        $session = $request->getSession()->get("username");
        
        if($request->getSession()->get("username")!=null){
            return $this->render('principal.html.twig');
        }
        else{
            return $this->render('index.html.twig',array("error"=>"Primero debe haber iniciado sesión para acceder a la página"));
        }
	}

    /**
	 * @Route("/administrador", name="administrador")
	 */
	public function administrador()
	{
        return $this->render('principal.html.twig');
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
	public function logear(Request $request)
	{
        
        
        $em = $this->getDoctrine()->getManager();
        $prueba = $em->getRepository(Clientes::class)->findOneBy(array('nombre' => $_POST["_username"]));
        /* var_dump( $em->getRepository(Clientes::class)->findOneBy(array('nombre' => $_POST["_username"])));
        exit(); */
        $session = $request->getSession();
        if($prueba!=null){
        if($prueba->getPass()==$_POST["_password"]){
            /* $_SESSION["username"]=$_POST["_username"]; */
            $session->set("username", $_POST["_username"]);
            return $this->render('index.html.twig');
        }
        else{
            return $this->render('login2.html.twig',array(
                'error' => "Usuario o contraseña incorrecta."));
        }
    }
    else{
        return $this->render('login2.html.twig',array(
            'error' => "Usuario o contraseña incorrecta."));
    }
		
	}

    /**
	 * @Route("/login", name="login")
	 */
	public function login2(Request $request)
	{
        
        if($request->getSession()->get("username")!=null){
            $request->getSession()->invalidate();
        }
        
		return $this->render('logIn2.html.twig');
	}

     /**
	 * @Route("/logout", name="logout")
	 */
	public function logout(Request $request)
	{
        if($request->getSession()->get("username")!=null){
            $request->getSession()->invalidate();
        }
        
		return $this->render('logIn2.html.twig');
	}

    //NOS LLEVA A LA PLANTILLA DE SIGN UP

	/**
	 * @Route("/registration", name="registration")
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

     /**
     * @Route("/col/suscribirse", name="col/suscribirse")
     */
    public function suscribirse(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
         $prueba = $em->getRepository(Clientes::class)->findOneBy(array('nombre' =>$request->getSession()->get("username")));
         
        //$prueba = $em->getRepository(Clientes::class)->findOneBy(array('nombre' =>"ruben"));
        $prueba2 = $em->getRepository(Colecciones::class)->findOneBy(array('idColeccion' =>$_POST["coleccion"]));
        $clientes_colecciones=new ClientesColecciones();
        $clientes_colecciones->setIdCliente($prueba);
        $clientes_colecciones->setIdColeccion($prueba2);
        $em->persist($clientes_colecciones);
        $em->flush();
        return new Response(json_encode(array('nombre' => "Todo bien")));
    }

    

}