# Installation

### step 1
```shell script
docker-compose up --build
```

### step 2
```shell script
bin/console doctrine:migrations:migrate  
bin/console doctrine:fixtures:load
bin/console adapter:register-tasks
```
