<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\Type\ProductType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/dashboard/product/create', name: 'product_create', methods: ['GET', 'POST'])]
    public function createPost(Request $request, EntityManagerInterface $manager)
    {
        # Création du formulaire à partir de mon modèle ProductType
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($product);
            $manager->flush();
        }

        return $this->render('product/create.html.twig', [
            'form' => $form
        ]);
    }
}