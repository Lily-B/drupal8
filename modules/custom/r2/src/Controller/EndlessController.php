<?php

namespace Drupal\r2\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class EndlessController.
 *
 * @package Drupal\r2\Controller
 */
class EndlessController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function extralong($endless = "") {
//    kint($endless); exit();

    $arr = explode('ъ', $endless);

    $build = array(
      '#type' => 'markup',
      '#markup' => "URL: " . implode(', ', $arr),
    );
    return $build;
  }

}
