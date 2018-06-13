<?php

namespace Drupal\drupal_subsescribe\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ConfigurationForm.
 */
class ConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'drupal_subsescribe.configuration',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'configuration_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('drupal_subsescribe.configuration');
    $form['keep_enjoy_of_huntink'] = [
      '#type' => 'textField',
      '#title' => $this->t('Keep enjoy of Huntink'),
      '#default_value' => $config->get('keep_enjoy_of_huntink'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('drupal_subsescribe.configuration')
      ->set('keep_enjoy_of_huntink', $form_state->getValue('keep_enjoy_of_huntink'))
      ->save();
  }

}
