<?php
/**
 * Created by PhpStorm.
 * User: tobre
 * Date: 14.04.14
 * Time: 13:19
 */

namespace BitWeb\ErrorReportingModule;


class Module
{
    public function getConfig()
    {
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