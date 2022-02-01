<?php

declare(strict_types=1);

namespace G4M\Application\Bootloader;

use G4M\Application\Formatters\G4mStandardFormatter;
use Monolog\Handler\HandlerInterface;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Monolog\Bootloader\MonologBootloader;

final class LoggingBootloader extends Bootloader
{
    protected const DEPENDENCIES = [
        MonologBootloader::class,
    ];

    public function boot(MonologBootloader $monolog): void
    {
        $handler = $this->logHandler(directory('runtime').'logs/debug.log');
        /** @var string $channel */
        $channel = env('LOGGING_CHANNEL_NAME', 'g4m-log');
        $monolog->addHandler($channel, $handler);
    }

    public function logHandler(
        string $filename,
        int $level = Logger::DEBUG,
        int $maxFiles = 0,
        bool $bubble = false
    ): HandlerInterface {
        $handler = new RotatingFileHandler(
            $filename,
            $maxFiles,
            $level,
            $bubble,
            null,
            true
        );

        return $handler->setFormatter(new G4mStandardFormatter());
    }
}
