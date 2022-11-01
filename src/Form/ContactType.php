<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresse',TextType::class,[
                "required" => false,
                "attr" => [
                    "class" => "input--inputText"
                ],
                "label_attr" => [
                    "class"=> "input--label"]
            ])
            ->add('ville',TextType::class,[
                "required" => false,
                "attr" => [
                    "class" => "input--inputText"
                ],
                "label_attr" => [
                    "class"=> "input--label"]
            ])
            ->add('telephone',TextType::class,[
                "required" => false,
                "attr" => [
                    "class" => "input--inputText"
                ],
                "label_attr" => [
                    "class"=> "input--label"]
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
