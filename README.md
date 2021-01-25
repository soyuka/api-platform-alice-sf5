# API Platform reproducer

Issue: https://github.com/api-platform/core/issues/3979
Branch: repro-3979

```bash
git clone https://github.com/soyuka/api-platform-alice-sf5 --single-branch --branch repro-3979 api-platform-repro-3979
cd repro-3979
composer install
symfony server:start
```

Go to /api/cars/me, it fetches the car 1.

```bash
curl localhost:8001/api/cars/me.jsonld
```
