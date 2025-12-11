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

# key generate
php artisan key:generate

# migrate
php artisan migrate
```

Run database seeder:

```bash
# db seeder
php artisan db:seed --class=DatabaseSeeder
```

PHPUnit Test:

```bash
# Order Test
php artisan test --filter OrderTest --stop-on-failure
```

Run the system:

```bash
# run
npm run dev
```