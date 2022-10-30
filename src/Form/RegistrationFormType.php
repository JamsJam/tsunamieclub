<?php

namespace App\Form;

use App\Form\MailType;
use App\Entity\Adherant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                "required" => false,
                "row_attr" => [
                    "class" => "input input--text"
                ]
            ])
            
            ->add('prenom',TextType::class,[
                "required" => false,
                "row_attr" => [
                    "class" => "input input--text"
                ]
            ])

            ->add('email',EmailType::class,[
                "required" => false,
                // "help" => 'Inserer votre email',
                "row_attr" => [
                    "class" => "input input--email"
                ]
            ])

            ->add('dateDeNaissance',BirthdayType::class,[
                "required" => false,
                'widget' => 'single_text',
                'format' => 'dd/mm/yyyy',
                'html5' => false,
                'input'=> 'datetime_immutable',
                'invalid_message' => 'Veuillez entrer une date valide',
                'attr' => [
                    'placeholder' => 'dd/mm/yyyy'
                ]
            ])
            ->add('sexe',ChoiceType::class,[
                'multiple'=> false,
                'expanded'=> true,
                'label' => 'Civilité',
                    "choices" => [
                        "homme" => "1",
                        "femme" => "2"
                    ]
                ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                //! mot de passe encodé dans le controller avant d'ettre envoyer en bdd
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                
                'constraints' => [
                    // ? Contrainte de remplissage
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    // ? Contrainte de longueur
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit faire plus de {{ limit }} caracteres',
                        // max length allowed by Symfony for security reasons
                        'max' => 100,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adherant::class,
        ]);
    }
}
