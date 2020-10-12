#!/bin/bash

mkdir -p --verbose --mode=0777 /www/var/cache /www/var/logs
exec "$@"
