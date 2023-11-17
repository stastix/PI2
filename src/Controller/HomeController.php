<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    
    #[Route(path:"/home", name:"app_home")]
    public function index(): Response
    {
        // Your controller logic here
        return $this->render('da.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    } 


       /**
 * @Route("/user", name="User", methods={"GET"})
 */   
 public function home(): Response
 {
     return $this->render('home.html.twig');
 } 

}
