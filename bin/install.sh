#!/bin/bash
clear


echo "DELETING DATABASE"

php console doctrine:database:drop --if-exists --force

echo "CREATING DATABASE"

php console doctrine:database:create --if-not-exists

echo "CREATING DATABASE SCHEMA"

php console doctrine:schema:update --force --dump-sql

echo "LOADING FIXTURES"

echo "Y" | php console hautelook:fixtures:load

echo "INSTALLATION FINISHED"