<?php

namespace Drupal\adyax_test\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

/**
 * Class AdyaxTestListBuilder.
 *
 * @package Drupal\adyax_test\Entity\Controller
 */
class AdyaxTestListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   *
   * We override ::render() so that we can add our own content above the table.
   * parent::render() is where EntityListBuilder creates the table using our
   * buildHeader() and buildRow() implementations.
   */
  public function render() {
    $build['description'] = array(
      '#markup' => $this->t('Adyax_test Entity Example implements a Adyax_tests 
            model. These adyax_tests are fieldable entities. You can manage the 
            fields on the <a href="@adminlink">Adyax_test admin page</a>.', array(
        '@adminlink' => \Drupal::urlGenerator()
          ->generateFromRoute('adyax_test.adyax_test_settings'),
      )),
    );
    $build['table'] = parent::render();
    return $build;
  }

  /**
   * {@inheritdoc}
   *
   * Building the header and content lines for the adyax_test list.
   *
   * Calling the parent::buildHeader() adds a column for the possible actions
   * and inserts the 'edit' and 'delete' links as defined for the entity type.
   */
  public function buildHeader() {
    $header['id'] = $this->t('AdyaxTestID');
    $header['client_name'] = $this->t('Client Name');
    $header['prefered_brand'] = $this->t('Prefered Brands');
    $header['products_owned_count'] = $this->t('Products owned count');
    // Added field in hook_
    $header['date'] = $this->t('Extra field "DATE"');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\content_entity_example\Entity\Contact */
    $row['id'] = $entity->id();
    $row['client_name'] = $entity->link();
    $row['prefered_brand'] = $this->getTermName($entity->get('prefered_brand')->getString());
    $row['products_owned_count'] = $entity->products_owned_count->value;
    // Added field in hook_update
    $row['date'] = date('Y:m:d', $entity->date->value);
    return $row + parent::buildRow($entity);
  }

  /**
   * Gets term tames from taxonomy.
   *
   * @param $tid
   *    string with tids of terms.
   *
   * @return string
   *    String with term names.
   */
  private function getTermName($tid) {
    $arr = explode(", ", $tid);
    // Get all taxonomy terms from vocabulary 'brands'.
    $terms = \Drupal::entityTypeManager()
      ->getStorage('taxonomy_term')
      ->loadTree('brands');
    $voc = [];
    foreach ($terms as $term) {
      $voc[$term->tid] = $term->name;
    }
    $names = [];
    foreach ($arr as $tid) {
      $names[] = $voc[$tid];
    }
    return(implode(', ', $names));
  }

}
