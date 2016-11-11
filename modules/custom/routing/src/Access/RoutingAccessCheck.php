<?php

namespace Drupal\routing\Access;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class RoutingAccessCheck.
 *
 * @package Drupal\routing\Access
 */
class RoutingAccessCheck implements AccessInterface {

  /**
   * A custom access check.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   *
   * @return \Drupal\Core\Access\AccessResult
   *   Access result object.
   */
  public function access(AccountInterface $account) {

    if (!in_array('administrator', $account->getRoles())) {
      throw new NotFoundHttpException();
    }
    return AccessResult::allowedIf(in_array('administrator', $account->getRoles()));
  }

}
