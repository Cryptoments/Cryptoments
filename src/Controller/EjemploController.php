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
	public function inicio(Request $request)
	{
        return $this->render('index.html.twig',array(
            'usuario' => $request->getSession()->get("username")));
	}
    /**
     * @Route("/index", name="index")
     */
    public function index(Request $request): Response
    {
       
        return $this->render('index.html.twig',array(
            'usuario' => $request->getSession()->get("username")));
    }

    /**
	 * @Route("/administrador", name="administrador")
	 */
	public function administrador(Request $request)
	{
        return $this->render('principal.html.twig',array(
            'usuario' => $request->getSession()->get("username")));
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
		$cli->setPass($_POST['_password']);
        $em = $this->getDoctrine()->getManager();
        $em->persist($cli);
        $em->flush(); 
        return $this->render('login2.html.twig');
    }
    
    //CONTROLADOR QUE DEVUELVE EL LOGIN
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

    //CONTROLADOR QUE PROCESA UNA PETICION DE LOGIN
	/**
	 * @Route("/logear", name="logear")
	 */
	public function logear(Request $request)
	{
        
        
        $em = $this->getDoctrine()->getManager();
        $prueba = $em->getRepository(Clientes::class)->findOneBy(array('nombre' => $_POST["_username"]));
        $session = $request->getSession();
        if($prueba!=null){
        if($prueba->getPass()==$_POST["_password"]){
            $session->set("username", $_POST["_username"]);
            return $this->render('index.html.twig',array(
                'usuario' => $_POST["_username"]));
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
	 * @Route("/logout", name="logout")
	 */
	public function logout(Request $request)
	{
        if($request->getSession()->get("username")!=null){
            $request->getSession()->invalidate();
        }
        
		return $this->render('logIn2.html.twig');
	}
    //CONTROLADOR QUE DEVUELVE LA PRINCIPAL
    /**
	 * @Route("/principal", name="acceso_principal")
	 */
	public function principal(Request $request)
	{
        
        $session = $request->getSession()->get("username");
        
        if($request->getSession()->get("username")!=null){
            return $this->render('principal.html.twig',array(
                'usuario' => $request->getSession()->get("username")));
        }
        else{
            return $this->render('index.html.twig',array(
                "error"=>"Primero debe haber iniciado sesión para acceder a la página",
                "usuario"=>$request->getSession()->get("username")
            ));
        }
	}


    //CONTROLADOR QUE PROCESA EL LOGIN
    //NOS LLEVA A LA PLANTILLA DE SIGN UP
	/**
	 * @Route("/registration", name="registration")
	 */
	public function signUp()
	{
		return $this->render('signUp2.html.twig');
	}

    //CONTROLADOR QUE MUESTRA LAS COLECCIONES
    /**
     * @Route("/colecciones", name="colecciones")
     */
    public function colecciones(Request $request): Response
    {
        return $this->render('colecciones.html.twig',array(
            'usuario' => $request->getSession()->get("username")));
    }

    /**
     * @Route("/coleccion/{nombre}", name="coleccion")
     */
    public function coleccion($nombre, Request $request): Response
    {
        return $this->render('coleccion.html.twig',array(
            'nombre' => $nombre,
            'usuario' => $request->getSession()->get("username")),
        );
    }

     /**
     * @Route("/col/suscribirse", name="col/suscribirse")
     */
    public function suscribirse(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $prueba = $em->getRepository(Clientes::class)->findOneBy(array('nombre' =>$request->getSession()->get("username")));
        $prueba2 = $em->getRepository(Colecciones::class)->findOneBy(array('idColeccion' =>$_POST["coleccion"]));
        $clientes_colecciones=new ClientesColecciones();
        $clientes_colecciones->setIdCliente($prueba);
        $clientes_colecciones->setIdColeccion($prueba2);
        $em->persist($clientes_colecciones);
        $em->flush();
        return new Response(json_encode(array('nombre' => "Todo bien")));
    }

    /**
     * @Route("/paneladmin", name="ctrl_admin")
     */
    public function panelAdmin(Request $request)
	{
        if($request->getSession()->get("username")=='administrador'){
                return $this->render('paneladmin.html.twig',array(
                    'usuario' => $request->getSession()->get("username")));
        }else{
                return $this->render('index.html.twig',array(
                    'usuario' => $request->getSession()->get("username")));
        }
        
	}

    /**
     * @Route("/procesadoadmin", name="ctrl_procesadoadmin")
     */
    public function procesadoAdmin(Request $request)
	{
        $recordsTotal = 4;
        $recordsFiltered = 4;
        $usuarios = $this->getDoctrine()->getRepository(Clientes::class)->findAll();
        return $this->json([
            'data' => $usuarios,
        ]);
	}

}