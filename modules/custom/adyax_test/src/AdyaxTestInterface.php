<?php

namespace Drupal\adyax_test;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Interface AdyaxTestInterface Provides an interface defining a Contact entity.
 *
 * @package Drupal\adyax_test
 */
interface AdyaxTestInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
