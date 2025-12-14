<?php
declare(strict_types=1);

namespace Acme\Domain\Entity;

use Illuminate\Support\Str;

/**
 * @author frada <fbahezna@gmail.com>
 */
final class AcmeEntity
{
    protected string $id;
    protected string $name;
    public function __construct()
    {
        $this->id = Str::uuid()->toString();
    }

    public static function create(string $name): static
    {
        $static = new AcmeEntity();
        $static->name = $name;

        return $static;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setName(string $name): string
    {
        return $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
