#!/bin/sh
set -eu

mkdir -p /run/mysqld
chown -R mysql:mysql /run/mysqld /var/lib/mysql || true

DB_ROOT_PW="$(cat /run/secrets/db_root_password)"
DB_PW="$(cat /run/secrets/db_password)"

if [ ! -d "/var/lib/mysql/mysql" ]; then
  mariadb-install-db --user=mysql --datadir=/var/lib/mysql > /dev/null

  gosu mysql mariadbd --datadir=/var/lib/mysql --skip-networking --socket=/run/mysqld/mysqld.sock &
  pid="$!"

  for i in $(seq 1 30); do
    mariadb-admin --socket=/run/mysqld/mysqld.sock ping --silent && break
    sleep 1
  done

  mariadb --socket=/run/mysqld/mysqld.sock -uroot <<EOFSQL
ALTER USER 'root'@'localhost' IDENTIFIED BY '${DB_ROOT_PW}';
CREATE DATABASE IF NOT EXISTS \`${MYSQL_DATABASE}\`;
CREATE USER IF NOT EXISTS '${MYSQL_USER}'@'%' IDENTIFIED BY '${DB_PW}';
GRANT ALL PRIVILEGES ON \`${MYSQL_DATABASE}\`.* TO '${MYSQL_USER}'@'%';
FLUSH PRIVILEGES;
EOFSQL

  mariadb-admin --socket=/run/mysqld/mysqld.sock -uroot -p"${DB_ROOT_PW}" shutdown
  wait "$pid" || true
fi

exec gosu mysql mariadbd --datadir=/var/lib/mysql --socket=/run/mysqld/mysqld.sock
