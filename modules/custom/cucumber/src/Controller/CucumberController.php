<?php

namespace Drupal\cucumber\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class CucumberController.
 *
 * @package Drupal\cucumber\Controller
 */
class CucumberController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {

  }

  /**
   * Content of a block.
   *
   * @return array
   *   for rendering.
   */
  public function content() {
    $element = [
      '#type' => 'markup',
      '#markup' => $this->t('Say "CUCUMBER".'),
    ];
    return $element;
  }

}
