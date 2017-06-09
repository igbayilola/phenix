<?php

namespace CA\UserBundle\Form\Type;

use CA\UserBundle\Repository\OrganigrammeRepository;
use CA\UserBundle\Form\OrganigrammeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvent;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
 
class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
 
        // add your custom field
        $builder->add('nom');
        $builder->add('prenom');
        $builder->add('interphone');
        $builder->add('telephone');
        $builder->add('position', EntityType::class, array(
                'class' => 'CAUserBundle:Organigramme',
                'choice_label' => 'intitule',
                'multiple' => false,
                'required' => true,
                'query_builder' => function(OrganigrammeRepository $repository) {
                    return $repository->getQueryBuilder();
                }
            ))
            ->add('positionNew', OrganigrammeType::class, array(
                'required' => FALSE,
                'mapped' => FALSE,
                'property_path' => 'position',
            ))
            ->add('enregistrer', SubmitType::class);
        
        $builder->addEventListener(FormEvents::PRE_SUBMIT, function(FormEvent $event) {
            $data = $event->getData();
            $form = $event->getForm();

            if (!empty($data['positionNew']['parent'])) {
                $form->remove('position');

                $form->add('positionNew', OrganigrammeType::class, array(
                    'mapped' => TRUE,
                    'property_path' => 'position',
                ));
            }
        });
    }
 
    /*public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }*/
 
    public function getName()
    {
        return 'ca_user_registration';
    }
    
    /*public function getBlockPrefix()
    {
        return 'fos_user_registration';
    }*/
}