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
    if (craft()->request->isCpRequest() && craft()->userSession->isLoggedIn()) {
      craft()->templates->includeCssResource('focuspoint/css/fields/focuspoint.css');
      craft()->templates->includeJsResource('focuspoint/js/focuspoint.min.js');
      craft()->templates->includeJsResource('focuspoint/js/focuspoint.js');
      craft()->templates->includeJsResource('focuspoint/js/fields/focuspoint.js');
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
    return 'https://raw.githubusercontent.com/owldesign/focuspoint/master/releases.json';
  }

  public function getVersion()
  {
    return '0.0.1';
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
    return 'http://owl-design.net';
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