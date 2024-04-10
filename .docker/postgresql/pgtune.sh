#!/usr/bin/env bash

cp /var/lib/postgresql/data/postgresql.conf /etc/postgresql/postgresql.conf
cat /tmp/pgtune.settings >> /etc/postgresql/postgresql.conf
rm -f /tmp/pgtune.settings
