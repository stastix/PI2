<?php

// src/Controller/CartefideliteUserController.php

namespace App\Controller;

use App\Entity\Cartefidelite;
use App\Repository\CartefideliteRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartefideliteUserController extends AbstractController
{  

    #[Route('/user', name: 'app_user')]
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

 
    #[Route('/user/cartefidelite', name: 'app_cartefidelite_user')]
    public function index(CartefideliteRepository $repo,UserRepository $userRepository): Response
    { $id = 51; 
    $user = $userRepository->find($id); 
    $cartefidelite = $user->getCartefidelite(); 
    if ($cartefidelite === null) {
        // The user doesn't have a card
        // You can handle this situation, for example, by rendering a message and a button to create a card
        return $this->render('cartefideliteUser/index.html.twig', [
            'message' => 'You don\'t have a card. Create one now?',
            'createCardButton' => true, // Pass a variable to conditionally display the button
        ]);
    } 
    else {    $cartefidelite = $user->getCartefidelite(); 

    
        
        return $this->render('cartefideliteUser/index.html.twig', [
            'controller_name' => 'CartefideliteUserController','cartefidelite'=>$cartefidelite,'user'=>$user
        ]);}
    }
}
