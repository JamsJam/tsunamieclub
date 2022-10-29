<?php

namespace App\Form;

use App\Entity\Administratif;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdministratifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('licence')
            ->add('certificatMedical')
            ->add('isPaid')
            ->add('adherant')
            ->add('enfant')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Administratif::class,
        ]);
    }
}
