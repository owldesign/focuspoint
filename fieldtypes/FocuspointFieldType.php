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
    craft()->templates->includeCssResource('focuspoint/css/fields/focuspoint.css');
    craft()->templates->includeJsResource('focuspoint/js/focuspoint.min.js');
    craft()->templates->includeJsResource('focuspoint/js/focuspoint.js');
    craft()->templates->includeJsResource('focuspoint/js/fields/focuspoint.js');

    return craft()->templates->render('focuspoint/fields/focuspoint', array(
      'id'        => craft()->templates->formatInputId($name),
      'name'      => $name,
      'value'     => $value,
      'fieldId'   => $this->model->id,
      'elementId' => $this->element->id,
    ));
  }

}