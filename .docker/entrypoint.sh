#!/bin/bash
set -e

if [ -d /var/www/html/bsdarlingweb ]; then
  chown -R www-data:www-data /var/www/html/bsdarlingweb || true
fi

cd /var/www/html/bsdarlingweb

# install vendor jika belum ada
if [ ! -d "vendor" ]; then
    echo "Running composer install..."
    composer install --no-interaction
fi

exec "$@"
