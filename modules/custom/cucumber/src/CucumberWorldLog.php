<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01.11.16
 * Time: 16:17
 */

namespace Drupal\cucumber;


use Drupal\cucumber\CucumberEntityDecorator;

/**
 * Class CucumberWorldLog.
 *
 * @package Drupal\cucumber
 */
class CucumberWorldLog extends CucumberEntityDecorator {

  /**
   * {@inheritdoc}
   */
  public function log() {

    echo $this->entity_manager->log() . " World!";

  }

}