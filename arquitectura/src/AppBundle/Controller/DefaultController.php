<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
    
    /**
     * @Route("/relation", name="createRelation")
     */
    public function createProductAction()
    {
        $category = new Category();
        $category->setName('Main Products');
        $product = new Product();
        $product->setName('Foo');
        $product->setPrice(19.99);
        $product->setDescription('Lorem ipsum dolor');
        // relate this product to the category
        $product->setCategory($category);
        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($product);
        $em->flush();
        return new Response(
            'Created product id: '.$product->getId().' and category id: '.$category->getId());
    }
}
