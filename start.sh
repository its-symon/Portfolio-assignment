#!/bin/bash

# Wait for database to be ready
until php artisan db:monitor --max-attempts=60; do
  echo "Waiting for database connection..."
  sleep 1
done

# Run migrations
php artisan session:table
php artisan migrate

# Start Apache in foreground
apache2-foreground