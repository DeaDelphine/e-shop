<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // $manager->persist($product);

        # Utilisation de faker
        $faker = Factory::create('fr_FR');
        #1. Products
        for ($i = 0; $i < 20; $i++){
            $product = new Product();
            $product->setName($faker->sentence);
            $product->setCodeProduct($faker->ean13());
            $product->setPrice($faker->randomFloat(2, 1, 1000));
            $product->setDescription($faker->text);
            $product->setImageUrl($faker->imageUrl(640, 480));
            $product->setStars($faker->numberBetween(0, 5));
            $manager->persist($product);
        }
        $manager->flush();
    }
}
