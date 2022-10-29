<?php

namespace App\Form;

use App\Entity\RoleClub;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
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
            ->add('adherant')
            ->add('grade')
            ->add('enfant')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RoleClub::class,
        ]);
    }
}
