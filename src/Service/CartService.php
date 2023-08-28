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
        $this->$rs = $rs;
        $this->$repo = $repo;
    }
}