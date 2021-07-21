<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('status', CheckboxType::class, [
            'label' => 'Ange du chemin',
            // 'attr'  => [
            //     'id' => 'flexSwitchAngel'
            // ]
        ])
            ->add('lastname', null, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Nom'
                ],
                'constraints' => [
                    new NotNull([
                        'message' => 'Merci de saisir votre nom.'
                    ]),
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
                    new NotNull([
                        'message' => 'Merci de saisir votre prénom.'
                    ]),
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
                    new NotNull([
                        'message' => 'Merci de saisir votre adresse email.'
                    ]),
                    new NotBlank([
                        'message' => 'Merci de saisir adresse email.'
                    ]),
                    new Email([
                        'message' => 'L\'adresse email saisie est invalide.'
                    ])
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped'        => false,
                'constraints'   => [
                    new IsTrue([
                        'message' => 'Merci d\'adhérer aux conditions générales.'
                    ])
                ],
            ])
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
                    new NotNull([
                        'message' => 'Merci de saisir un mot de passe.'
                    ]),
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
            ->add('phonenumber', null, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Numéro de téléphone'
                ],
                'constraints' => [
                    new NotNull([
                        'message' => 'Merci de saisir votre numéro de téléphone.'
                    ]),
                    new NotBlank([
                        'message' => 'Merci de saisir votre numéro de téléphone.'
                    ]),
                    
                ]
            ])
            ->add('zipcode', null, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Code postale'
                ],
                'constraints' => [
                    new NotNull([
                        'message' => 'Merci de saisir votre code postale.'
                    ]),
                    new NotBlank([
                        'message' => 'Merci de saisir votre code postale.'
                    ])
                ]
            ])
            ->add('city', null, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Commune'
                ],
                'constraints' => [
                    new NotNull([
                        'message' => 'Merci de saisir le nom de votre commune.'
                    ]),
                    new NotBlank([
                        'message' => 'Merci de saisir le nom de votre commune.'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
