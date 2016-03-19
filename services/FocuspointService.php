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

class FocuspointService extends BaseApplicationComponent
{
  public function getDefaultValues(FocuspointFieldType $field)
  {
    $element    = $field->element;
    $image      = $element->getUrl('medium');
    $variables  = array('image' => $image);

    return $variables;
  }
}