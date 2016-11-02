<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01.11.16
 * Time: 15:45
 */

namespace Drupal\cucumber;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Drupal\cucumber\CucumberHelloLog;

class CucumberServiceProvider extends ServiceProviderBase{

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    // Overrides entity.manager service for our own.
    $currentService = $container->get('entity.manager');
//    $decoratedService = new CucumberHelloLog($currentService);
    $container->set('entity.manager', new CucumberWorldLog(new CucumberHelloLog(new CucumberEntityManagerChild())));
    // Logs a notice
//    \Drupal::logger('cucumber')->notice($message);
  }

}
