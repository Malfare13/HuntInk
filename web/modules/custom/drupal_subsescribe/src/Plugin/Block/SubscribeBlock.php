<?php

namespace Drupal\drupal_subsescribe\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormBuilderInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Provides a 'SubscribeBlock' block.
 *
 * @Block(
 *  id = "subscribe_block",
 *  admin_label = @Translation("Subscribe block"),
 * )
 */
class SubscribeBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Drupal\Core\Form\FormBuilderInterface definition.
   *
   * @var \Drupal\Core\Form\FormBuilderInterface
   */
  protected $formBuilder;
  /**
   * Symfony\Component\EventDispatcher\EventSubscriberInterface definition.
   *
   * @var \Symfony\Component\EventDispatcher\EventSubscriberInterface
   */
  protected $rendererNonHtml;
  /**
   * Constructs a new SubscribeBlock object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param string $plugin_definition
   *   The plugin implementation definition.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    FormBuilderInterface $form_builder,
	EventSubscriberInterface $renderer_non_html
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->formBuilder = $form_builder;
    $this->rendererNonHtml = $renderer_non_html;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('form_builder'),
      $container->get('renderer_non_html')
    );
  }
  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $form = $this->formBuilder->getForm('Drupal\drupal_subsescribe\Form\SubscribeForm');
  // ksm($form);
   //$build['subscribe_block']['#markup'] = 'Implement SubscribeBlock.';
  $build['subscribe'] = $form;

    return $build;
  }

}
