<?php

namespace App\Form;

use App\Entity\Service;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status', CheckboxType::class, [
                'label'     => 'Ange du chemin',
                'attr'      => [
                    'id'    => 'switch-to-angel-registration'
                ]
            ])
            ->add('lastname', null, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Nom'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de saisir votre nom.'
                    ])
                ]
            ])
            ->add('firstname', null, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Prénom'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de saisir votre prénom.'
                    ])
                ]
            ])
            ->add('email', null, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Adresse email'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de saisir votre adresse email.'
                    ]),
                    new Email([
                        'message' => 'L\'adresse email saisie est invalide.'
                    ])
                ]
            ])
            // ->add('agreeTerms', CheckboxType::class, [
            //     'mapped'        => false,
            //     'constraints'   => [
            //         new IsTrue([
            //             'message' => 'Merci d\'adhérer aux conditions générales.'
            //         ])
            //     ],
            // ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'label'  => false,
                'attr'   => [
                    'autocomplete'  => 'new-password',
                    'placeholder'   => 'Mot de passe'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de saisir un mot de passe.'
                    ]),
                    new Length([
                        'min'        => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} characteres.',
                        // max length allowed by Symfony for security reasons
                        'max'        => 4096,
                    ])
                ],
            ])
            // // We add a event listener.
            // ->addEventListener(
            //     FormEvents::SUBMIT,
            //     [$this, 'onSubmit']
            // )
            // ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {

            //     $user = $event->getData();
            //     $form = $event->getForm();
        
            //     $status = $form->get('status')->getData();
        
            //     // By default $required = true.
            //     $required = true;
        
            //     // If the switch is checked $status === true : the user will be registered as a Angel (status = 1).
            //     if ($status === true) {
            //         // We display the fields required for the Angel status.
            //         $required = true;
            //     // Else if the switch is not checked $status === false, user will be registered as a marcheur (status = 2).
            //     } elseif ($status === false) {
            //         // We not display the fields required for the angel status but only the field for the Marcheur status
            //         $required = false;
            //     } else {
            //         // we stop the execution of the programmme.
            //         exit();
            //     }
        
            //     // We dynamically add the fields we want to display according to the status
            //     $form->add('phonenumber', TelType::class, [
            //         'required'  => $required,
            //         'label'     => false,
            //         'attr'      => [
            //             'placeholder' => 'Numéro de téléphone'
            //         ],
            //         'constraints' => [
            //             new NotBlank([
            //                 'message' => 'Merci de saisir votre numéro de téléphone.'
            //             ]),
            //         ]
            //     ])
            //     ->add('zipcode', null, [
            //         'required'  => $required,
            //         'label'     => false,
            //         'attr'      => [
            //             'placeholder' => 'Code postale'
            //         ],
            //         'constraints' => [
            //             new NotBlank([
            //                 'message' => 'Merci de saisir votre code postale.'
            //             ])
            //         ]
            //     ])
            //     ->add('city', null, [
            //         'required'  => $required,
            //         'label'     => false,
            //         'attr'      => [
            //             'placeholder' => 'Commune'
            //         ],
            //         'constraints' => [
            //             new NotBlank([
            //                 'message' => 'Merci de saisir le nom de votre commune.'
            //             ])
            //         ]
            //     ])
            //     ->add('services', EntityType::class, [
            //         'required'      => $required,
            //         'class'         => Service::class,
            //         'by_reference'  => false,
            //         'multiple'      => true,
            //         'constraints'   => [
            //             new NotBlank([
            //                 'message' => 'Merci de sélectionner au minimum un service.'
            //             ]),
            //         ]
            //     ]);

            // });
            ->add('phonenumber', TelType::class, [
                'required'  => false,
                'label'     => false,
                'attr'      => [
                    'placeholder' => 'Numéro de téléphone'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de saisir votre numéro de téléphone.'
                    ])
                        
                ]
            ])
            ->add('zipcode', null, [
                    'required'  => false,
                    'label'     => false,
                    'attr'      => [
                        'placeholder' => 'Code postale'
                    ],
                    // 'constraints' => [
                    //     new NotBlank([
                    //         'message' => 'Merci de saisir votre code postale.'
                    //     ])
                    // ]
            ])
            ->add('city', null, [
                'required'  => false,
                'label'     => false,
                'attr'      => [
                     'placeholder' => 'Commune'
                ],
                    // 'constraints' => [
                    //     new NotBlank([
                    //         'message' => 'Merci de saisir le nom de votre commune.'
                    //     ])
                    // ]
            ])
                ->add('services', EntityType::class, [
                    'required'      => false,
                    'class'         => Service::class,
                    'by_reference'  => false,
                    'multiple'      => true,
                    // 'constraints'   => [
                    //     new NotBlank([
                    //         'message' => 'Merci de sélectionner au minimum un service.'
                    //     ])
                        
                    // ]
                ]);
    }

    // /**
    //  * Undocumented function
    //  *
    //  * @return void
    //  */
    // public static function getSubscribedEvents()
    // {
    //     return [
    //         FormEvents::SUBMIT => 'onSubmit',
    //     ];
    // }

    // /**
    //  * Undocumented function
    //  *
    //  * @param FormEvent $event
    //  * @return void
    //  */
    // public function onSubmit(FormEvent $event)
    // {
    //     $user = $event->getData();
    //     $form = $event->getForm();

    //     $status = $form->get('status')->getData();

    //     // By default $required = true.
    //     $required = true;

    //     // If the switch is checked $status === true : the user will be registered as a Angel (status = 1).
    //     if ($status === true) {
    //         // We display the fields required for the Angel status.
    //         $required = true;
    //     // Else if the switch is not checked $status === false, user will be registered as a marcheur (status = 2).
    //     } elseif ($status === false) {
    //         // We not display the fields required for the angel status but only the field for the Marcheur status
    //         $required = false;
    //     } else {
    //         // we stop the execution of the programmme.
    //         exit();
    //     }

    //     // We dynamically add the fields we want to display according to the status
    //     $form->add('phonenumber', null, [
    //         'required'  => $required,
    //         'label'     => false,
    //         'attr'      => [
    //             'placeholder' => 'Numéro de téléphone'
    //         ],
    //         'constraints' => [
    //             new NotBlank([
    //                 'message' => 'Merci de saisir votre numéro de téléphone.'
    //             ]),
    //         ]
    //     ])
    //     ->add('zipcode', null, [
    //         'required'  => $required,
    //         'label'     => false,
    //         'attr'      => [
    //             'placeholder' => 'Code postale'
    //         ],
    //         'constraints' => [
    //             new NotBlank([
    //                 'message' => 'Merci de saisir votre code postale.'
    //             ])
    //         ]
    //     ])
    //     ->add('city', null, [
    //         'required' => $required,
    //         'label'     => false,
    //         'attr'  => [
    //             'placeholder' => 'Commune'
    //         ],
    //         'constraints' => [
    //             new NotBlank([
    //                 'message' => 'Merci de saisir le nom de votre commune.'
    //             ])
    //         ]
    //     ])
    //     ->add('services', EntityType::class, [
    //         'required'      => $required,
    //         'class'         => Service::class,
    //         'by_reference'  => false,
    //         'multiple'      => true,
    //         'constraints'   => [
    //             new NotBlank([
    //                 'message' => 'Merci de sélectionner au minimum un service.'
    //             ]),
    //         ]
    //     ]);
    // }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
