<?php
declare(strict_types=1);

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

/**
 * @author frada <fbahezna@gmail.com>
 */
final class ModuleRepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->bindRepositories();
    }

    private function bindRepositories(): void
    {
        foreach (glob(base_path('src/*/Infrastructure/Repository/*Repository.php')) as $file) {
            $class = $this->classFromFile($file);

            $interfaces = class_implements($class);

            foreach ($interfaces as $interface) {
                $this->app->bind($interface, $class);
            }
        }
    }

    private function classFromFile(string $file): string
    {
        $relative = str_replace(base_path('src/'), '', $file);

        return str_replace(['/', '.php'], ['\\', ''], $relative);
    }
}
