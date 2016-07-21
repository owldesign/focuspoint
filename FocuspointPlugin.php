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

class FocuspointPlugin extends BasePlugin
{
  public function init()
  {
    parent::init();

    if (craft()->request->isCpRequest() && craft()->userSession->isLoggedIn()) {

      craft()->templates->includeCssResource('focuspoint/css/fields/focuspoint.css');
      craft()->templates->includeJsResource('focuspoint/js/focuspoint.min.js');
      craft()->templates->includeJsResource('focuspoint/js/fields/focuspoint.js');

      craft()->on('focuspoint.onSetPosition', function(Event $event) {
        $params   = $event->params;
        $element  = $event->params['element'];
        $field    = $event->params['field'];
        $fd       = $event->params['focuspointData'];
        $fa       = $fd['focuspointAttr'];
        $fp       = $fd['focuspointPercentage'];

        $inline       = 'data-focus-x="'.$fa['x'].'" data-focus-y="'.$fa['y'].'" data-focus-w="'.$fa['w'].'" data-focus-h="'.$fa['h'].'"';
        $background   = $fp['left'].' '.$fp['top'];

        $focuspointData = [
          'inline'      => $inline,
          'background'  => $background,
          'positionX'   => $fp['left'],
          'positionY'   => $fp['top']
        ];

        $element->getContent()->setAttribute($field->handle, json_encode($focuspointData));
        craft()->elements->saveElement($element);

      });
    }
  }
  public function getName()
  {
    return Craft::t('Focuspoint');
  }

  public function getDescription()
  {
    return Craft::t('Focuspoint lets you select a focal point of an image asset.');
  }

  public function getDocumentationUrl()
  {
    return UrlHelper::getCpUrl('focuspoint/welcome');
  }

  public function getReleaseFeedUrl()
  {
    return 'https://raw.githubusercontent.com/roundhouse/focuspoint/master/releases.json';
  }

  public function getVersion()
  {
    return '1.0.2';
  }
  
  public function getSchemaVersion()
  {
    return '0.0.1';
  }

  public function getDeveloper()
  {
    return 'Vadim Goncharov';
  }

  public function getDeveloperUrl()
  {
    return 'http://roundhouseagency.com';
  }

  public function hasCpSection()
  {
    return false;
  }

  public function onAfterInstall()
  {
    craft()->request->redirect(UrlHelper::getCpUrl('focuspoint/welcome'));
  }
}