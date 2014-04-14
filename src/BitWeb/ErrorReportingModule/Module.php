<?php
/**
 * Created by PhpStorm.
 * User: tobre
 * Date: 14.04.14
 * Time: 13:19
 */

namespace BitWeb\ErrorReportingModule;


use BitWeb\ErrorReporting\Service\ErrorService;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\Mvc\MvcEvent;

class Module implements BootstrapListenerInterface
{

    public function onBootstrap(EventInterface $event)
    {
        /* @var $errorService \BitWeb\ErrorReporting\Service\ErrorService */
        $errorService = $event->getApplication()->getServiceManager()->get(ErrorService::class);
        $errorService->startErrorHandling();

        $event->getApplication()->getEventManager()->attach(MvcEvent::EVENT_FINISH, function (MvcEvent $e) use ($errorService) {
            $errorService->endErrorHandling();
        });
    }

    public function getConfig()
    {
        return include __DIR__ . '/../../../config/module.config.php';
    }
}