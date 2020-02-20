<?php

namespace ExamsBundle\Form;

use ExamsBundle\Entity\exam;
use ExamsBundle\Entity\pupil;
use ExamsBundle\Entity\teacher;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class gradeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('teacher', EntityType::class,array('class'=>teacher::class,'choice_label'=>'fullname','multiple'=>false))
            ->add('pupil', EntityType::class, array('class'=>pupil::class,'choice_label'=>'fullname','multiple'=>false))
            ->add('grade')
            ->add('examname', EntityType::class, array('class'=>exam::class, 'choice_label'=>'subject','multiple'=>false))
            ->add('Confirm', SubmitType::class)
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ExamsBundle\Entity\grade'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'examsbundle_grade';
    }


}
