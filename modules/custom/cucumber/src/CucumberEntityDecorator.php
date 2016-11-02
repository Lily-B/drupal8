<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01.11.16
 * Time: 16:07
 */

namespace Drupal\cucumber;


use Drupal\Core\Entity\EntityManager;
use Drupal\Component\Plugin\Discovery\CachedDiscoveryInterface;
use Drupal\Core\Entity\EntityManagerInterface;
use Drupal\cucumber\CucumberDrushEcho;


//abstract class CucumberEntityDecorator extends EntityManager {
abstract class CucumberEntityDecorator implements CucumberDrushEcho {
//abstract class CucumberEntityDecorator implements CachedDiscoveryInterface{

  /**
   * nelkfg.
   *
   * @var \Drupal\cucumber\CucumberDrushEcho
   */
  protected $entity_manager;

  /**
   * {@inheritdoc}
   */
  function __construct(CucumberDrushEcho $entity_manager) {

    echo "Decorator constructor.";
    $this->entity_manager = $entity_manager;
    echo $this->log();
  }

  /**
   * {@inheritdoc}
   */
  public abstract function log();

}
