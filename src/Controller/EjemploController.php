<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
$session = new Session();
        $session->start();
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
        return $this->render('index.html.twig');
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

    //CONTROLADOR QUE DEVUELVE LA PRINCIPAL
    /**
	 * @Route("/principal", name="acceso_principal")
	 */
	public function principal()
	{
        return $this->render('principal.html.twig');
	}

    //CONTROLADOR QUE PROCESA EL LOGIN
    /**
	 * @Route("/procesadologin", name="procesado_login")
	 */
	public function procesadoLogin()
	{
        if( isset($_POST['_username'])){
            $username=$_POST['_username'];
            $password=$_POST['_password'];
            $usuarios = $this->getDoctrine()->getRepository(Clientes::class)->findAll();
            foreach($usuarios as $usuario){
            if($usuario->getNombre()==$username){
                if($usuario->getPass()==$password){
                    $session->set('nombreUser', $username);
                    return $this->render('index.html.twig', array(
                        'nombreUser'=>$session->get('nombreUser')));
                }   
            }
            
	    }
        }else{
            return $this->render('login.html.twig');
        }
		
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