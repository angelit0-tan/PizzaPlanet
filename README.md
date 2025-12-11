### `Setup`

Add .env:

```bash
Rename .env.example into .env
```

Build Docker Image:

```bash
docker compose up -d --build
```

Make sure to install the dependencies and migration:

```bash
# composer
docker-compose exec app composer install

# npm
docker-compose exec app npm install

# key generate
docker-compose exec app php artisan key:generate

# migrate
docker-compose exec app php artisan migrate
```

Run database seeder:

```bash
# db seeder
docker-compose exec app php artisan db:seed --class=DatabaseSeeder
```

PHPUnit Test:

```bash
# Order Test
docker-compose exec app php artisan test --filter OrderTest --stop-on-failure
```

Run the system:

```bash
# run
docker-compose exec app npm run dev
```

Access Localhost:
```bash
http://localhost:1941/
```

