# BASIC RUN 
to test user this version off docker
```
Client: Docker Engine - Community
 Version:           20.10.17
 
Server: Docker Engine - Community
 Engine:
  Version:          20.10.17
  
```
```
Docker Compose version v2.5.0
```

Base docker configurations for run container to dev project in this case use:
 - mysql
 - nginx
 - php-fpm
 - traefik
 - redis

to configure copy all values from 'env.example' to '.env' file

and set project name in env variable called `PROJECT_NAME`
