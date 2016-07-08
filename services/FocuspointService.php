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

    // Check if transform is set
    $transform = $field->getSettings()->transformType;

    if ($transform) {
      if ($transform != 'originalSize') {
        $image = $element->getUrl($transform);
      } else {
        $image = $element->getUrl();
      }
    } else {
      $image = $element->getUrl();
    }

    $variables = [
      'image'     => $image,
      'field'     => $field,
      'element'   => $element->getContent(),
    ];

    return $variables;
  }

  public function savePosition($element, $field, $focuspointData)
  {
    // Fire an 'onSetPosition' event
    $event = new Event($this, array(
      'element'         => $element,
      'field'           => $field,
      'focuspointData'  => $focuspointData
    ));
    $this->onSetPosition($event);
    return true;
  }

  public function onSetPosition(Event $event)
  {
    $this->raiseEvent('onSetPosition', $event);
  }
}