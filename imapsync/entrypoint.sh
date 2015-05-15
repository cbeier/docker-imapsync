#!/bin/bash

# Run sync script.
cd /data && php sync.php

# Command.
if [ "$1" = 'noop' ]; then
  exec sleep 10000d
fi

exec "$@"
