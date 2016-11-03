<?php

namespace Drupal\cucumber;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Entity\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

/**
 * Class CucumberEntityDecorator.
 *
 * @package Drupal\cucumber
 */
abstract class CucumberEntityDecorator implements EntityManagerInterface, ContainerAwareInterface {

  /**
   * Dependency Injection variable.
   *
   * @var \Drupal\Core\Entity\EntityManagerInterface
   */
  protected $entityManager;

  /**
   * {@inheritdoc}
   */
  public function __construct(EntityManagerInterface $entity_manager) {

    echo "*****Decorator constructor.\r\n";

    $this->entityManager = $entity_manager;

  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  abstract public function clearCachedDefinitions();

/*
 * Realizing all interfaces methods (the way EntityManager does it).
 * ------------------------------------------------------------------------------------------------------
 */

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getDefinition($entity_type_id, $exception_on_invalid = TRUE) {
    return $this->entityManager->getDefinition($entity_type_id, $exception_on_invalid);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function hasHandler($entity_type, $handler_type) {
    return $this->entityManager->hasHandler($entity_type, $handler_type);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getStorage($entity_type) {
    return $this->entityManager->getStorage($entity_type);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getListBuilder($entity_type) {
    return $this->entityManager->getListBuilder($entity_type);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getFormObject($entity_type, $operation) {
    return $this->entityManager->getFormObject($entity_type, $operation);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getRouteProviders($entity_type) {
    return $this->entityManager->getRouteProviders($entity_type);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getViewBuilder($entity_type) {
    return $this->entityManager->getViewBuilder($entity_type);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getAccessControlHandler($entity_type) {
    return $this->entityManager->getAccessControlHandler($entity_type);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getHandler($entity_type, $handler_type) {
    return $this->entityManager->getHandler($entity_type, $handler_type);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function createHandlerInstance($class, EntityTypeInterface $definition = NULL) {
    return $this->entityManager->createHandlerInstance($class, $definition);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getBaseFieldDefinitions($entity_type_id) {
    return $this->entityManager->getBaseFieldDefinitions($entity_type_id);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getFieldDefinitions($entity_type_id, $bundle) {
    return $this->entityManager->getFieldDefinitions($entity_type_id, $bundle);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getFieldStorageDefinitions($entity_type_id) {
    return $this->entityManager->getFieldStorageDefinitions($entity_type_id);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function setFieldMap(array $field_map) {
    return $this->entityManager->setFieldMap($field_map);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getFieldMap() {
    return $this->entityManager->getFieldMap();
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getFieldMapByFieldType($field_type) {
    return $this->entityManager->getFieldMapByFieldType($field_type);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function onFieldDefinitionCreate(FieldDefinitionInterface $field_definition) {
    $this->entityManager->onFieldDefinitionCreate($field_definition);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function onFieldDefinitionUpdate(FieldDefinitionInterface $field_definition, FieldDefinitionInterface $original) {
    $this->entityManager->onFieldDefinitionUpdate($field_definition, $original);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function onFieldDefinitionDelete(FieldDefinitionInterface $field_definition) {
    $this->entityManager->onFieldDefinitionDelete($field_definition);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function clearCachedFieldDefinitions() {
    $this->entityManager->clearCachedFieldDefinitions();
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function clearCachedBundles() {
    $this->entityManager->clearCachedBundles();
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getBundleInfo($entity_type) {
    return $this->entityManager->getBundleInfo($entity_type);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getAllBundleInfo() {
    return $this->entityManager->getAllBundleInfo();
  }

  /**
   * {@inheritdoc}
   */
  public function getExtraFields($entity_type_id, $bundle) {
    return $this->entityManager->getExtraFields($entity_type_id, $bundle);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getEntityTypeLabels($group = FALSE) {
    return $this->entityManager->getEntityTypeLabels($group);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getTranslationFromContext(EntityInterface $entity, $langcode = NULL, $context = array()) {
    return $this->entityManager->getTranslationFromContext($entity, $langcode, $context);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getAllViewModes() {
    return $this->entityManager->getAllViewModes();
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getViewModes($entity_type_id) {
    return $this->entityManager->getViewModes($entity_type_id);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getAllFormModes() {
    return $this->entityManager->getAllFormModes();
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getFormModes($entity_type_id) {
    return $this->entityManager->getFormModes($entity_type_id);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getViewModeOptions($entity_type_id) {
    return $this->entityManager->getViewModeOptions($entity_type_id);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getFormModeOptions($entity_type_id) {
    return $this->entityManager->getFormModeOptions($entity_type_id);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getViewModeOptionsByBundle($entity_type_id, $bundle) {
    return $this->entityManager->getViewModeOptionsByBundle($entity_type_id, $bundle);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getFormModeOptionsByBundle($entity_type_id, $bundle) {
    return $this->entityManager->getFormModeOptionsByBundle($entity_type_id, $bundle);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function clearDisplayModeInfo() {
    $this->entityManager->clearDisplayModeInfo();
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function loadEntityByUuid($entity_type_id, $uuid) {
    return $this->entityManager->loadEntityByUuid($entity_type_id, $uuid);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function loadEntityByConfigTarget($entity_type_id, $target) {
    return $this->entityManager->loadEntityByConfigTarget($entity_type_id, $target);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getEntityTypeFromClass($class_name) {
    return $this->entityManager->getEntityTypeFromClass($class_name);
  }

  /**
   * {@inheritdoc}
   */
  public function onEntityTypeCreate(EntityTypeInterface $entity_type) {
    $this->entityManager->onEntityTypeCreate($entity_type);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function onEntityTypeUpdate(EntityTypeInterface $entity_type, EntityTypeInterface $original) {
    $this->entityManager->onEntityTypeUpdate($entity_type, $original);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function onEntityTypeDelete(EntityTypeInterface $entity_type) {
    $this->entityManager->onEntityTypeDelete($entity_type);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function onFieldStorageDefinitionCreate(FieldStorageDefinitionInterface $storage_definition) {
    $this->entityManager->onFieldStorageDefinitionCreate($storage_definition);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function onFieldStorageDefinitionUpdate(FieldStorageDefinitionInterface $storage_definition, FieldStorageDefinitionInterface $original) {
    $this->entityManager->onFieldStorageDefinitionUpdate($storage_definition, $original);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function onFieldStorageDefinitionDelete(FieldStorageDefinitionInterface $storage_definition) {
    $this->entityManager->onFieldStorageDefinitionDelete($storage_definition);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function onBundleCreate($bundle, $entity_type_id) {
    $this->entityManager->onBundleCreate($bundle, $entity_type_id);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function onBundleDelete($bundle, $entity_type_id) {
    $this->entityManager->onBundleDelete($bundle, $entity_type_id);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getLastInstalledDefinition($entity_type_id) {
    return $this->entityManager->getLastInstalledDefinition($entity_type_id);
  }

  /**
   * {@inheritdoc}
   */
  public function useCaches($use_caches = FALSE) {
    $this->entityManager->container->get('entity_type.manager')->useCaches($use_caches);

    // @todo EntityFieldManager is not a plugin manager, and should not co-opt
    //   this method for managing its caches.
    $this->entityManager->useCaches($use_caches);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getLastInstalledFieldStorageDefinitions($entity_type_id) {
    return $this->entityManager->getLastInstalledFieldStorageDefinitions($entity_type_id);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getDefinitions() {
    return $this->entityManager->getDefinitions();
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function hasDefinition($plugin_id) {
    return $this->entityManager->hasDefinition($plugin_id);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function createInstance($plugin_id, array $configuration = []) {
    return $this->entityManager->createInstance($plugin_id, $configuration);
  }

  /**
   * {@inheritdoc}
   *
   * @deprecated in Drupal 8.0.0, will be removed before Drupal 9.0.0.
   */
  public function getInstance(array $options) {
    return $this->entityManager->getInstance($options);
  }

  /**
   * Sets the container.
   *
   * @param ContainerInterface|null $container A ContainerInterface instance or null
   */
  public function setContainer(ContainerInterface $container = null)
  {
    $this->entityManager->setContainer($container);
  }

}
