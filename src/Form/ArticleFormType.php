<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ArticleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'title',
                'required' => true  
            ))
            ->add('content', TextareaType::class, array(
                'label' => 'content',
                'required' => true  
            ))
            ->add('save', SubmitType::class, [
                'label' => 'Save',
                'attr' => ['class' => 'btn-red btn-block']
            ])
        ;

    ;
    }
}