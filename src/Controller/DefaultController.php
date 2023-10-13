<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    public function home(ProductRepository $productRepository): Response
    {

        $products = $productRepository->findAll();
        dump($products);
        return $this->render('default/home.html.twig', [
            'products'=> $products
        ]);

    }

    #[Route('/{name}/{id<\d+>}.html', name: 'default_product', methods: ['GET'])]
    public function product(Product $product): Response
    {

        return $this->render('default/product.html.twig', [
            'product' => $product
        ]);
    }
}