# RMSystem

![Test](https://github.com/KingMike100/rmsystem/workflows/CI/badge.svg)

A project to build a demo "research management system", to allow research teams to centrally store data, documents, metadata etc during the active life of their research project.

## Prerequisites
Before you start, you will need: 
  - Supported platforms are Windows, Mac and Linux.
  - Docker installed on the platform
  - Docker-compose installed on the platform
### Part 1 (Installing Docker and Docker-compose)
Docker installation steps if it does not exist, skip this part to part 2 if you have Docker and Docker-compose installed
### Windows Installation
#### Docker
Installation guidelines for Docker:
https://docs.docker.com/docker-for-windows/install/

#### Docker-compose
Installation guidelines for Docker-compose:

Docker Desktop for Windows and Docker Toolbox already include Compose along with other Docker apps.
### Mac Installation
#### Docker
Installation guidelines for Docker:
https://docs.docker.com/docker-for-mac/install/
#### Docker-compose
Installation guidelines for Docker-compose:

Docker Desktop for Mac and Docker Toolbox already include Compose along with other Docker apps.

### Linux Installation
#### Docker
Installation guidelines for Docker:
[Centos](https://docs.docker.com/install/linux/docker-ce/centos/)
[Debian](https://docs.docker.com/install/linux/docker-ce/debian/)
[Fedora](https://docs.docker.com/install/linux/docker-ce/fedora/)
[Ubuntu](https://docs.docker.com/install/linux/docker-ce/ubuntu/)
#### Docker-compose
Installation guidelines for Docker-compose on Linux Systems
https://docs.docker.com/compose/install/#install-compose-on-linux-systems

### Part 2 (Installing the RMSystem)

### Installation
1. Clone this repository into a local folder
```sh
$ git clone https://github.com/stats4sd/rmsystem.git
$ cd rmsystem
$ node app
```
2. Setting up environment variables
Rename .env.example to .env file in the root of your folder and insert your key/value pairs in the following format of KEY=VALUE:
```sh
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

MYSQL_DATABASE=
MYSQL_USER=user
MYSQL_PASSWORD=
MYSQL_ROOT_PASSWORD=
APP_URL=
```
3. Finally, Launch the RMSystem application
```sh
$ docker-compose up -d
```
### Executing commands
Commands can be launched inside the `app` Laravel Development Container with `docker-compose` using the `exec` command.
The general structure of the `exec` command is:

```sh
$ docker-compose exec <service> <command>
```
where `<service>` is the name of the container service as described in the `docker-compose.yml` file and `<command>` is the command you want to launch inside the service.

Following are examples of launching Laravel development commands inside the app service container.


Installing dependencies
```sh
$ docker-compose exec app composer install
```
Generating the app key
```sh
$ docker-compose exec app php artisan key:generate
```
Migrating the tables
```sh
$ docker-compose exec app php artisan migrate
```
Creating a storage symbolic link for file storage
```sh
$ docker-compose exec app php artisan storage:link
```
Launch the application from your browser via http://ip-address/admin
  
