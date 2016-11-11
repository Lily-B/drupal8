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
  public function extraLong() {

    $arguments = $this->getQueryParameter('endless_parameter');


    $arguments = preg_replace('|^\/|', '', $arguments);


    $arguments = explode('/', $arguments);
    $output = '';
    $n = 1;
    foreach ($arguments as $argument) {
      $output .= "Argument #" . $n . ": " . $argument . "<br>";
      $n++;
    }

    $build = array(
      '#type' => 'markup',
      '#markup' => "URL arguments: <br>" . $output,
    );
    return $build;
  }

  /**
   * @param string $parameter
   *    The name of parameter in current request's query.
   * @return mixed
   *    Returns string with endless number of arguments.
   */
  private function getQueryParameter($parameter) {

    $query = \Drupal::request()->query;
    $parameter = $query->get('endless_parameter');
    return $parameter;
  }

}
