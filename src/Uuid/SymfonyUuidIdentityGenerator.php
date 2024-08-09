<?php

declare(strict_types=1);

namespace Gember\IdentityGeneratorSymfony\Uuid;

use Gember\EventSourcing\Util\Generator\Identity\IdentityGenerator;
use Symfony\Component\Uid\Factory\UuidFactory;

final readonly class SymfonyUuidIdentityGenerator implements IdentityGenerator
{
    public function __construct(
        private UuidFactory $uuidFactory,
    ) {}

    public function generate(): string
    {
        return (string) $this->uuidFactory->randomBased()->create();
    }
}
