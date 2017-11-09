<?php

namespace KernelBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PositionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label', TextType::class)
            ->add('detail', TextType::class)
            ->add('roles', ChoiceType::class, [
                'multiple' => true,
                'choices' => $this->refactorRoles($options['roles'])
            ])
            ->add('roles', EntityType::class, [
                'class' => 'KernelBundle\Entity\Division',
                'choice_label' => 'label'
            ]);
    }

    private function refactorRoles($originRoles)
    {
        $roles = array();
        $rolesAdded = array();

        foreach ($originRoles as $roleParent => $rolesChild) {
            $tmpRoles = array_values($rolesChild);
            $rolesAdded = array_merge($rolesAdded, $tmpRoles);
            $roles[$roleParent] = array_combine($tmpRoles, $tmpRoles);
        }
        $rolesParent = array_keys($originRoles);
        foreach ($rolesParent as $roleParent) {
            if (!in_array($roleParent, $rolesAdded)) {
                $roles['-----'][$roleParent] = $roleParent;
            }
        }

        return $roles;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'KernelBundle\Entity\Position'
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
