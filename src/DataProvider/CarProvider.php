<?php

/*
 * This file is part of the API Platform By Examples project.
 *
 * (c) Antoine Bluchet <soyuka@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\DenormalizedIdentifiersAwareItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Car;

/**
 * Restricts a data provider based on a condition.
 */
final class CarProvider implements RestrictedDataProviderInterface, DenormalizedIdentifiersAwareItemDataProviderInterface
{
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Car::class === $resourceClass && 'get' === $operationName;
    }

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
    {
        $car = new Car();

        if (\is_string($id['id'])) {
            $car->setName($id['id']);
            $car->setId(1);
        } else {
            $car->setId(2);
        }

        return $car;
    }
}
