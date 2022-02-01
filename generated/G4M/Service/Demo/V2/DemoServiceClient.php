<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// *
// Demo.
//
// This file is really just an example. The data model is completely
// fictional.
namespace G4M\Service\Demo\V2;

/**
 * *
 * Our demo service for testing and demonstration purposes
 */
class DemoServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * / Used to generate a simple "Hello World" style greeting
     * @param \G4M\Service\Demo\V2\GreetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Greet(\G4M\Service\Demo\V2\GreetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/g4m.demo.v2.DemoService/Greet',
        $argument,
        ['\G4M\Service\Demo\V2\Greeting', 'decode'],
        $metadata, $options);
    }

    /**
     * / Start a server side timer and update the caller every second
     * @param \G4M\Service\Demo\V2\StartTimerRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function StartTimer(\G4M\Service\Demo\V2\StartTimerRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/g4m.demo.v2.DemoService/StartTimer',
        $argument,
        ['\G4M\Service\Demo\V2\Timer', 'decode'],
        $metadata, $options);
    }

}
