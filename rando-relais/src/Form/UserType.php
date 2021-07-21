<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('city')
            ->add('zipCode')
            ->add('picture')
            ->add('phoneNumber')
            ->add('latitude')
            ->add('longitude')
            ->add('status')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('services')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
