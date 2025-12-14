<?php
declare(strict_types=1);

namespace Acme\Domain\Service;

use Acme\Domain\Entity\AcmeEntity;
use Acme\Domain\Repository\AcmeRepository;

/**
 * @author frada <fbahezna@gmail.com>
 */
final class AcmeCreator
{
    public function __construct(
        AcmeRepository $acmeRepository,
    )
    {
    }

    public function create(string $name): AcmeEntity
    {
        return AcmeEntity::create($name);
    }
}
