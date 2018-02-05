#!/bin/bash
clear


echo "DELETING DATABASE"

php bin/console doctrine:database:drop --if-exists --force

echo "CREATING DATABASE"

php bin/console doctrine:database:create --if-not-exists

echo "CREATING DATABASE SCHEMA"

php bin/console doctrine:schema:update --force --dump-sql

echo "LOADING FIXTURES"

echo "Y" | php bin/console hautelook:fixtures:load

echo "INSTALLATION FINISHED"