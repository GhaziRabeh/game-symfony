<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    #[Route('/admin-category', name: 'app_admin-category')]
    public function category(): Response
    {
        return $this->render('admin/CategoryAdmin.html.twig', [
        
        ]);
    }
    #[Route('/admin-client', name: 'app_admin-client')]
    public function client(UserRepository $userRepository): Response
    {
        // Fetch all users (or clients if it's a different entity)
        $users = $userRepository->findAll();

        // Render the ClientAdmin template and pass the users
        return $this->render('admin/client/ClientAdmin.html.twig', [
            'users' => $users,  
        ]);
    }
}
