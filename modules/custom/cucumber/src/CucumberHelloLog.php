<?php

namespace Drupal\cucumber;

/**
 * Class CucumberHelloLog.
 *
 * @package Drupal\cucumber
 */
class CucumberHelloLog extends CucumberEntityDecorator {

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function clearCachedDefinitions() {

    echo "*****Hello***** (from 2 decorator!)\r\n";

    $this->entityManager->clearCachedDefinitions();

  }

}
