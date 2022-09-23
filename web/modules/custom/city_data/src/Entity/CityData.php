<?php

namespace Drupal\city_data\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the city entity.
 *
 * @ingroup city
 *
 * @ContentEntityType(
 *   id = "city",
 *   label = @Translation("city"),
 *   base_table = "city",
 *   entity_keys = {
 *     "city_id" = "city_id",
 *     "uuid" = "uuid",
 *     "city_name" = "city_name",
 *     "state" = "state",
 *     "population" = "population"
 *   },
 * )
 */

class CityData extends ContentEntityBase implements ContentEntityInterface {

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    // city id field
    $fields['city_id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('City ID'))
      ->setDescription(t('Unique City Id'))
      ->addConstraint('UniqueField')
      ->setRequired(true)
      ->setDisplayOptions('view', array(
          'label' => 'above',
          'weight' => 4,
      ))
      ->setDisplayOptions('form', array(
          'weight' => 4,
      ))
      ->setDisplayConfigurable('form', true)
      ->setDisplayConfigurable('view', true);
    
    // Standard field, unique outside of the scope of the current project.
    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the City entity.'))
      ->setReadOnly(TRUE);

    // city name field
    $fields['city_name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('City Name'))
      ->setDescription(t('The name of the City entity.'))
      ->setSettings(array(
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -6,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    // state name field
    $fields['state'] = BaseFieldDefinition::create('string')
      ->setLabel(t('State Name'))
      ->setDescription(t('The state name of the City entity.'))
      ->setSettings(array(
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -6,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);
    
    // Population of the city field
    $fields['population'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Population'))
      ->setDescription(t('Population of the City'))
      ->setTranslatable(true)
      ->setRequired(true)
      ->setDisplayOptions('view', array(
          'label' => 'above',
          'weight' => 4,
      ))
      ->setDisplayOptions('form', array(
          'weight' => 4,
      ))
      ->setDisplayConfigurable('form', true)
      ->setDisplayConfigurable('view', true);

    return $fields;
  }
}