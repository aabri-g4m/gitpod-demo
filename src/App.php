<?php

/**
 * This file is part of Spiral package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace G4M;

use G4M\Application\Bootloader as AppBootloader;
use G4M\Observability\Middleware\Bootloader as MiddlewareBootloader;
use Spiral\Boot\Exception\BootException;
use Spiral\Bootloader as Framework;
use Spiral\DotEnv\Bootloader as DotEnv;
use Spiral\Framework\Kernel;
use Spiral\Prototype\Bootloader as Prototype;

class App extends Kernel
{
    /*
     * List of components and extensions to be automatically registered
     * within system container on application start.
     */
    protected const LOAD = [
        // Environment configuration
        DotEnv\DotenvBootloader::class,

        // Core Services
        Framework\SnapshotsBootloader::class,
        Framework\Security\EncrypterBootloader::class,

        // Databases
        Framework\Database\DatabaseBootloader::class,
        Framework\Database\MigrationsBootloader::class,

        // ORM
        Framework\Cycle\CycleBootloader::class,
        Framework\Cycle\ProxiesBootloader::class,
        Framework\Cycle\AnnotatedBootloader::class,

        // Dispatchers
        Framework\Jobs\JobsBootloader::class,

        // Framework commands
        Framework\CommandBootloader::class,

        // Debugging
        Framework\DebugBootloader::class,
        Framework\Debug\LogCollectorBootloader::class,
        AppBootloader\LoggingBootloader::class,

        // Grpc Middleware
        MiddlewareBootloader\GRPCBootloader::class,
        MiddlewareBootloader\GRPCObservabilityBootloader::class,
        MiddlewareBootloader\PipelineBootloader::class,
        MiddlewareBootloader\TracingBootloader::class,
    ];

    // Application specific services and extensions.
    protected const APP = [
        Prototype\PrototypeBootloader::class,
    ];

    /**
     * Normalizes directory list and adds all required aliases.
     */
    final protected function mapDirectories(array $directories): array
    {
        if (!isset($directories['root'])) {
            throw new BootException('Missing required directory `root`');
        }

        if (!isset($directories['app'])) {
            $directories['app'] = $directories['root'].'/src/';
        }

        return array_merge(
            [
                // vendor libraries
                'vendor' => $directories['root'].'/vendor/',

                // data directories
                'runtime' => $directories['root'].'/runtime/',
                'cache' => $directories['root'].'/runtime/cache/',

                // Config directories
                'config' => $directories['root'].'/config/',
                // application directories
                'resources' => $directories['app'].'/resources/',
            ],
            $directories
        );
    }
}
