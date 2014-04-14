<?php
/**
 * Created by PhpStorm.
 * User: tobre
 * Date: 14.04.14
 * Time: 13:19
 */

namespace BitWeb\ErrorReportingModule;


use Zend\ModuleManager\ModuleEvent;

class Module
{
    public function onBootstrap(MvcEvent $event)
    {
        $eventManager = $event->getApplication()->getEventManager();
        $eventManager->attach(ModuleEvent::EVENT_LOAD_MODULE_RESOLVE, function($e) {
            var_dump($e);
        }, 100);
    }

    public function getConfig()
    {
        die();
        return include __DIR__ . '/../../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}