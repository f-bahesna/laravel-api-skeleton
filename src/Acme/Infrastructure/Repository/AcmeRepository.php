<?php
declare(strict_types=1);

namespace Acme\Infrastructure\Repository;

use Acme\Domain\Entity\AcmeEntity;
use Acme\Domain\Repository\AcmeRepository as AcmeRepositoryInterface;
use Acme\Infrastructure\Model\Acme;

/**
 * @author frada <fbahezna@gmail.com>
 */
final class AcmeRepository implements AcmeRepositoryInterface
{
    public function save(AcmeEntity $acme): void
    {
        try {
            Acme::updateOrInsert(
                ['id' => $acme->getId()],
                ['name' => $acme->getName()],
            );
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
