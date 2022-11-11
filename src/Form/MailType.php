<?php

namespace App\Form;

use App\Entity\Mail;
use App\Entity\Adherant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sujet',TextType::class,[])
            ->add('message',TextareaType::class,[

            ])
            // ->add('sendAt')
            ->add('destinataire',EntityType::class,[
                'class' => Adherant::class,
                "choice_label" => "nom",
                "multiple" => true,
                "expanded" => true,
                // 'mapped' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mail::class,
        ]);
    }
}
