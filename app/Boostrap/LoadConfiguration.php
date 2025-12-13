<?php
declare(strict_types=1);

namespace App\Boostrap;

use Exception;
use Symfony\Component\Finder\Finder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Config\Repository as RepositoryContract;
use \Illuminate\Foundation\Bootstrap\LoadConfiguration as LoadBaseConfiguration;

/**
 * @author frada <fbahezna@gmail.com>
 */
class LoadConfiguration extends LoadBaseConfiguration
{
    public function __construct(protected $loader)
    {
        $this->loader = ChainLoader::create();
    }

    protected function loadConfigurationFiles(Application $app, RepositoryContract $repository): void
    {
        $files = $this->getConfigurationFiles($app);

        if(!isset($files['app'])){
            throw new Exception('Unable to load application configuration files.');
        }

        foreach ($files as $key => $path) {
            $repository->set($key, $this->loader->load($path));
        }
    }

    protected function getConfigurationFiles(Application $app): array
    {
        $files = [];

        $configPath = realpath($app->configPath());

        foreach (Finder::create()->files()->in($configPath) as $file) {
            if(!$this->loader->supports($file->getRealPath())){
                continue;
            }

            $directory = $this->getNestedDirectory($file, $configPath);
            $extension = pathinfo($file->getRealPath(), PATHINFO_EXTENSION);

            $files[$directory.basename($file->getRealPath(), '.'.$extension)] = $file->getRealPath();
        }

        ksort($files, SORT_NATURAL);

        return $files;
    }
}
