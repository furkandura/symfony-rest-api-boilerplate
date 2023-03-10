<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class JWTListener
{
    public Request $request;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
    }

    /**
     * @param JWTCreatedEvent $event
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event): void
    {
        $payload = $event->getData();
        $payload['ip'] = $this->request->getClientIp();

        $event->setData($payload);
    }
}
