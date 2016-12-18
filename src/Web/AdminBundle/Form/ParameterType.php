<?php

namespace Web\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParameterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomSite')
            ->add('descSite')
            ->add('keyWordSite')
            ->add('emailNoti')
            ->add('SocialNetwork')
            ->add('ftrImpl')
            ->add('ftrAdr')
            ->add('ftrIntro')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Web\AdminBundle\Entity\Parameter'
        ));
    }
}
