<?php

namespace App\Form;

use App\Entity\Grade;
use App\Entity\Adherant;
use App\Entity\RoleClub;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoleClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('competiteur')
            ->add('arbitre')
            ->add('commissaire')
            ->add('professeur')
            ->add('pole')
            ->add('kata')
            ->add('staf')
            ->add('adherant',EntityType::class,[
                'class' => Adherant::class,
                'choice_label' => "email"
            ])
            ->add('grade',EntityType::class,[
                'class' => Grade::class,
                'choice_label'=>'grade'
            ])
            // ->add('enfant')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RoleClub::class,
        ]);
    }
}
