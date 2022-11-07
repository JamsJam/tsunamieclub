<?php

namespace App\Form;

use App\Entity\Urgence;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UrgenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                "required" => false,
                "attr" => [
                    "class" => "fields--text"
                ],
                "label_attr" => [
                    "class"=> "fields--label"]
            ])
            ->add('prenom',TextType::class,[
                "required" => false,
                "attr" => [
                    "class" => "fields--text"
                ],
                "label_attr" => [
                    "class"=> "fields--label"]
            ])
            // ->add('lien')
            ->add('telephone',TelType::class,[
                "required" => false,
                "trim"=> true,
                "attr" => [
                    "class" => "fields--text"
                ],
                "label_attr" => [
                    "class"=> "input--label"
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Urgence::class,
        ]);
    }
}
