<?php

namespace Drupal\paramconverter_example\ParamConverter;

use Drupal\Core\ParamConverter\ParamConverterInterface;
use Symfony\Component\Routing\Route;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * A parameter converter class to allow loading of ContentEntityExample entities.
 */
class ContentEntityExampleParamConverter implements ParamConverterInterface {

  /**
   * Entity type manager which performs the upcasting in the end.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new EntityConverter.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritDoc}
   */
  public function convert($value, $definition, $name, array $defaults) {
    $contentEntityExampleParamConverterStorage = $this->entityTypeManager->getStorage($definition['type']);
    if (is_numeric($value)) {
      // Allow the entity to be loaded via the ID value.
      return $contentEntityExampleParamConverterStorage->load($value);
    }
    else {
      $results = $contentEntityExampleParamConverterStorage->loadByProperties(['slug' => $value]);
      if (count($results) > 0) {
        return array_pop($results);
      }
    }

    return NULL;
  }

  /**
   * {@inheritDoc}
   */
  public function applies($definition, $name, Route $route) {
    if (!empty($definition['type']) && $definition['type'] === 'content_entity_example') {
      return TRUE;
    }
    return FALSE;
  }

}
