<?php

namespace Supra\Bundle\MileageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TripType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('travelTime')
            ->add('mileage')
            ->add('tripDate', 'datetime', array('data' => new \DateTime('now')))
            ->add('locations', 'entity', array(
                'class'=>'SupraMileageBundle:Location',
                'property'=>'title',
                'multiple'=>'true'
            ))
            ->add('client')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Supra\Bundle\MileageBundle\Entity\Trip'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'supra_bundle_mileagebundle_trip';
    }
}
