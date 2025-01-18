# Projeto Facilita
Bem-vindo ao Projeto Facilita

## Instalação
1 - navegue até a pasta **teste-app-facilita**: 


## Instalação
1 - navegue até a pasta **teste-app-facilita**: 
```sh
cd .\teste-app-facilita\
```

2 - execute o comando: 
```sh
composer install
```

3 - Vá no arquivo `teste-app-facilita\.env.example` renomeie para `.env`, e mude para as suas credênciais:
```.env
DB_CONNECTION=mysql //não esqueça de trocar para mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=app_facilita
# DB_USERNAME=root
# DB_PASSWORD=0000
```

4 - Execute esse comando para criar o BD: 
```sh
php artisan migrate
```

5 -  execute esse comando para popular com dados de teste:
```sh
php artisan db:seed
```

6 - Suba o servidor php utilizando o comando:
```sh
php artisan serve
```
 