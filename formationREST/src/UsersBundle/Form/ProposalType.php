<?php

namespace UsersBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class ProposalType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contentProposal', TextType::class)
            ->add('answer', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ]
            ])
            ->add('questions',EntityType::class, array(
                // query choices from this entity
                'class' => 'UsersBundle\Entity\Question',
            ));
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'UsersBundle\Entity\Proposal'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return "";
    }
}
