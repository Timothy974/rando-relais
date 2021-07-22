 ->add('users', EntityType::class, [
                'by_reference' => false,
                'class' => User::class,
                'required'=>false,
                'multiple' => true,
                'attr' => ['size' => 10]
            ])