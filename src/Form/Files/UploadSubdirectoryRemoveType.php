<?php

namespace App\Form\Files;

use App\Controller\Files\FileUploadController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UploadSubdirectoryRemoveType extends AbstractType
{
    const OPTION_SUBDIRECTORIES = 'subdirectories';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(FileUploadController::KEY_UPLOAD_TYPE, ChoiceType::class, [
                'choices' => FileUploadController::UPLOAD_TYPES,
                'attr'    => [
                    'class'                        => 'form-control listFilterer',
                    'data-dependent-list-selector' => '#upload_subdirectory_remove_subdirectory_name'
                ]
            ])
            ->add(FileUploadController::KEY_SUBDIRECTORY_NAME, ChoiceType::class, [
                'choices' => $options[static::OPTION_SUBDIRECTORIES]
            ])
            ->add('submit', SubmitType::class, [

            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
        $resolver->setRequired(static::OPTION_SUBDIRECTORIES);

    }
}