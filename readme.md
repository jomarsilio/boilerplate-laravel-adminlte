# Documents

* Feito com [Laravel](http://laravel.com)
* Encode: UTF-8
* Docker: http://172.17.0.1:8088

## Laravel

Copie o .env

```sh
$ cp .env.example .env
```

## Docker

Instalar pré-requisitos:
* [Docker](https://docs.docker.com/engine/installation/linux/ubuntulinux/) 
* [docker-compose](https://docs.docker.com/compose/install/)

Para levantar o container, basta executar:
```sh
$ docker-compose up
```

Caso necessário, você pode acessar os containers via SSH:
```sh
$ docker-compose exec web bash
$ docker-compose exec db bash
```

Instalando as dependências no container e compilando os assets:
```sh
$ docker-compose run web php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && php -r "unlink('composer-setup.php');"
$ docker-compose run web php composer.phar install
$ docker-compose run web npm install
$ docker-compose run web ./node_modules/.bin/bower install --allow-root
$ docker-compose run web npm run dev
$ docker-compose run web chmod 0777 storage -R
$ docker-compose run web chmod 0777 bootstrap/cache -R
```

Migrate:

```sh
$ docker-compose exec web php artisan migrate
```

## Deploy (Capistrano)

Você deve rodar o seguinte comando para desativar a aplicação:

```sh
$ docker-compose exec web cap deploy:web:disable
```

Agora sim, para fazer um deploy você deve rodar o seguinte comando, e em seguida informar o servidor em que você deseja fazer o deploy:

```sh
$ docker-compose exec web cap deploy
```

Agora você deve rodar o seguinte comando para ativar a aplicação:

```sh
$ docker-compose exec web cap deploy:web:enable
```

Você pode listar as tarefas existentes executando o comando:

```sh
$ docker-compose exec web cap -vT
```