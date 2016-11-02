<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01.11.16
 * Time: 18:43
 */

namespace Drupal\cucumber;


use Drupal\Core\Entity\EntityManager;

class CucumberEntityManagerChild  extends EntityManager implements CucumberDrushEcho {

  /**
   * @return string
   */
  function log(){

    return "Say: ";

  }
}