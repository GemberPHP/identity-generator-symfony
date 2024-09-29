<?php

declare(strict_types=1);

namespace Gember\IdentityGeneratorSymfony\Ulid;

use Gember\EventSourcing\Util\Generator\Identity\IdentityGenerator;
use Override;
use Symfony\Component\Uid\Factory\UlidFactory;

final readonly class SymfonyUlidIdentityGenerator implements IdentityGenerator
{
    public function __construct(
        private UlidFactory $ulidFactory,
    ) {}

    #[Override]
    public function generate(): string
    {
        return (string) $this->ulidFactory->create();
    }
}
