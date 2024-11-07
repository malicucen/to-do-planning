# To-Do Planning

## Installation

```sh
# Clone repository
git clone git@github.com:malicucen/to-do-planning.git

# Install dependencies
composer install

# Run docker containers
docker compose up -d --build

# Create db tables
./vendor/bin/sail artisan migrate

# Retrieve tasks from task providers
./vendor/bin/sail artisan app:retrieve-tasks

# Run developer seeder
./vendor/bin/sail artisan db:seed --class=DeveloperSeeder

# Run tests
./vendor/bin/sail artisan test
```

## Homepage

[http://localhost:8081](http://localhost:8081)
