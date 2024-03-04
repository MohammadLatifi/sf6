<?php

namespace App\EventSubscriber;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ExceptionSubscriber extends AbstractController implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            ExceptionEvent::class => ['giveResponse'],
        ];
    }

    public function giveResponse(ExceptionEvent $event): ExceptionEvent
    {
        $throwable = $event->getThrowable();

        if ($throwable instanceof NotFoundHttpException) {
            $event->setResponse($this->render('exceptions/error404.html.twig'));

            return $event;
        }

        if ($throwable instanceof AccessDeniedHttpException) {
            $event->setResponse($this->render('exceptions/error403.html.twig'));

            return $event;
        }

        $event->setResponse($this->render('exceptions/error.html.twig'));

        return $event;
    }
}
