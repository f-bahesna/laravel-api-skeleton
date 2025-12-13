<?php
declare(strict_types=1);

namespace App\Console;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
/**
 * @author frada <fbahezna@gmail.com>
 */
class Kernel extends ConsoleKernel
{
    protected $bootstrappers = [
        \App\Boostrap\LoadConfiguration::class
    ];

    protected $commands = [
        \App\Console\Commands\MakeModule::class,
    ];

    protected function commands(): void
    {
        $this->load(__DIR__. '/Commands');

        require base_path('routes/console.php');
    }
}
