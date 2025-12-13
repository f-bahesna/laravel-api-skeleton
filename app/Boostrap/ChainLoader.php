<?php
declare(strict_types=1);

namespace App\Boostrap;

use RuntimeException;

/**
 * @author frada <fbahezna@gmail.com>
 */
final class ChainLoader implements LoaderInterface
{
    private $loaders;

    /**
     * @param $loaders
     */
    public function __construct(array $loaders)
    {
        $this->loaders = $loaders;
    }

    public static function create(): ChainLoader
    {
        return new static(
            [
                new YamlLoader()
            ]
        );
    }

    public function load(string $file): array
    {
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        foreach ($this->loaders as $loader){
            if(true === $loader->supports($extension)){
                return $loader->load($file);
            }
        }

        throw new RuntimeException(sprintf('There is no loader for extension "%s".', $extension));
    }

    public function supports(string $file): bool
    {
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        foreach ($this->loaders as $loader){
            if(true === $loader->supports($extension)){
                return true;
            }
        }

        return false;
    }
}
