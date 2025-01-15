<?php

namespace App\Controller;

use App\Entity\Jeux;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategoryRepository;
use App\Repository\JeuxRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        // Fetch all categories
        $categories = $categoryRepository->findAll();

        return $this->render('page/index.html.twig', [
            'controller_name' => 'HomeController',
            'categories' => $categories, // Pass categories to the template
        ]);
    }

    // Other methods remain unchanged
    #[Route('/game', name: 'app_game')]
    public function game(JeuxRepository $jeuxRepository): Response
    {
        $jeuxes = $jeuxRepository->findAll(); // Fetching the data
    
        // Passing the 'jeuxes' variable to the template
        return $this->render('page/game.html.twig', [
            'jeuxes' => $jeuxes,
        ]);
    }

    #[Route('/blog', name: 'app_blog')]
    public function blog(): Response
    {
        return $this->render('page/blog.html.twig', []);
    }

    #[Route('/form', name: 'app_form')]
    public function form(): Response
    {
        return $this->render('page/form.html.twig', []);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('page/contact.html.twig', []);
    }
    #[Route('/details/{id}', name: 'app_game_details', requirements: ['id' => '\d+'])]
    public function details(int $id, JeuxRepository $jeuxRepository): Response
    {
        $game = $jeuxRepository->find($id);

        if (!$game) {
            throw $this->createNotFoundException('The game does not exist');
        }

        return $this->render('page/game_details.html.twig', [
            'game' => [
                'name' => $game->getName(),
                'imageUrl' => $game->getImageUrl(),
                'rate' => $game->getRate(),
                'description' => $game->getDescription(),
                'price' => $game->getPrice(),
                'quantity' => $game->getQuantity(),
            ],
        ]);
    }
}
