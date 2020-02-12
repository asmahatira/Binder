<?php

namespace ExamsBundle\Form;

use ExamsBundle\Entity\exam;
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
        $builder->add('subject')
            ->add('teacher')
            ->add('pupil')
            ->add('grade')
            ->add('idExam', EntityType::class, array('class'=>exam::class, 'choice_label'=>'session','multiple'=>false))
            ->add('Ajouter', SubmitType::class)
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
