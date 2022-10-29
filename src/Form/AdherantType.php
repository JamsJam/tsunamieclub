<?php

namespace App\Form;

use App\Entity\Adherant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AdherantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('email')
            // ->add('roles',ChoiceType::class)
            // ->add('password')
            // ->add('isVerified')
            ->add('dateDeNaissance')
            ->add('sexe',ChoiceType::class,[
                'multiple'=> false,
                'expanded'=> true,
                    "choices" => [
                        "homme" => "1",
                        "femme" => "2"
                    ]
                ])
            // ->add('idRole')
            // ->add('contact')
            // ->add('urgence')
            // ->add('roleClub')
            // ->add('administratif')
            // ->add('mails')
            // ->add('evenements')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adherant::class,
        ]);
    }
}
