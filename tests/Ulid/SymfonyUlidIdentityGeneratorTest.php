<?php

declare(strict_types=1);

namespace Gember\IdentityGeneratorSymfony\Test\Ulid;

use Gember\IdentityGeneratorSymfony\Ulid\SymfonyUlidIdentityGenerator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Override;
use Symfony\Component\Uid\Factory\UlidFactory;

/**
 * @internal
 */
final class SymfonyUlidIdentityGeneratorTest extends TestCase
{
    private SymfonyUlidIdentityGenerator $identityGenerator;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();

        $this->identityGenerator = new SymfonyUlidIdentityGenerator(
            new UlidFactory(),
        );
    }

    #[Test]
    public function itShouldGenerateUlid(): void
    {
        $ulid = $this->identityGenerator->generate();

        self::assertMatchesRegularExpression(
            '#[0-7][0-9A-HJKMNP-TV-Z]{25}#',
            $ulid,
        );
    }
}
