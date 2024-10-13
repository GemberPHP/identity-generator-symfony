# 🫚 Gember Identity generator: Symfony Uid
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE)
[![PHP Version](https://img.shields.io/badge/php-%5E8.3-8892BF.svg?style=flat)](http://www.php.net)

[Gember Event Sourcing](https://github.com/GemberPHP/event-sourcing) Identity Generator adapter based on [symfony/uid](https://github.com/symfony/uid).

> All external dependencies in Gember Event Sourcing are organized into separate packages,
> making it easy to swap out a vendor adapter for another.

## Installation
Install with Composer:
```bash
composer require gember/identity-generator-symfony
```

## Configuration
Bind this adapter to the `IdentityGenerator` interface in your service definitions.

### Examples

#### Vanilla PHP
```php
use Gember\IdentityGeneratorSymfony\Ulid\SymfonyUlidIdentityGenerator;
use Gember\IdentityGeneratorSymfony\Uuid\SymfonyUuidIdentityGenerator;
use Symfony\Component\Uid\Factory\UlidFactory;
use Symfony\Component\Uid\Factory\UuidFactory;

# ULID Identity Generator
$ulidIdentityGenerator = new SymfonyUlidIdentityGenerator(
    new UlidFactory(),
);

# UUID (v4) Identity Generator
$uuidIdentityGenerator = new SymfonyUuidIdentityGenerator(
    new UuidFactory(),
);
```

#### Symfony
It is recommended to use the [Symfony bundle](https://github.com/GemberPHP/event-sourcing-symfony-bundle) to configure Gember Event Sourcing.
With this bundle, the UUID adapter is automatically set as the default for Identity Generator.

If you're not using the bundle, you can bind it directly to the `IdentityGenerator` interface.

```yaml
# Bind ULID Identity Generator to interface
Gember\EventSourcing\Util\Generator\Identity\IdentityGenerator:
  class: Gember\IdentityGeneratorSymfony\Ulid\SymfonyUlidIdentityGenerator
  arguments:
    - '@ Symfony\Component\Uid\Factory\UlidFactory'

# OR bind UUID (v4) Identity Generator to interface
Gember\EventSourcing\Util\Generator\Identity\IdentityGenerator:
  class: Gember\IdentityGeneratorSymfony\Uuid\SymfonyUuidIdentityGenerator
  arguments:
    - '@ Symfony\Component\Uid\Factory\UuidFactory'
```
