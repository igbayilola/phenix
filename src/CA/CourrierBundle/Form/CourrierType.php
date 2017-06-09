<?php

namespace CA\CourrierBundle\Form;

use CA\CourrierBundle\Repository\CorrespondantRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourrierType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $pattern = 'M%';
        $builder
            ->add('objet', TextType::class)
            ->add('reference', TextType::class)
            ->add('numAttribution', TextType::class)
            ->add('type', RadioType::class)
            ->add('dateCourrier', DateType::class)
            ->add('correspondant', EntityType::class, array(
                'class' => 'CACourrierBundle:Correspondant',
                'choice_label' => 'nom',
                'multiple' => false,
                'query_builder' => function(CorrespondantRepository $repository) use($pattern) {
                    return $repository->getLikeQueryBuilder($pattern);
                }
            ))
            ->add('correspondantNew', CorrespondantType::class, array(
                'required' => FALSE,
                'mapped' => FALSE,
                'property_path' => 'correspondant',
            ))
            ->add('fichier', FichierType::class)
            ->add('Enregistrer', SubmitType::class);
        
        $builder->addEventListener(FormEvents::PRE_SUBMIT, function(FormEvent $event) {
            $data = $event->getData();
            $form = $event->getForm();

            if (!empty($data['correspondantNew']['nom'])) {
                $form->remove('correspondant');

                $form->add('correspondantNew', CorrespondantType::class, array(
                    'mapped' => TRUE,
                    'property_path' => 'correspondant',
                ));
            }
        });
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CA\CourrierBundle\Entity\Courrier',
            'allow_extra_fields' => true
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ca_courrierbundle_courrier';
    }


}