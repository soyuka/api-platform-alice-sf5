# API Platform example Product + Category hierarchy

Blog article: https://soyuka.me/esql-alternative-to-doctrine-query-language-why
Branch: product-category-example

```bash
git clone https://github.com/soyuka/api-platform-alice-sf5 --single-branch --branch product-category-example api-platform-product-category-example
cd api-platform-product-category-example
composer install
symfony server:start
```

Go to /api/products.jsonld?perPage=100 then watch the profiler.

```bash
curl localhost:8000/api/products.jsonld?perPage=100
```

