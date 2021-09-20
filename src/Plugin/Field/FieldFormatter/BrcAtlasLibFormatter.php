<?php
 
namespace Drupal\brc_atlas\Plugin\Field\FieldFormatter;
 
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
 
/**
 * Plugin implementation of the 'MyFieldFormatter' formatter.
 *
 * @FieldFormatter(
 *   id = "brc_atlas_lib_hide",
 *   label = @Translation("Hide BRC Atlas library field"),
 *   field_types = {
 *     "brc_atlas_lib"
 *   }
 * )
 */
class BrcAtlasLibFormatter extends FormatterBase {
 
 /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      // Implement default settings.
    ] + parent::defaultSettings();
  }
 
  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary[] = $this->t('Displays the random string.');
    return $summary;
  }
 
  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
 
    $elements = [];
    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#type' => 'markup',
        '#markup' => ''
      ];
    }
 
    return $elements;
  }
}