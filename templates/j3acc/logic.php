<?php 
defined( '_JEXEC' ) or die; 

// variables
$tpath = $this->baseurl.'/templates/'.$this->template;

$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$menu = $app->getMenu();

//get Active menu
$active_menu = $menu->getActive();
// Getting params from application
$params = $app->getParams();


// Getting params from template
$templateparams	= $app->getTemplate(true)->params;
$analytics_id = $templateparams->get('analytics_id' , '');
$pageclass = $params->get('pageclass_sfx');
$this->default_is_active_menu = $active_menu == $menu->getDefault();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

// generator tag
//$this->setGenerator(null);

// force latest IE & chrome frame
$doc->setMetadata('x-ua-compatible','IE=edge,chrome=1');

// js
JHtml::_('jquery.framework');
$doc->addScript($tpath.'/js/bootstrap.min.js');
$doc->addScript($tpath.'/js/j3bs.js');

// css
if ($templateparams->get('runless', 1) == 1)
{
	require 'runless.php';
}

$doc->addStyleSheet($tpath.'/css/template.css');
