<?php

declare(strict_types=1);

namespace Gember\IdentityGeneratorSymfony\Test\Uuid;

use Gember\IdentityGeneratorSymfony\Uuid\SymfonyUuidIdentityGenerator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Factory\UuidFactory;

/**
 * @internal
 */
final class SymfonyUuidIdentityGeneratorTest extends TestCase
{
    private SymfonyUuidIdentityGenerator $identityGenerator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->identityGenerator = new SymfonyUuidIdentityGenerator(
            new UuidFactory(),
        );
    }

    #[Test]
    public function itShouldGenerateUuid(): void
    {
        $uuid = $this->identityGenerator->generate();

        self::assertMatchesRegularExpression(
            '#^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$#',
            $uuid,
        );
    }
}
