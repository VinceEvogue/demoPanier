<?php

namespace App\Controller;

use App\Service\CartService;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PanierController extends AbstractController
{
    #[Route('/cart', name:'cart')]
    public function index(CartService $cs)
    {
   
        return $this->render('panier/index.html.twig', [
            'items' => $cs->getCartWithData(),
            'total' => $cs->getTotal()
        ]);

    }

    #[Route('/cart/add/{id}', name: "cart_add")]
    public function add($id, CartService $cs)
    {
        $cs->add($id);
        return $this->redirectToRoute('accueil');
    }

    #[Route('/cart/remove/{id}', name:'cart_remove')]
    public function remove($id, CartService $cs)
    {
        $cs->remove($id);
        return $this->redirectToRoute('cart');
    }
}
