<?php

namespace App\Form;

use App\Entity\Image;
use App\Entity\Post;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, ['attr' => ['class' => 'form-control']])
            ->add('subtitle', null, ['attr' => ['class' => 'form-control']])
            ->add('text', null, ['attr' => ['class' => 'form-control']])
            ->add('created_at', null, ['attr' => ['class' => 'form-control']])
            ->add('updated_at', null, ['attr' => ['class' => 'form-control']])
            ->add('Images', EntityType::class, [
                'class' => Image::class,
                'choice_label' => 'name',
                'multiple' => true,
                'attr' => ['class' => 'form-control mb-1']]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
