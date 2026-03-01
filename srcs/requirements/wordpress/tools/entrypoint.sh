#!/bin/sh
set -eu

DB_PW="$(cat /run/secrets/db_password)"
ADMIN_PW="$(cat /run/secrets/wp_admin_password)"
USER_PW="$(cat /run/secrets/wp_user_password)"

if [ ! -f /usr/local/bin/wp ]; then
  curl -fsSL https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar -o /usr/local/bin/wp
  chmod +x /usr/local/bin/wp
fi

if [ ! -f wp-config.php ]; then
  # WIPE_WEBROOT
  rm -f /var/www/html/index.nginx-debian.html || true
  # if volume got seeded, clear it
  rm -rf /var/www/html/wp-admin /var/www/html/wp-content /var/www/html/wp-includes /var/www/html/*.php 2>/dev/null || true
  wp core download --allow-root --force --force

  wp config create --allow-root \
    --dbname="${MYSQL_DATABASE}" \
    --dbuser="${MYSQL_USER}" \
    --dbpass="${DB_PW}" \
    --dbhost="mariadb:3306"

  wp core install --allow-root \
    --url="https://${DOMAIN_NAME}" \
    --title="${WP_TITLE}" \
    --admin_user="${WP_ADMIN_USER}" \
    --admin_password="${ADMIN_PW}" \
    --admin_email="${WP_ADMIN_EMAIL}"

  wp user create --allow-root \
    "${WP_USER}" "${WP_USER_EMAIL}" \
    --user_pass="${USER_PW}"
fi

exec "$@"
