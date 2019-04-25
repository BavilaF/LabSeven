<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class ProduceItem {

  //Properties
  private $name;
  private $expiration_date;
  private $icon;

  function __construct(string $name, $expiration_date, $icon) {
    $this->name = $name;
    $this->$expiration_date = $expiration_date;
    $this->icon = $icon;
  }

  public function getName() : string {
    return $this->name;
  }

  public function setName(string $name) {
    $this->name = $name;
  }

  public function getExpirationDate() : \DateTime {
    return $this->$expiration_date;
  }

  public function setExpirationDate(\DateTime $expiration_date = null) {
    $this->expiration_date = $expiration_date;
  }

  public function getIcon() {
    $this->icon = $icon;
  }

  public function setIcon($icon) {
    $this->icon = $icon;
  }
}
