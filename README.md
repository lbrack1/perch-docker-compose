# PERCH CMS DOCKER COMPOSE

***Easy Perch CMS development with Docker and Docker Compose***

With this project you can quickly run the following:

- [Perch CMS](https://grabaperch.com/)
- [phpMyAdmin](https://www.phpmyadmin.net/)
- [MySQL](https://www.mysql.com/)

## Requirements

Install the latest versions of Docker and Docker Compose on your machine.

[Install Docker for Windows](https://docs.docker.com/docker-for-windows/install/)

[Install Docker for Mac](https://docs.docker.com/docker-for-mac/install/)

[Install Docker Compose](https://docs.docker.com/compose/install/)

Clone this repository or copy the files from this repository into a new folder.

## Configuration

Create a new file in the root of the project called `.env`. This is used to set configuration values for your Perch project. The set of configurable values can be found in `env.example`

Note: `.env` is not tracked by git as it contains secrets that you will not want to publish.

Update `.env`. For example, to create a new Perch site for `www.example_domain.com`.

```
COMPOSE_PROJECT_NAME=example_domain

#Perch config
LOCAL_DOMAIN=example_domain.local

MYSQL_ROOT_PASSWORD=my_secure_root_password
PERCH_DB_USERNAME=my_database_username
PERCH_DB_PASSWORD=my_secure_database_password
```

## Installation

You can either install a fresh Perch Runway project or [migrate an existing project](#import-existing-perch-project)

### Set up new Perch project

To start a fresh Perch project download the latest version of Perch Runway from [here](https://perchrunway.com/download) and copy it into the `src/example_domain/` directory where `COMPOSE_PROJECT_NAME` is value of `COMPOSE_PROJECT_NAME` from `.env`.

Open a terminal and cd into the folder which contains docker-compose.yml and run:

```
docker-compose up -d
```

This will build and run the docker containers.

The `/src/example_domain/` directory will be mounted into the Perch container and used to serve your website. 

Also, a new mysql database is created for your project. The database name will be set by the `COMPOSE_PROJECT_NAME` parameter in `.env`

Finally, to access your local Perch CMS installation you need to [add a new entry into your hosts file](https://www.howtogeek.com/howto/27350/beginner-geek-how-to-edit-your-hosts-file/).

```
127.0.0.1 example_domain.local
```

This must match the value entered for `LOCAL_DOMAIN` in the .env file.

Now navigate to `http://example_domain.local/perch` to access Perch CMS.

### Import existing perch project

To import an existing Perch project into perch-docker-compose:

##### 1) Copy Perch files

Copy or `git clone` your Perch project into the `/src/` directory. This file is mounted into your Perch container.

The directory structure should look like this:

```
|-src/example_domain/perch 
```

Again, it is important that `example_domain` is be eqaul to the `COMPOSE_PROJECT_NAME` in `.env`

##### 2) Export Perch database

[Export](https://phoenixnap.com/kb/import-and-export-mysql-database) your existing Perch database. Copy the file to the root of the project.

Add the below environmental variable to `.env`.

```
PERCH_DB_FILE=name_of_db_export.sql
```

##### 3) Update perch config

Ensure the database values in perch/config/config.php match the database values defined in '.env'

##### 4) Fire it up

Run `docker-compose up -d` to start the containers. Your database and perch files will be imported.

### config.php

You can set up your config.php to dynamically switch between local and production environments.

```
<?php
    $http_host = getenv('HTTP_HOST');
    switch($http_host)
    {
        case('example_domain.local') :
            define("PERCH_DB_USERNAME", 'dev_user');
            define("PERCH_DB_PASSWORD", 'super_secure_password');
            define("PERCH_DB_SERVER", "database");
            define("PERCH_DB_DATABASE", "example_domain");
            break;

        default :
            define("PERCH_DB_USERNAME", 'prod_user');
            define("PERCH_DB_PASSWORD", 'super_secure_password');
            define("PERCH_DB_SERVER", "production_server.com");
            define("PERCH_DB_DATABASE", "prod_db");
            define("PERCH_SSL", true);
            break;
        }
```

## USAGE

Examples of using Docker Compose to streamline your Perch workflow.

### Workflow

The expected use of this module is that you create a new sub repository to check changes to the your perch directory.

For an example of using this workflow in practice see this blog post.

### Starting containers

You can start the containers with the up command in daemon mode (by adding -d as an argument) or by using the start command:

```
docker-compose start
```

### Stopping containers

```
docker-compose stop
```

### Removing containers

To stop and remove all the containers use the down command:

```
docker-compose down
```

Use -v if you need to remove the database volume which is used to persist the database. This will destroy all the data in your Perch database.

```
docker-compose down -v
```
