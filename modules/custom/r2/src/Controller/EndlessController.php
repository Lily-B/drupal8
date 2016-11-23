<?php

namespace Drupal\r2\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\RequestStack;

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

    $arguments = $this->getQueryParameter();
//    $arguments = $this->getQueryParameter('endless_parameter');


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
   * Get value of 'endless parameter from current query.
   *
   * @return mixed
   *    Returns string with endless number of arguments.
   */
  private function getQueryParameter() {

    $query = \Drupal::request()->query;
    $parameter = $query->get('endless_parameter');
    return $parameter;
  }

}
