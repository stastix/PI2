<?php

// src/Controller/CartefideliteUserController.php

namespace App\Controller;

use App\Entity\Cartefidelite;
use App\Repository\CartefideliteRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\Query\Expr\Math;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
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
    public function index(UserRepository $userRepository): Response
    {
        $id = 48;
        $user = $userRepository->find($id);
        $cartefidelite = $user->getCartefidelite();
    
        if ($cartefidelite === null) {
            return $this->render('cartefideliteUser/index.html.twig', [
                'message' => 'No card found. Would you like to create one now?',
                'createCardButton' => true, // Pass a variable to conditionally display the button
            ]);
        } else {
            // Existing code when the card is found
            return $this->render('cartefideliteUser/index.html.twig', [
                'controller_name' => 'CartefideliteUserController',
                'cartefidelite' => $cartefidelite,
                'user' => $user
            ]);
        }
    }
        
    #[Route('/user/upgrade/{id}', name: 'app_cartefidelite_upgrade')]

    public function Upgrade($id, CartefideliteRepository $repo, UserRepository $userRepository) 
    {   $user = $userRepository->find($id); 
        $cartefidelite = $user->getCartefidelite();

            if ($cartefidelite) 
            { 
                if ($cartefidelite->getNiveaucarte() == 'bronze') 
                { 
                    $cartefidelite->setNiveaucarte('silver');  
                    $cartefidelite->setPtsfidelite($cartefidelite->getPtsfidelite()-1000);
                } 
                elseif ($cartefidelite->getNiveaucarte() == 'silver') 
                {$cartefidelite->setPtsfidelite($cartefidelite->getPtsfidelite()-1000);
                $cartefidelite->setNiveaucarte('gold'); 
                } 

    
                $em = $this->getDoctrine()->getManager(); 
                $em->flush(); 
    
                return $this->redirectToRoute('app_cartefidelite_user');  

            } 
            else 
            { 
                return $this->render('/cartefideliteUser/404.html.twig'); // Adjust the template path as needed 
            } 
        } 

        #[Route('/user/ajouterPts/{id}/{prix}', name: 'app_cartefidelite_ajouter')]
        public function AjouterPts($id ,UserRepository $repo ,$prix) {   
        $user = $repo->find($id); 
        $cartefidelite = $user->getCartefidelite();  
        $incrementValue = round($prix / 100);
        $cartefidelite->setPtsfidelite($cartefidelite->getPtsfidelite() + $incrementValue);
        $em = $this->getDoctrine()->getManager(); 
        $em->flush(); 
        return $this->redirectToRoute('app_cartefidelite_user');  

        }  


    public function UsePts($id,UserRepository $userRepository,$prix) { 


    }

    }
