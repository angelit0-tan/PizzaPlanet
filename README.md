### `Setup`

Add .env:

```bash
Rename .env.example into .env
```

Make sure to use docker:

```bash
docker compose up -d --build
```

Make sure to install the dependencies and migration:

```bash
# composer
composer install

# npm
npm install

# migrate
php artisan migrate

# run
npm run dev
```

For UnitTesting:

```bash
# PHPUnit Test
php artisan test --filter OrderTest --stop-on-failure
```