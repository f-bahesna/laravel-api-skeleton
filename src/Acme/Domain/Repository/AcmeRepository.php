<?php
declare(strict_types=1);

namespace Acme\Domain\Repository;

use Acme\Domain\Entity\AcmeEntity;

/**
 * @author frada <fbahezna@gmail.com>
 */
interface AcmeRepository
{
    public function save(AcmeEntity $acme): void;
}
