<?php

namespace Drupal\routing\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class RoutingController.
 *
 * @package Drupal\routing\Controller
 */
class RoutingController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function term($term_id = "") {

    $user = $this->currentUser();

    kint($user);

    if (!in_array('administrator', $user)) {
      throw new NotFoundHttpException();
    }

    $build = array(
      '#type' => 'markup',
      '#markup' => t("Hello deded!"),
    );
    return $build;
  }

}
