<?php

namespace App\Form;

use App\Entity\Book;

use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['label'=>'Titre'])
            ->add('description', CKEditorType::class)
            ->remove('imageName')
            ->add('imageFile', FileType::class, ['label'=>'Image'])
            ->remove('updatedAt')
            ->add('category', null, ['label'=>'Categorie'])
            ->add('author', null, ['label'=>'Auteur'])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
