<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01.11.16
 * Time: 16:13
 */

namespace Drupal\cucumber;

use Drupal\cucumber\CucumberEntityDecorator;

/**
 * Class CucumberHelloLog.
 *
 * @package Drupal\cucumber
 */
class CucumberHelloLog extends CucumberEntityDecorator {

  /**
   * {@inheritdoc}
   */
  public function log() {

    echo $this->entity_manager->log() . " Hello!";

  }

}