#!/bin/sh
set -e

# Update Apache port if Render assigns a dynamic PORT
if [ -n "$PORT" ]; then
    sed -i "s/80/$PORT/g" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf
fi

# Ensure storage, cache, sessions and database directories exist
mkdir -p /var/www/html/storage/framework/sessions \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/framework/cache \
         /var/www/html/storage/logs \
         /var/www/html/bootstrap/cache \
         /var/www/html/database

# Create SQLite database file if not exists
if [ ! -f /var/www/html/database/database.sqlite ]; then
    touch /var/www/html/database/database.sqlite
fi

# Set full write permissions for Apache/SQLite
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod 666 /var/www/html/database/database.sqlite

# Default fallback environment variables if missing
export APP_KEY="${APP_KEY:-base64:YTx4gaY5nqyklCORDycXfAbCB93ka7ok/5PfsZUlFjM=}"
export DB_CONNECTION="${DB_CONNECTION:-sqlite}"
export SESSION_DRIVER="${SESSION_DRIVER:-file}"
export CACHE_STORE="${CACHE_STORE:-file}"
export QUEUE_CONNECTION="${QUEUE_CONNECTION:-sync}"

# Clear any stale bootstrap caches
php artisan optimize:clear || true

# Run storage link, migrations and database seed
php artisan storage:link || true
php artisan migrate --force --seed || true

exec apache2-foreground
