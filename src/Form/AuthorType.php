<?php

namespace App\Form;

use App\Entity\Author;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ["label"=> "Nom"])
            ->add('firstname', TextType::class, ["label"=> "Prénom"])
            ->add('pseudo', TextType::class, ["label"=> "Pseudo", "required"=>false])
            ->add('birthdate', DateType::class, ["widget"=>"single_text", "label"=>"Date de naissance"])
            ->add('dateOfDeath', DateType::class, ["widget"=>"single_text","label"=>"Date de décés"])
            ->add('description', CKEditorType::class, ["label"=>"Description"])
            ->remove('imageName')
            ->add("imageFile", FileType::class, ["label"=>"Image"])
            ->add('updatedAt', DateTimeType::class, ["widget"=>"single_text","label"=>"Mise à jour le"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Author::class,
        ]);
    }
}



