<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller{
    
     /**
     * @Route("/hola", name="hola")
     */
    public function holaAction(){
       return new RedirectResponse($this->generateUrl('hello_home'));
    }

    /**
     * @Route("/hello/{firstname}/{lastname}", name="hello")
     */
    
    public function indexAction($firstname, $lastname) {
       return new Response ('<html><body>Hello '.$fistname.' '.$lastname.'!</body></html>');
    }
    
    /**
     * @Route("/hello", name="hello_home")
     */
    public function helloAction(){
        //return $this->redirectToRoute('hello');
       return new Response ('<html><body>Hello '.'Mary'.''.'Gonz'.'!</body></html>');
    }
    
}
