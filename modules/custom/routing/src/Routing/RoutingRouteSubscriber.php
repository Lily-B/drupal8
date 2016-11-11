<?php

namespace Drupal\routing\Routing;

use Drupal\Core\Routing\RoutingEvents;
use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Class RouteSubscriber.
 *
 * @package Drupal\routing\Routing
 */
class RoutingRouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  public function alterRoutes(RouteCollection $collection) {

    // Change theme for login users '/user/*' to admin theme.
    if ($route = $collection->get('entity.user.canonical')) {
      $route->setOption('_admin_route', 'TRUE');
    }

    // Throw 404 for not administrators on pages taxonomy/term/{term}.
    if ($route = $collection->get('entity.taxonomy_term.canonical')) {

      $route->addRequirements(['_routing_access_check' => 'Drupal\routing\Access\RoutingAccessCheck::access']);
    }

  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[RoutingEvents::ALTER] = array('onAlterRoutes', -500);
    return $events;
  }

}
