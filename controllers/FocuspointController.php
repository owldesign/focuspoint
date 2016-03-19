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
}
