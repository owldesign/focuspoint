<?php
namespace Craft;

class FocuspointController extends BaseController
{
  public function actionGetDefaultValues()
  {
    $fieldId = craft()->request->getPost('fieldId');
    $elementId = craft()->request->getPost('elementId');

    $element = craft()->elements->getElementById($elementId);

    if ($element) {
      $field = craft()->fields->populateFieldType(craft()->fields->getFieldById($fieldId), $element);
      $defaultValues = craft()->focuspoint->getDefaultValues($field);
      $this->returnJson($defaultValues);
    }
  }
  
  public function actionSavePosition()
  {
    $data = craft()->request->getPost();
    $elementData = craft()->request->getPost('element');
    $fieldName = $elementData['fieldName'];
    $fieldId = $elementData['fieldId'];
    $elementId = $elementData['elementId'];

    $field = craft()->fields->getFieldById($fieldId);
    $element = craft()->elements->getElementById($elementId);
    
    if ($element) {
      $savePosition = craft()->focuspoint->savePosition($element, $field, $data);
    }

    $this->returnJson($savePosition);
  }


}
