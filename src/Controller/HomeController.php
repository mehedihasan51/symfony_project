<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    // #[Route('/home', name: 'app_home')]
    // public function index(): JsonResponse
    // {
    //     return $this->json([
    //         'message' => 'Welcome to your new controller!',
    //         'path' => 'src/Controller/HomeController.php',
    //     ]);

        
    // }

    #[Route('/', name:'homepage')]

    public function index(): Response
    {

        return $this->render('homepage/index.html.twig',[
            'controller_name' => 'HomeController',
        ]);

    }
}
