<?php

namespace CA\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use CA\UserBundle\Repository\OrganigrammeRepository;
use CA\UserBundle\Repository\TaglevelRepository;
use CA\UserBundle\Repository\TagpositionRepository;
use Symfony\Component\Form\FormEvents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormEvent;

class OrganigrammeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('parent', EntityType::class, array(
                    'class' => 'CAUserBundle:Organigramme',
                    'choice_label' => 'intitule',
                    'multiple' => false,
                    'required' => false,
                    'query_builder' => function(OrganigrammeRepository $repository) {
                        return $repository->getQueryBuilder();
                    }
                ))
                ->add('level', EntityType::class, array(
                    'class' => 'CAUserBundle:Taglevel',
                    'choice_label' => 'tag',
                    'multiple' => false,
                    'required' => false,
                    'query_builder' => function(TaglevelRepository $repository) {
                        return $repository->getQueryBuilder();
                    }
                ))
                ->add('position', EntityType::class, array(
                    'class' => 'CAUserBundle:Tagposition',
                    'choice_label' => 'tag',
                    'multiple' => false,
                    'required' => false,
                    'query_builder' => function(TagpositionRepository $repository) {
                        return $repository->getQueryBuilder();
                    }
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CA\UserBundle\Entity\Organigramme'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ca_userbundle_organigramme';
    }

}
