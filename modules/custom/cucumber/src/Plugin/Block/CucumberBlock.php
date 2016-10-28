<?php

namespace Drupal\cucumber\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Cucumber' Block.
 *
 * @Block(
 *   id = "cucumber_block",
 *   admin_label = @Translation("Cucumber block"),
 * )
 */
class CucumberBlock extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    $default_config = \Drupal::config('cucumber.settings');
    return array(
      'repeat' => $default_config->get('cucumber.repeat'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();

    if (!empty($config['repeat'])) {
      $repeat = $config['repeat'];
    }
    else {
      $repeat = $this->t('2');
    }

    return array(
      '#markup' => $this->t('Say "Cucumber" @repeat time(s)!', [
        '@repeat' => $repeat,
      ]),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['cucumber_block_repeat'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('How many times'),
      '#description' => $this->t('How many times do you want to say "Cucumber"?'),
      '#default_value' => isset($config['repeat']) ? $config['repeat'] : '',
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('repeat', $form_state->getValue('cucumber_block_repeat'));
  }

}
