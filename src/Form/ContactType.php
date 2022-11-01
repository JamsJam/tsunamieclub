<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresse',TextType::class,[
                "required" => false,
                "attr" => [
                    "class" => "fields--text"
                ],
                "label_attr" => [
                    "class"=> "fields--label"]
            ])
            ->add('ville',TextType::class,[
                "required" => false,
                "attr" => [
                    "class" => "fields--text"
                ],
                "label_attr" => [
                    "class"=> "fields--label"]
            ])
            ->add('telephone',TelType::class,[
                "required" => false,
                "trim"=> true,
                "attr" => [
                    "class" => "fields--text"
                ],
                "label_attr" => [
                    "class"=> "input--label"
                ],
                
            ])
            // ->add('adherant')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
