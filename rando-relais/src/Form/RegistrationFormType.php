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
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // We use the addEventlistener method on PRE_SUBMIT to add form fields, before submitting the data to the form.
            ->addEventListener(FormEvents::PRE_SUBMIT, [$this, 'onPreSubmit'])
            ->add('status', CheckboxType::class, [
                'label'     => 'Ange du chemin',
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
            ->add('phonenumber', null, [
                'required'  => false,
                'label'     => false,
                'attr'      => [
                    'placeholder' => 'Numéro de téléphone'
                ],
                
            ])
            ->add('zipcode', null, [
                'required'  => false,
                'label'     => false,
                'attr'      => [
                    'placeholder' => 'Code postale'
                ],
                
            ])
            ->add('city', null, [
                'required'  => false,
                'label'     => false,
                'attr'  => [
                    'placeholder' => 'Commune'
                ],
                
            ])
            ->add('services', EntityType::class, [
                'required'      =>  false,
                'class'         => Service::class,
                'by_reference'  => false,
                'multiple'      => true,
                'expanded'      => true,
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped'        => false,
                'label'         => 'J\'ai lu et j\'accepte les conditions générales d\'utilisation',
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
            ]);
    }


    /**
     * Method wo display the form fields required for the angel registration if ($user['status']) === true / if the switch is checked.
     *
     * @param FormEvent $event
     * @return void
     */
    public function onPreSubmit(FormEvent $event)
    {
        // We get the form data.
        $user = $event->getData();
        $form = $event->getForm();
        // if ($user['status'])
       
        // We check if the switch button is checked.
        // If $user['status'] === true that mean the user want to register as a Angel (status 2).
        // In order to collect the data related to the Angel's status we need to require the form fields related to this status.
        if (isset($user['status']) ) {
            // We add the form fields related to the Angel's status with the attribute required => true.
            $form
            ->add('phonenumber', null, [
                'required'  => true,
                'label'     => false,
                'attr'      => [
                    'placeholder' => 'Numéro de téléphone'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de saisir votre numéro de téléphone.'
                    ]),
                ]
            ])
            ->add('zipcode', null, [
                'required'  => true,
                'label'     => false,
                'attr'      => [
                    'placeholder' => 'Code postale'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de saisir votre code postale.'
                    ])
                ]
            ])
            ->add('city', null, [
                'required' => true,
                'label'     => false,
                'attr'  => [
                    'placeholder' => 'Commune'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de saisir le nom de votre commune.'
                    ])
                ]
             ])
            ->add('services', EntityType::class, [
                'required'      => true,
                'class'         => Service::class,
                'by_reference'  => false,
                'multiple'      => true,
                'expanded'      => true,
                'constraints'   => [
                    new Count([
                        'min' => 1,
                        'minMessage' => 'Merci de sélectionner au minimum un {{ limit }} service.'
                    ]),
                ]
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
