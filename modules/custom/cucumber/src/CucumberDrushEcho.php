<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01.11.16
 * Time: 18:47
 */

namespace Drupal\cucumber;


interface CucumberDrushEcho {

  /**
   * Print string in drush.
   *
   * @return string.
   */
  public function log();
}