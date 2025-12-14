<?php
declare(strict_types=1);

namespace Acme\Application\Command;

use Acme\Domain\Repository\AcmeRepository;
use Acme\Domain\Service\AcmeCreator;

/**
 * @author frada <fbahezna@gmail.com>
 */
final class CreateAcmeHandler
{
    public function __construct(
        private AcmeRepository $repository,
        private AcmeCreator $creator
    )
    {
    }

    public function handle(CreateAcme $command)
    {
        $acme = $this->creator->create(
            $command->name,
        );

        $this->repository->save($acme);

        return response()->json(
            [
                'id' => $acme->getId(),
                'name' => $acme->getName(),
            ]
        );
    }
}
