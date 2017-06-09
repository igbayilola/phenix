<?php

namespace CA\CourrierBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CourrierEditType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->remove('fichier');
    $builder->add('fichier', FichierType::class, array(
                    'required' => FALSE,
                ));
  }

  public function getParent()
  {
    return CourrierType::class;
  }
}