# Enuygun

To-Do Planning,

## Architectures & Patterns

#### Architectures
- Hexagonal Architecture
- Domain Driven Design Architecture

#### Patterns
- Adapter
- Decorator
- Proxy
- Factory
- Observer
- Delegate


## Installation


### step 1
Get project
```shell script
cd docker
docker-compose up --build
docker ps
```

### step 2
Build project
```shell script
cd docker
docker-compose up --build
docker ps
```

Check Your docker containers

- docker_nginx
- docker_php-fpm
- docker_database
- docker_vue
- rabbitmq:3-management
- redis

If we do`nt have one of this container please try again

### step 3

Migrate database

```shell script
docker exec -it docker_php-fpm_1 bin/console doctrine:migrations:migrate 
docker exec -it docker_php-fpm_1 bin/console doctrine:fixtures:load
docker exec -it docker_php-fpm_1 bin/console adapter:register-tasks
```

### step 4

Fetch tasks

```shell script
docker exec -it docker_php-fpm_1 bin/console adapter:register-tasks
```

### step 5
go to http://loccalhost
