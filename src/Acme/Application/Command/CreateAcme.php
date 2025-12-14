<?php
declare(strict_types=1);

namespace Acme\Application\Command;

/**
 * @author frada <fbahezna@gmail.com>
 */
final class CreateAcme
{
    public function __construct(
        public mixed $name,
    ){}

    public function getName(): mixed
    {
        return $this->name;
    }
}
