<?php
/**
 * Bootstrap
 *
 * @author Łukasz Jankowski <mail@lukaszjankowski.info>
 */
namespace SkeletonApp\Application;

class Bootstrap extends \Zend_Application_Bootstrap_Bootstrap
{
    protected function _initLayout()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $this->getPluginResource('layout')->init();
        $view->doctype('HTML5');
        $view->headLink()->appendStylesheet($view->baseUrl('/css/main.css'));
        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8');
        $view->headTitle('Skeleton application');

        return $view;
    }
}
