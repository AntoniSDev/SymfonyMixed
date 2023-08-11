<?php

namespace App\Form;

use App\Entity\Song;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SongType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
            'label' => 'Titre :',
            'attr' => ['class' => 'form-control mb-2', 'required' => 'required']
        ])
            ->add('artist', TextType::class, [
              'label' => 'Artist :',
              'attr' => ['class' => 'form-control mb-2', 'required' => 'required']
        ])
             ->add('priority', ChoiceType::class, [
              'label' => 'Priority :',
              'choices' => [
                'high' => 'high',
                'normal' => 'normal',
                'low' => 'low',
        
              ],
              'attr' => ['class' => 'form-control mb-2', 'required' => 'required']
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Song::class,
        ]);
    }
}
