<?php

namespace Drupal\cucumber;

/**
 * Class CucumberWorldLog.
 *
 * @package Drupal\cucumber
 */
class CucumberWorldLog extends CucumberEntityDecorator {

  /**
   * {@inheritdoc}
   */
  public function clearCachedDefinitions() {

    echo "*****Word!***** (from 1 decorator!)\r\n";

    $this->entityManager->clearCachedDefinitions();
  }

}