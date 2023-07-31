Create Images & Containers

    docker-compose up -d --build

Get .env

    cp .env.example .env

Install composer packages

    composer install

Install Node packages

    npm install

Run Node Build 

    npm run build

Migrate & Seed Databases

    php artisan migrate --seed

Login - Test Admin User

    test@example.com
    password

Login - Test User

    test2@example.com
    password

Tests

    PostTest
        - Can create
        - Has a title

    UserTest
        - Gets "user" role on creation