<?php

namespace ExamsBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class examType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject', choiceType::class, array('label'=>'subject',
                'choices'=>array('History'=>'history',
                    'Gerography' =>'geography',
                    'Civil Education' => 'civil education',
                    'Calculus' =>'calculus',
                    'Science' => 'science',
                    'Computer Science' => 'computer science',
                    'Islamic Education' => 'islamic education',
                    'Physical Education' => 'physical education',
                    'Arabic' => 'arabic',
                    'French' => 'french',
                    'English' => 'english'
                ), 'placeholder' => 'Choose an option',
                'required' =>true,
            ))
            ->add('date', DateType::class, array('widget'=>'single_text',))
            ->add('duration', choiceType::class, array('label'=>'Duration',
                'choices'=>array('1 hour'=>'1',
                    '2 hours' =>'2'), 'required'=>true,))
            ->add('confirm', SubmitType::class)

        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ExamsBundle\Entity\exam'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'examsbundle_exam';
    }


}
