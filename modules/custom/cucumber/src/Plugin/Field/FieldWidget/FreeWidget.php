<?php

namespace Drupal\cucumber\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\WidgetInterface;

/**
 * Class FreeWidget.
 *
 * @package Drupal\cucumber\Plugin\Field
 *
 * @FieldWidget(
 *   id = "field_email_free",
 *   label = @Translation("Free widget"),
 *   field_types = {
 *     "email"
 *   }
 * )
 */
class FreeWidget extends WidgetBase implements WidgetInterface {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : 'default';
    $element += array(
      '#type' => 'textfield',
      '#default_value' => $value,
      '#size' => 20,
      '#maxlength' => 20,
    );
    return array('value' => $element);
  }

}
