<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class Icon {

  //Properties
  private $icon;

  function __construct($icon) {
    $this->icon = $icon;
  }

  public function getIcon() {
    $this->icon = $icon;
  }

  public function setIcon($icon) {
    $this->icon = $icon;
  }
}
