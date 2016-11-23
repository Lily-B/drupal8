<?php

namespace Drupal\r2\PathProcessor;

use Drupal\Core\PathProcessor\InboundPathProcessorInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Defines a path processor to rewrite file URLs.
 *
 * As the route system does not allow arbitrary amount of parameters convert
 * the file path to a query parameter on the request.
 */
class EndlessPathProcessor implements InboundPathProcessorInterface {

  /**
   * {@inheritdoc}
   */
  public function processInbound($path, Request $request) {

    if (strpos($path, '/endless/') === 0 && !$request->query->has('endless_parameter')) {

      $endless_arg = preg_replace('|^\/endless|', '', $path);
      $request->query->set('endless_parameter', $endless_arg);

//      kint($request);exit();
      $result = '/endless';
      return $result;
    }

    return $path;

  }

}
