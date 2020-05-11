# Enuygun

To-Do Planning,

## Architectures & Patterns

#### Architectures
- Hexagonal Architecture
- Domain Driven Design Architecture
- Test Driven Development

#### Patterns
- Adapter
- Decorator
- Proxy
- Factory
- Observer
- Delegate
- Repository-Service
- Producer–consumer
- Singleton


## Installation

### step 1
Get project
```shell script
git clone https://github.com/koushamad/enuygun.git
```

### step 2
Build project
```shell script
cd enuygun/docker
docker-compose up --build
```

### step 3
Check Your docker containers
```shell script
docker ps
```
- docker_nginx
- docker_php-fpm
- docker_database
- docker_vue
- rabbitmq:3-management
- redis

If we do`nt have one of this container please try again

### step 4
Migrate database
```shell script
docker exec -it docker_php-fpm_1 bin/console doctrine:migrations:migrate 
docker exec -it docker_php-fpm_1 bin/console doctrine:fixtures:load
docker exec -it docker_php-fpm_1 bin/console adapter:register-tasks
```

### step 5
Run Tests
```shell script
docker exec -it docker_php-fpm_1 vendor/bin/simple-phpunit
```

### step 6
Fetch tasks
```shell script
docker exec -it docker_php-fpm_1 bin/console adapter:register-tasks
```

### step 7
go to http://loccalhost
