<?php

namespace App\Controller;

use App\Entity\Offrespecialevenment;
use App\Entity\OffrespecialevenmentRepository;
use App\Form\OffrespecialevenmentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; 

#[Route('/offrespecialevenment')]
class OffrespecialevenmentController extends AbstractController
{
    #[Route('/', name: 'app_offrespecialevenment_index', methods: ['GET'])]
    public function index(\App\Repository\OffrespecialevenmentRepository $offrespecialevenmentRepository): Response
    {
        return $this->render('offrespecialevenment/index.html.twig', [
            'offrespecialevenments' => $offrespecialevenmentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_offrespecialevenment_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $offrespecialevenment = new Offrespecialevenment(); 
        $offrespecialevenment->setDateDepart(new \DateTime());
        
        $form = $this->createForm(OffrespecialevenmentType::class, $offrespecialevenment);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) { 
            $uploadedFile = $form->get('image')->getData(); 
    
            if ($uploadedFile) {
                $newFilename = uniqid().'.'.$uploadedFile->guessExtension();
    
                try {
                    $destination = $this->getParameter('kernel.project_dir').'/public/img';
                    $uploadedFile->move($destination, $newFilename);
                    $offrespecialevenment->setImage($newFilename);
                } catch (FileException $e) {
                    // Handle file upload error, you can log or add a flash message here
                    $this->addFlash('error', 'Error uploading the image.');
                }                   
            }
    
            $entityManager->persist($offrespecialevenment);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_offrespecialevenment_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('offrespecialevenment/new.html.twig', [
            'offrespecialevenment' => $offrespecialevenment,
            'form' => $form,
        ]);
    }
    
    #[Route('/{idoffrespecialevenment}', name: 'app_offrespecialevenment_show', methods: ['GET'])]
    public function show(Offrespecialevenment $offrespecialevenment): Response
    {
        return $this->render('offrespecialevenment/show.html.twig', [
            'offrespecialevenment' => $offrespecialevenment,
        ]);
    }

    #[Route('/{idoffrespecialevenment}/edit', name: 'app_offrespecialevenment_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Offrespecialevenment $offrespecialevenment, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OffrespecialevenmentType::class, $offrespecialevenment);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form->get('image')->getData();
    
            if ($uploadedFile) {
                // Debugging
                dump($uploadedFile);
    
                $newFilename = uniqid().'.'.$uploadedFile->guessExtension();
    
                try {
                    $destination = $this->getParameter('kernel.project_dir').'/public/img';
                    $uploadedFile->move($destination, $newFilename);
                    $offrespecialevenment->setImage($newFilename);
                } catch (FileException $e) {
                    // Handle file upload error, you can log or add a flash message here
                    $this->addFlash('error', 'Error uploading the image.');
                }
            }
    
            // Move this line outside the if ($uploadedFile) block
            $entityManager->flush();
    
            return $this->redirectToRoute('app_offrespecialevenment_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('offrespecialevenment/edit.html.twig', [
            'offrespecialevenment' => $offrespecialevenment,
            'form' => $form,
        ]);
    }
        
    #[Route('/{idoffrespecialevenment}', name: 'app_offrespecialevenment_delete', methods: ['POST'])]
    public function delete(Request $request, Offrespecialevenment $offrespecialevenment, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offrespecialevenment->getIdoffrespecialevenment(), $request->request->get('_token'))) {
            $entityManager->remove($offrespecialevenment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_offrespecialevenment_index', [], Response::HTTP_SEE_OTHER);
    } 


}
