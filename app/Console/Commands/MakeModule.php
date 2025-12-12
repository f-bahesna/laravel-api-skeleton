<?php
declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

/**
 * @author frada <fbahezna@gmail.com>
 */
class MakeModule extends Command
{
    protected $signature = 'make:module {name}';
    protected $description = 'Generate a DDD module structure inside src/{ModuleName}';

    public function handle()
    {
        $name = ucfirst($this->argument('name'));
        $basePath = base_path("src/{$name}");
        $fs = new Filesystem();

        $directories = [
            "{$basePath}/Application",
            "{$basePath}/Application/Commands",
            "{$basePath}/Application/Handlers",

            "{$basePath}/Domain",
            "{$basePath}/Domain/Model",

            "{$basePath}/Infrastructure",
            "{$basePath}/Infrastructure/Repository",
        ];

        foreach ($directories as $dir) {
            if(! $fs->exists($dir)) {
                $fs->makeDirectory($dir, 0755, true);
                $this->info("Created directory: {$dir}");
            }
        }

        $this->newLine();
        $this->info("DDD module '{$name}' created successfully.");

        return Command::SUCCESS;
    }
}
