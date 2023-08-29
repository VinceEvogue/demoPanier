<?php

namespace App\Service;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class CartService
{


    private $repo;
    private $rs;

    public function __construct(ProductRepository $repo, RequestStack $rs)
    {
        $this->rs = $rs;
        $this->repo = $repo;
    }

    public function add($id)
    {
        
        // je sauvegarde l'etat de mon panier en session a l'attribut de session 'cart'
        //Nous allons récupérer une session grâce à la classe RequestStack
        $session = $this->rs->getSession();

        // je récupère l'attribut de session 'cart' s'il existe ou un tableau vide
        $cart = $session->get('cart', []);
        $qt = $session->get('qt', 0);

        //si le produit existe déjà, j'incrémente sa quantité sinon j'initialise a 1 
        if(!empty($cart[$id]))
        {
            $cart[$id]++;
            $qt++;
        }else
        {   $qt++;
             $cart[$id] = 1;
        }
       
        // dans mon tableau $cart, à la case $id je donne la valeur 1
        //indice => valeur // idProduit => QuantitéDuProduitDansLePanier

        $session->set('cart', $cart);
        $session->set('qt', $qt);
    }
}