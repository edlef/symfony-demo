<?php

namespace AppBundle\Form;

use AppBundle\Entity\Actor;
use AppBundle\Entity\Article;
use AppBundle\Entity\Author;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\ArticleType as ArticleTypeEntity;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormTypeInterface;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', EntityType::class,
                [
                    'class' => ArticleTypeEntity::class,
                    'choice_label' => 'code',
                ])
            ->add('title', TextType::class)
            ->add('code', TextType::class)
            ->add('releaseDate', DateType::class, array(
                'widget' => 'choice',
            ))
            ->add('duration', NumberType::class)
            ->add('description', TextareaType::class)
            ->add('price', NumberType::class)
            ->add('dvd', CheckboxType::class)
            ->add('blueray', CheckboxType::class)
            ->add('author', EntityType::class,
                [
                    'class' => Author::class,
                    'choice_label' => 'displayName',
                ])
            ->add('actors', EntityType::class,
                [
                    'class' => Actor::class,
                    'choice_label' => 'displayName',
                    'multiple' => true,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Article::class,
        ));
    }
}
