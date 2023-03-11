<?php

namespace Drupal\paramconverter_example\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Concrete class for the Content Entity Example entity.
 *
 * @package Drupal\paramconverter_example\Entity
 *
 * @ContentEntityType(
 *   id = "content_entity_example",
 *   label = @Translation("An Example content Entity"),
 *   base_table = "content_entity_example",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "slug" = "slug",
 *   }
 * )
 */
class ContentEntityExample extends ContentEntityBase implements ContentEntityExampleInterface {

  /**
   * {@inheritDoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = [];

    $fields[$entity_type->getKey('id')] = BaseFieldDefinition::create('integer')
      ->setLabel(new TranslatableMarkup('ID'))
      ->setReadOnly(TRUE)
      ->setSetting('unsigned', TRUE);

    $fields['label'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Label'))
      ->setDescription(t('The label of the entity.'));

    $fields['slug'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Slug'))
      ->setDescription(t('The url slug of the entity.'));

    return $fields;
  }

}
