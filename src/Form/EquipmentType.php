<?php

namespace App\Form;

use App\Entity\Equipment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class EquipmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('datestart', DateType::class, ['label' => 'Starts On','widget'=>'single_text', 'required'=>true])
            ->add('dateend', DateType::class, ['label' => 'Starts On','widget'=>'single_text', 'required'=>false])
            ->add('file', CollectionType::class, [
                    'entry_type' => FileType::class,
                    'entry_options' => ['label' => 'mylabel'],
                    'allow_add' => true
                ])
            ->add('characteristics')
            ->add('ObjectType')
            ->add('location')
            ->add('person')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipment::class,
        ]);
    }
}
