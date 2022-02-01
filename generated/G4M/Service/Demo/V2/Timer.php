<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: pb/demo/v2/demo.proto

namespace G4M\Service\Demo\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 **
 * The update message that will be returned to the caller via the stream
 *
 * Generated from protobuf message <code>g4m.demo.v2.Timer</code>
 */
class Timer extends \Google\Protobuf\Internal\Message
{
    /**
     * the amount of seconds that have elapsed since the timer was started
     *
     * Generated from protobuf field <code>int32 elapsed = 1;</code>
     */
    protected $elapsed = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $elapsed
     *           the amount of seconds that have elapsed since the timer was started
     * }
     */
    public function __construct($data = NULL) {
        \G4M\Meta\Demo\V2\Demo::initOnce();
        parent::__construct($data);
    }

    /**
     * the amount of seconds that have elapsed since the timer was started
     *
     * Generated from protobuf field <code>int32 elapsed = 1;</code>
     * @return int
     */
    public function getElapsed()
    {
        return $this->elapsed;
    }

    /**
     * the amount of seconds that have elapsed since the timer was started
     *
     * Generated from protobuf field <code>int32 elapsed = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setElapsed($var)
    {
        GPBUtil::checkInt32($var);
        $this->elapsed = $var;

        return $this;
    }

}

