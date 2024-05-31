<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CheckController extends AbstractController
{
    #[Route('/checkout-page', name: 'check')]
    public function index(): Response
    {
        return $this->render('check/index.html.twig', [
            'controller_name' => 'CheckController',
        ]);
    }
}
