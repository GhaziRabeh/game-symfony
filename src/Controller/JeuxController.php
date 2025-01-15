<?php

namespace App\Controller;

use App\Entity\Jeux;
use App\Form\JeuxType;
use App\Repository\JeuxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/jeux')]
final class JeuxController extends AbstractController
{
    #[Route('', name: 'app_jeux_index', methods: ['GET'])]
    public function index(JeuxRepository $jeuxRepository): Response
    {
        // Fetch all games
        $jeuxes = $jeuxRepository->findAll();
        
        // Render the template and pass the jeuxes variable
        return $this->render('admin/jeux/index.html.twig', [
           'jeuxes' => $jeuxes, 
        ]);
    }
    #[Route('/new', name: 'app_jeux_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $jeux = new Jeux();
        $form = $this->createForm(JeuxType::class, $jeux);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Handle the file upload
            $file = $form->get('image_url')->getData();
            if ($file) {
                $filename = uniqid().'.'.$file->guessExtension();
                $file->move($this->getParameter('images_directory'), $filename);
                $jeux->setImageUrl($filename); // Set the image URL
            }
    
            $entityManager->persist($jeux);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_jeux_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->render('admin/jeux/new.html.twig', [
            'jeux' => $jeux,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_jeux_show', methods: ['GET'])]
    public function show(Jeux $jeux): Response
    {
        return $this->render('admin/jeux/show.html.twig', [
            'jeux' => $jeux,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_jeux_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Jeux $jeux, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(JeuxType::class, $jeux);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Handle the file upload
            $file = $form->get('image_url')->getData();
            if ($file) {
                $filename = uniqid().'.'.$file->guessExtension();
                $file->move($this->getParameter('images_directory'), $filename);
                $jeux->setImageUrl($filename); // Set the image URL
            }
    
            $entityManager->flush();
    
            return $this->redirectToRoute('app_jeux_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->render('admin/jeux/edit.html.twig', [
            'jeux' => $jeux,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_jeux_delete', methods: ['POST'])]
    public function delete(Request $request, Jeux $jeux, EntityManagerInterface $entityManager): Response
    {
       if ($this->isCsrfTokenValid('delete' . $jeux->getId(), $request->request->get('_token'))) {
           $entityManager->remove($jeux);
           $entityManager->flush();
       }

        return $this->redirectToRoute('app_jeux_index', [], Response::HTTP_SEE_OTHER);
    }
}
