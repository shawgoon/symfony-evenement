<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date' , DateType::class,[
                'widget'=>"single_text"
            ])
            ->add('title')
            ->add('place')
            ->add('picture',FileType::class)
            ->add('description', TextareaType::class)
            ->add('category',ChoiceType::class,[
                'choices' => [
                    'mariage' => 'mariage',
                    'bathème' => 'bathème',
                    'kermesse' => 'kermesse',
                    'brocante' => 'brocante',
                    'fête foraine' => 'fête foraine',
                    'anniversaire' => 'anniversaire',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
