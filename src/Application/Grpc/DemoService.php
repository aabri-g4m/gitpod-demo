<?php

declare(strict_types=1);

namespace G4M\Application\Grpc;

use G4M\Service\Demo\V2\DemoServiceInterface;
use G4M\Service\Demo\V2\Greeting;
use G4M\Service\Demo\V2\GreetRequest;
use G4M\Service\Demo\V2\StartTimerRequest;
use G4M\Service\Demo\V2\Timer;
use Spiral\GRPC\ContextInterface;

final class DemoService implements DemoServiceInterface
{
    public function Greet(ContextInterface $ctx, GreetRequest $in): Greeting
    {
        $data = sprintf("Hello %s", $in->getName());
        $greeting = new Greeting;
        $greeting->setGreeting($data);
        return $greeting;
    }

    public function StartTimer(ContextInterface $ctx, StartTimerRequest $in): Timer
    {
        $timer = new Timer;
        $timer->setElapsed($in->getSeed());
        return $timer;
    }
}
