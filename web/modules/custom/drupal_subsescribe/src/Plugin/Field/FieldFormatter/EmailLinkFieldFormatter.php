<?php

namespace Drupal\drupal_subsescribe\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'email_link_field_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "email_link_field_formatter",
 *   label = @Translation("Email link field formatter"),
 *   field_types = {
 *     "email"
 *   }
 * )
 */
class EmailLinkFieldFormatter extends FormatterBase {


  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = ['#markup' => $this->viewValue($item)];
    }

    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */
  protected function viewValue(FieldItemInterface $item) {
    $url = Url::fromUri('mailto:' .$item->value);
    $link = Link::fromTextAndUrl('text',$url);
    return $link->toString();
  }

}
