<?php


namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use function Sodium\add;

class ProductType extends AbstractType
{
    /**
     * Je crée ici un modèle de formulaire.
     * Ce modèle pourra me servir plus tard.
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('codeProduct')
            ->add('price')
            ->add('stars', ChoiceType::class, [
                'choices'=>[ 0, 1, 2, 3, 4, 5],
            ])
            ->add('imageUrl', FileType::class)
            ->add('description', TextareaType::class)
            ->add('submit', SubmitType::class, [
                'label' => 'Publier mon produit'
            ]);
    }

}