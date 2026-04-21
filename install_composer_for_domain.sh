#!/usr/bin/env bash
set -euo pipefail

# Usage:
# ./install_composer_for_domain.sh /home/irfdjjne/public_html/skypush.skylinksolutions.co.tz /opt/cpanel/ea-php82/root/usr/bin/php

PROJECT_PATH="${1:-}"
PHP_BIN="${2:-php}"

if [[ -z "$PROJECT_PATH" ]]; then
  echo "Usage: $0 /path/to/project [php-binary]"
  exit 2
fi

if [[ ! -d "$PROJECT_PATH" ]]; then
  echo "ERROR: project path does not exist: $PROJECT_PATH"
  exit 3
fi

# go to project
cd "$PROJECT_PATH"

echo "Working in: $(pwd)"
echo "Using PHP binary: $PHP_BIN"

# backup composer.lock and vendor (safe to have backups)
if [[ -f composer.lock ]]; then
  cp -v composer.lock composer.lock.bak || true
fi
if [[ -d vendor ]]; then
  echo "Creating vendor backup (vendor.bak). This may take time..."
  rm -rf vendor.bak || true
  mv vendor vendor.bak || true
fi

# download composer installer (try php copy first, fallback to curl)
echo "Downloading Composer installer..."
$PHP_BIN -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" || \
curl -sS https://getcomposer.org/installer -o composer-setup.php

if [[ ! -f composer-setup.php ]]; then
  echo "Failed to download composer-setup.php"
  exit 4
fi

# run installer forcing allow_url_fopen on the CLI
echo "Running composer installer (temporarily enabling allow_url_fopen)..."
$PHP_BIN -d allow_url_fopen=On composer-setup.php

if [[ ! -f composer.phar ]]; then
  echo "composer.phar not found after install"
  exit 5
fi

# cleanup installer
$PHP_BIN -r "unlink('composer-setup.php');"

# run composer update (or use install if you prefer safe install from lock)
echo "Running composer update (this updates according to composer.lock/composer.json)..."
$PHP_BIN composer.phar update

# optimized autoload
echo "Generating optimized autoload..."
$PHP_BIN composer.phar dump-autoload -o

# create convenient alias in current user's bashrc (if not already present)
BASHRC="$HOME/.bashrc"
ALIAS_STR="alias composer='$PHP_BIN -d allow_url_fopen=On $PROJECT_PATH/composer.phar'"
if ! grep -Fxq "$ALIAS_STR" "$BASHRC" 2>/dev/null; then
  echo "$ALIAS_STR" >> "$BASHRC"
  echo "Alias added to $BASHRC"
fi

# clear and rebuild Laravel caches (if this is a Laravel app)
if [[ -f artisan ]]; then
  echo "Clearing Laravel caches..."
  $PHP_BIN artisan optimize:clear || true
  echo "Rebuilding Laravel optimized files..."
  $PHP_BIN artisan optimize || true
fi

# permissions
echo "Setting recommended permissions on storage and bootstrap/cache..."
chmod -R 775 storage bootstrap/cache || true

echo "Done for project: $PROJECT_PATH"
echo "If you want to run migrations, run: php artisan migrate --force"
