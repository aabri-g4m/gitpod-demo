<?php

namespace Application\Grpc;

use G4M\Application\Grpc\DemoService;
use G4M\Service\Demo\V2\Greeting;
use G4M\Service\Demo\V2\GreetRequest;
use G4M\Service\Demo\V2\StartTimerRequest;
use G4M\Service\Demo\V2\Timer;
use PHPUnit\Framework\TestCase;
use Spiral\GRPC\ContextInterface;

// mock collaborators of tested class and inject them
// Mockery is just a proposition, PHPUnit's createMock or phpspec/prophecy-phpunit can be used as well
//
// Do not mock gRPC requests
// 1) It is a value object, we can easily instantiate them
// 2) It will probably cause a segfault on phpunit run
/**
 * @internal
 * @coversNothing
 */
class DemoServiceTest extends TestCase
{
    private ContextInterface $ctx;
    private DemoService $sut;

    public function setUp(): void
    {
        parent::setUp();
        $this->sut = new DemoService();
        $this->ctx = \Mockery::mock(ContextInterface::class);
    }

    public function testGreet()
    {
        $request = new GreetRequest();

        $response = $this->sut->Greet($this->ctx, $request);

        $this->assertInstanceOf(Greeting::class, $response);
    }

    public function testStartTimer()
    {
        $request = new StartTimerRequest();

        $response = $this->sut->StartTimer($this->ctx, $request);

        $this->assertInstanceOf(Timer::class, $response);
    }
}
