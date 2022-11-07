<?php

namespace App\Form;

use App\Entity\Administratif;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdministratifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('licence',TextType::class,[
                'attr' => [
                    'placeholder' => 'numero de licence'
                ]
            ])
            ->add('certificatMedical',CheckboxType::class,[
                "attr" => [
                    "class" => "toggle toggle--off"
                ]
            ])
            ->add('isPaid',CheckboxType::class,[
                "attr" => [
                    "class" => "toggle toggle--off"
                ]
            ])
            // ->add('adherant')
            // ->add('enfant')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Administratif::class,
        ]);
    }
}
