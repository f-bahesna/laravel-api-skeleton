<?php
declare(strict_types=1);

namespace App\Boostrap;

use Symfony\Component\Yaml\Yaml;

/**
 * @author frada <fbahezna@gmail.com>
 */
class YamlLoader implements LoaderInterface
{
    public function load(string $file): array
    {
        return Yaml::parseFile($file);
    }

    public function supports(string $file): bool
    {
        return in_array($file, ['yaml', 'yml'], true);
    }
}
