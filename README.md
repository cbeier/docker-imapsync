# imapsync Docker

Docker container to run the "imapsync" script.

See imapsync on github for more information and options: https://github.com/imapsync/imapsync

## Requirements

  * [Docker](https://docs.docker.com/installation/#installation)
  * boot2docker (for mac and windows)
  * [Docker Compose](https://docs.docker.com/compose/)

## Configure the Sync

Configure the mailboxes that will be synced in the "data.php" inside the "data" directory.

## Run the container

  $ docker-compose up

Docker automatically run the sync script with the configured data in the "data" directory.

### Run the sync script inside the container

You can also execute the sync script inside the container via shell:

  * Get the id/name of the container with `docker ps`.
  * Open a shell inside the container with `docker exec -it <CONTAINER ID> bash`
  * Run the sync script with: `cd /data && php sync.php`
