<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: pb/demo/v2/demo.proto

namespace G4M\Meta\Demo\V2;

class Demo
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
pb/demo/v2/demo.protog4m.demo.v2"
GreetRequest
name (	"
Greeting
greeting (	"!
StartTimerRequest
seed ("
Timer
elapsed (2�
DemoServiceO
Greet.g4m.demo.v2.GreetRequest.g4m.demo.v2.Greeting"���"	/v2/greet:*X

StartTimer.g4m.demo.v2.StartTimerRequest.g4m.demo.v2.Timer"���"	/v2/timer:*0B;Zservices/demo/v2�G4M\\Service\\Demo\\V2�G4M\\Meta\\Demo\\V2bproto3'
        , true);

        static::$is_initialized = true;
    }
}

