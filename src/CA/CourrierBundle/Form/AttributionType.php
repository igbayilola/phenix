<?php

namespace CA\CourrierBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use CA\CourrierBundle\Form\AttributionUserType;
use CA\CourrierBundle\Form\CourrierType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AttributionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('attributionusers', CollectionType::class, array(
                    'entry_type' => AttributionUserType::class,
                    'allow_add'    => true,
                    'by_reference' => false,
                    'allow_delete' => true,
                    'label' => 'Attributions',
                ));
        //$builder->add('courrier', HiddenType::class, array('property_path' => 'courrier.id'))
        $builder->add('courrier')
                //->add('attributaire', HiddenType::class, array('property_path' => 'courrier.id'))
                ->add('attributaire')
                ->add('archived')
                ->add('save',      SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CA\CourrierBundle\Entity\Attribution'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ca_courrierbundle_attribution';
    }


}
