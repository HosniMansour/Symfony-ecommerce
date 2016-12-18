<?php

namespace Web\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormuType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('objet')
            ->add('nom')
            ->add('email')
            ->add('tele')
            ->add('message')
            ->add('budget')
            ->add('adresse')
            ->add('etat')
            ->add('produit','entity', array(
                'class' => 'WebAdminBundle:Produit')
            );
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Web\AdminBundle\Entity\Formu'
        ));
    }
}
