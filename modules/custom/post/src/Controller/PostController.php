<?php

namespace Drupal\post\Controller;

use Drupal\Core\Controller\ControllerBase;
use GuzzleHttp\Psr7\Request;

/**
 * Class PostController.
 *
 * @package Drupal\post\Controller
 */
class PostController extends ControllerBase {

  private $content;

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {

  }

  /**
   * Content of a block.
   */
  public function content() {

  }

  /**
   * Sends post and get requests to this->requestReceiver.
   */
  public function requestSender() {
    $client = \Drupal::httpClient();
    $response = $client->request('GET', 'http://drupal8.local/request/receive');
//    kint($response->getBody());
    $output = $this->t('Response GET status code :') . $response->getStatusCode();
    if ($response->getBody()) {
      $output .= '<br>' . $response->getBody();
    };
    $response = $client->post('http://drupal8.local/request/receive', [
      'headers' => [
        'Content-Type' => 'application/hal+json',
      ],
      'json' => [
        'some JSON' => 'for post request',
      ],
    ]);
    $output .= $this->t('Response POST status code :') . $response->getStatusCode();
    if ($response->getBody()) {
      $output .= '<br>' . $response->getBody();
    };

    $element = [
      '#type' => 'markup',
      '#markup' => $output,
    ];
    return $element;
  }

  /**
   * Receives request and returns different output dependent on request method.
   */
  public function requestReceiver() {

    $request = \Drupal::request();
    $output = $this->t('Hello');
    kint($request);
    if ($request->getMethod() == 'POST') {
      $output = '<em>' . $request->getContent() . '</em>';
    }
    $element = [
      '#type' => 'markup',
      '#markup' => $output,
    ];
    return $element;
  }

}
