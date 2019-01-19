<?php
namespace Drupal\admin_page\Form;
 
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
 
/**
* Configure settings for this site.
*/

class Settings extends ConfigFormBase {
  
/**
   * {@inheritdoc}
   */

  public function getFormId() {
    return 'admin_page_settings';
  }
 
  
/**
   * {@inheritdoc}
   */

  protected function getEditableConfigNames() {
    return [
      'admin_page.settings',
    ];
  }
 
  
/**
   * {@inheritdoc}
   */

  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('admin_page.settings');
 
    $form['sample_setting'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Sample setting'),
      '#description' => $this->t('A sample setting for our module.'),
      '#default_value' => $config->get('sample_setting'),
    );
 
    return parent::buildForm($form, $form_state);
  }
 
  
/**
   * {@inheritdoc}
   */

  public function submitForm(array &$form, FormStateInterface $form_state) {
      
// Retrieve the configuration

       $this->configFactory->getEditable('admin_page.settings')
      
// Set the submitted configuration setting

      ->set('sample_setting', $form_state->getValue('sample_setting'))
      ->save();
 
    parent::submitForm($form, $form_state);
  }
}

