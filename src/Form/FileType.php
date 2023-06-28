<?php

namespace App\Form;

use App\Entity\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\FileType as MyFileType;


class FileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('myfile', MyFileType::class, [
                'label' => 'Adding file to location',
                // невідображене означає, що це поле не асоційовано з жодною властивістю сутності
                'mapped' => false,
                // зробіть його необов'язковим, щоб вам не потрібно було повторно завантажувати PDF-файл
                // кожний раз, коли будете редагувати деталі Product
                'required' => false,
                'attr' => array(
                    'class' => 'upl_file'
                )
                // невідображені поля не можуть визначати свою валідацію, використовуючи анотації
                // в асоційованій сутності, тому ви можете використовувати класи PHP
                /*'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'image/jpeg',

                        ],
                        'mimeTypesMessage' => 'Please upload a valid document',
                    ])
                ],*/
            ])
            ->add('name')
            ->add('FileType')
            ->add('equipment')
            ->add('del', ButtonType::class, [
                'attr' => ['class' => 'btn_remove']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => File::class,
        ]);
    }
}
