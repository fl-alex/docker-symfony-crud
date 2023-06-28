<?php

namespace App\Form;

use App\Entity\Objectservice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ObjectserviceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('dateplan', DateTimeType::class, ['date_label' => 'Starts On','date_widget'=>'single_text','time_widget'=>'single_text'])
            ->add('datefact', DateTimeType::class, ['date_label' => 'Starts On','date_widget'=>'single_text','time_widget'=>'single_text', 'required'=>false])
            ->add('dateend', DateTimeType::class, ['date_label' => 'Starts On','date_widget'=>'single_text','time_widget'=>'single_text','required'=>false])

            ->add('ServiceType')
            ->add('ServiceState')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Objectservice::class,
        ]);
    }
}
