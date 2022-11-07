<?php

namespace App\Form;

use App\Entity\Grade;
use App\Entity\Adherant;
use App\Entity\RoleClub;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoleClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('competiteur',CheckboxType::class,[
                "attr" => [
                    "class" => "toggle toggle--off"
                ],
                "row_attr" => [
                    "class" => "fields"
                ]
            ])
            ->add('arbitre',CheckboxType::class,[
                "attr" => [
                    "class" => "toggle toggle--off"
                ],
                "row_attr" => [
                    "class" => "fields"
                ]
            ])
            ->add('commissaire',CheckboxType::class,[
                "attr" => [
                    "class" => "toggle toggle--off"
                ],
                "row_attr" => [
                    "class" => "fields"
                ]
            ])
            ->add('professeur',CheckboxType::class,[
                "attr" => [
                    "class" => "toggle toggle--off"
                ],
                "row_attr" => [
                    "class" => "fields"
                ]
            ])
            ->add('pole',CheckboxType::class,[
                "attr" => [
                    "class" => "toggle toggle--off"
                ],
                "row_attr" => [
                    "class" => "fields"
                ]
            ])
            ->add('kata',CheckboxType::class,[
                "attr" => [
                    "class" => "toggle toggle--off"
                ],
                "row_attr" => [
                    "class" => "fields"
                ]
            ])
            ->add('staf',CheckboxType::class,[
                "attr" => [
                    "class" => "toggle toggle--off"
                ],
                "row_attr" => [
                    "class" => "fields"
                ]
            ])
            // ->add('adherant',EntityType::class,[
            //     'class' => Adherant::class,
            //     'choice_label' => "email"
            //     ])
                ->add('grade',EntityType::class,[
                    'class' => Grade::class,
                    'choice_label'=>'grade',
                    'placeholder' => 'Choisir le grade'
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
