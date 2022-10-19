<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',ChoiceType::class,[
                'choices' => [
                    'mariage' => 'mariage',
                    'bathème' => 'bathème',
                    'kermesse' => 'kermesse',
                    'brocante' => 'brocante',
                    'fête foraine' => 'fête foraine',
                    'anniversaire' => 'anniversaire',
                ]
            ])
            // ->add('events')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
