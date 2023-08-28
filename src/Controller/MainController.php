<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(ProductRepository $repo): Response
    {
        $produits = $repo->findAll();
        
        return $this->render('main/index.html.twig', [
            'produits' => $produits
        ]);
    }
}
