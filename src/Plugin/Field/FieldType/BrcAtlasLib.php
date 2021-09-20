<?php

namespace Drupal\brc_atlas\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\OptionsProviderInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Defines the 'brc_atlas_lib' entity field type.
 *
 * @FieldType(
 *   id = "brc_atlas_lib",
 *   label = @Translation("BRC Atlas library"),
 *   description = @Translation("Boolean value indicating whether or not to load the BRC Atlas JS libraries."),
 *   category = @Translation("Custom"),
 *   default_widget = "brc_atlas_lib_checkbox",
 *   default_formatter = "brc_atlas_lib_hide",
 *   cardinality = 1,
 * )
 */
class BrcAtlasLib extends FieldItemBase implements OptionsProviderInterface {

  /**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings() {
    return [
      'on_label' => new TranslatableMarkup('Load'),
      'off_label' => new TranslatableMarkup('Don\'t load'),
    ] + parent::defaultFieldSettings();
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('boolean')
      ->setLabel(t('BRC Atlas library'))
      ->setRequired(TRUE);

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'value' => [
          'type' => 'int',
          'size' => 'tiny',
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
    $element = [];

    $element['on_label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('"Load" label'),
      '#default_value' => $this->getSetting('on_label'),
      '#required' => TRUE,
    ];
    $element['off_label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('"Don\'t load" label'),
      '#default_value' => $this->getSetting('off_label'),
      '#required' => TRUE,
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function getPossibleValues(AccountInterface $account = NULL) {
    return [0, 1];
  }

  /**
   * {@inheritdoc}
   */
  public function getPossibleOptions(AccountInterface $account = NULL) {
    return [
      0 => $this->getSetting('off_label'),
      1 => $this->getSetting('on_label'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getSettableValues(AccountInterface $account = NULL) {
    return [0, 1];
  }

  /**
   * {@inheritdoc}
   */
  public function getSettableOptions(AccountInterface $account = NULL) {
    return $this->getPossibleOptions($account);
  }

  /**
   * {@inheritdoc}
   */
  public static function generateSampleValue(FieldDefinitionInterface $field_definition) {
    $values['value'] = mt_rand(0, 1);
    return $values;
  }

}
