<?php

namespace App\Boostrap;

/**
 * @author frada <fbahezna@gmail.com>
 */
interface LoaderInterface
{
    public function load(string $file): array;

    public function supports(string $file): bool;
}
