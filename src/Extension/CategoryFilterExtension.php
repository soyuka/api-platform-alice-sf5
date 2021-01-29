<?php

declare(strict_types=1);

namespace App\Extension;

use Doctrine\Persistence\ManagerRegistry;
use Soyuka\ESQL\Bridge\ApiPlatform\Extension\QueryCollectionExtensionInterface;
use Soyuka\ESQL\ESQLInterface;
use App\Entity\Category;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class CategoryFilterExtension implements QueryCollectionExtensionInterface
{
    private RequestStack $requestStack;
    private ESQLInterface $esql;
    private ManagerRegistry $managerRegistry;

    public function __construct(RequestStack $requestStack, ESQLInterface $esql, ManagerRegistry $managerRegistry)
    {
        $this->requestStack = $requestStack;
        $this->esql = $esql;
        $this->managerRegistry = $managerRegistry;
    }

    public function apply(string $query, string $resourceClass, ?string $operationName = null, array $parameters = [], array $context = []): array
    {
        $request = $this->requestStack->getCurrentRequest();

        if (null === $request || !$request->query->has('category') || null === $categoryParameter = $request->query->get('category')) {
            return [$query, $parameters];
        }

        if (\is_array($categoryParameter)) {
            throw new BadRequestHttpException();
        }

        $product = $this->esql->__invoke($resourceClass);
        $category = $this->esql->__invoke(Category::class);

        $query = <<<SQL
WITH RECURSIVE
    descendants(identifier, name, parent_id) AS (
        SELECT c.identifier, c.name, c.parent_id FROM category c WHERE c.identifier = :category
        UNION ALL
        SELECT c.identifier, c.name, c.parent_id FROM descendants, category c WHERE c.parent_id = descendants.identifier
    )
SELECT {$product->columns()} FROM {$product->table()}
JOIN descendants {$category->alias()} ON {$product->join(Category::class)}
SQL;

        $parameters['category'] = $categoryParameter;

        return [$query, $parameters];
    }

    public function supports(string $resourceClass, ?string $operationName = null, array $context = []): bool
    {
        return Product::class === $resourceClass;
    }
}

