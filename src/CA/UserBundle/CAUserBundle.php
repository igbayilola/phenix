<?php

namespace CA\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CAUserBundle extends Bundle
{
  public function getParent()
  {
    return 'FOSUserBundle';
  }
}
