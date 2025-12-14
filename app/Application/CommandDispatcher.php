<?php
declare(strict_types=1);

namespace App\Application;

use \RuntimeException;

/**
 * @author frada <fbahezna@gmail.com>
 */
final class CommandDispatcher
{
    /**
     * @throws \Exception
     */
    public function dispatch(
        string $module,
        string $command,
        array $payload = []
    ): mixed {
        $commandClass = sprintf(
            '%s\\Application\\Command\\%s',
            $module,
            $command
        );

        if(!class_exists($commandClass)) {
            throw new RuntimeException("Command {$commandClass} does not exist.");
        }

        $command = new $commandClass(...array_values($payload));

        $handlerClass = $commandClass . 'Handler';

        if(!class_exists($handlerClass)) {
            throw new RuntimeException("Command {$commandClass} does not exist.");
        }

        return app($handlerClass)->handle($command);
    }
}
