#!/bin/bash
DB_PATH=../database.sqlite

curl 'https://docs.google.com/spreadsheets/d/12I_4zde3YO09-CgkvXdX8zgfBwgyAqfeYOcZEoVWimA/export?exportFormat=csv' > temp.csv
sqlite3 $DB_PATH < update_tables.sql

rm temp.csv
