<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Votre prénom',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre prénom.'
                    ]),
                    new Length([
                        'min'=> 4,
                        'max'=> 10,
                        'minMessage' => 'Le prénom doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Le prénom doit contenir au plus {{ limit }} caractères',
                    ])
                ],
                'attr' => [
                    'placeholder' => 'Veuillez renseigner votre prénom'
                ]
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Votre nom',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre nom'
                    ]),
                    new Length([
                        'min'=> 4,
                        'max'=> 10,
                        'minMessage' => 'Le nom doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Le nom doit contenir au plus {{ limit }} caractères',
                    ])
                ],
                'attr' => [
                    'placeholder' => 'Veuillez renseigner votre nom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre email',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre email'
                    ]),
                    new Email([
                        'message' => 'Veuillez renseigner un email valide.'
                    ])
                ],
                'attr' => [
                    'placeholder' => 'Veuillez renseigner votre email'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Votre mot de passe',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez renseigner votre mot de passe.'
                    ]),
                    new Length([
                        'min'=> 8,
                        'max'=> 128,
                        'minMessage' => 'Le mot de passe doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Le mot de passe doit contenir au plus {{ limit }} caractères'
                    ]),
                    new Regex([
                        'pattern' => '/(?=.*[A-Z])(?=.*[a-z])(?=.*\d)/',
                        'message' => 'Le mot de passe doit contenir au minimum une majuscule, une minuscule et un chiffre'
                    ])
                ],
                'attr' => [
                    'placeholder' => 'Veuillez renseigner votre mot de passe'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Inscription',
                'attr' => [
                    'class' => 'btn btn-primary w-100'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
