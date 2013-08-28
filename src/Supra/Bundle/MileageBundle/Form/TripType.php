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
            ->add('travelTime',null, array('label'=>'Travel Duration (mins)'))
            ->add('mileage')
            ->add('tripDate', 'datetime', array('data' => new \DateTime('now')))
            ->add('locations', 'entity', array(
                'class'=>'SupraMileageBundle:Location',
                'property'=>'title',
                'multiple'=>'true'
            ))
            ->add('client')
            ->add('purpose')
            ->add('assume','checkbox',array(
                'label'=>'Assume route?',
                'mapped'=>false,
                'required'=>false
                )
            )
            ->add('unlisted','checkbox',array(
                'label'=>'Destination Unlisted?',
                'mapped'=>false,
                'required'=>false
                )
            )
            ->add('unlisted_address')
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
