<?php
/**
 * @file
 * File for settings.
 */

use \Drupal\Core\Form\FormStateInterface;

/**
 * Adds settings for footer text.
 *
 * @param $form
 * @param \Drupal\Core\Form\FormStateInterface $form_state
 * @param null $form_id
 */
function november_form_system_theme_settings_alter(&$form, FormStateInterface &$form_state, $form_id = NULL) {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  $form['theme_settings']['footer_text'] = array(
    '#title' => t('Footer text'),
    '#type' => 'checkbox',
    '#default_value' => theme_get_setting('footer_text'),
    '#description' => t("Shows footer text in footer"),
  );

}
