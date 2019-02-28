<?php

namespace App\Form;

use App\Entity\Testimony;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TestimonyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('name')
            ->add('age')
            ->add('state')
            ->add('date')
            ->add('content', TextareaType::class, [
                'attr' => ['rows' => 15]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Testimony::class,
            'translation_domain' => 'form_testimony',
        ]);
    }
}
