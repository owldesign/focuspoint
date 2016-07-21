<?php
/**
 * focuspoint plugin for Craft CMS
 *
 * @author    Vadim Goncharov
 * @copyright Copyright (c) 2016 Vadim Goncharov
 * @link      http://owl-design.net
 * @package   Focuspoint
 * @since     0.0.1
 */

namespace Craft;

class FocuspointFieldType extends BaseFieldType
{ 
  public function getName()
  {
    return Craft::t('Focuspoint');
  }

  public function defineContentAttribute()
  {
    return AttributeType::Mixed;
  }

  public function getInputHtml($name, $value)
  {

    $variables = [
      'settings'  => $this->getSettings(),
      'id'        => craft()->templates->formatInputId($name),
      'name'      => $name,
      'value'     => $value,
      'fieldId'   => $this->model->id,
      'elementId' => $this->element->id,
    ];
    return craft()->templates->render('focuspoint/fields/focuspoint', $variables);
  }

  public function getSettingsHtml()
  {
    $variables['settings'] = $this->getSettings();
    $variables['transforms'] = craft()->assetTransforms->getAllTransforms();
    return craft()->templates->render('focuspoint/fields/settings', $variables);
  }

  protected function defineSettings()
  {
    return array(
      'focuspointType' => AttributeType::String,
      'transformType' => AttributeType::String
    );
  }

}