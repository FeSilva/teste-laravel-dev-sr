# Projeto Laravel - Setup com Docker

## ᵀᴹ Pré-requisitos

Antes de começar, verifique se você tem instalado na sua máquina:

- **PHP 8.3** (localmente)
- **Composer** (localmente)
- **Yarn** (localmente)
- **Docker** e **Docker Compose**

⚡ **Observação:**  
O PHP, Composer e Yarn serão usados localmente para rodar alguns comandos (como `php artisan migrate`, `composer install` e `yarn`), mas todo o ambiente do Laravel (PHP server + MySQL) rodará dentro do Docker.

---

## ᵀᴹ Configuração do Ambiente

### 1. Clone o repositório

```bash
git clone <url-do-repositorio>
cd <nome-da-pasta>
```

### 2. Instale as dependências PHP e JS

Esses comandos são executados **fora** do Docker:

```bash
composer install
yarn install
```

### 3. Copie o arquivo `.env`

```bash
cp .env.example .env
```

⚙️ Ajuste as configurações do `.env` se necessário, especialmente o banco de dados:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=tickets
DB_USERNAME=laravel
DB_PASSWORD=laravel
```

**Importante:**  
O `DB_HOST` deve ser `mysql`, que é o nome do serviço no `docker-compose.yml`, não `localhost`.

---

## ᵀᴹ Subindo o Projeto com Docker

Agora, para levantar o ambiente, execute:

```bash
docker compose build
docker compose up -d
```

Isso irá:

- Buildar a imagem do app
- Subir o servidor Laravel na porta `8000`
- Subir o MySQL na porta `3306`

### ᴿᴼ Acesso

- Aplicação: http://localhost:8000
- Banco de dados: localhost:3306 (user: `laravel`, senha: `laravel`)

---

## ᵀᴹ Comandos útis

### Rodar migrations:

```bash
php artisan migrate
```
_(roda na sua máquina, não dentro do container)_

### Instalar pacotes JS:

```bash
yarn install
```

### Build dos assets:

```bash
yarn build
```
---

## ᵀᴹ Windows vs Linux

A configuração é a mesma para Linux e Windows.  
O que muda:

- **Linux:** use o terminal normalmente (bash ou zsh)
- **Windows:** recomenda-se usar **WSL2** (Windows Subsystem for Linux) para uma experiência melhor com Docker, ou usar o terminal do Docker Desktop.

---

## ᵀᴹ Estrutura do Docker

### `docker-compose.yml`

```yaml
services:
  app:
    build:
      context: .
      dockerfile: Dockerfile
    image: laravel-app
    container_name: laravel-app
    ports:
      - "8000:8000"
    volumes:
      - ./:/var/www/html
    working_dir: /var/www/html
    depends_on:
      - mysql
    environment:
      - COMPOSER_ALLOW_SUPERUSER=1
    command: sh -c "composer install && php artisan serve --host=0.0.0.0 --port=8000"

  mysql:
    image: mysql:8.0
    container_name: laravel-mysql
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: tickets
      MYSQL_USER: laravel
      MYSQL_PASSWORD: laravel
    ports:
      - "3306:3306"
    volumes:
      - mysql_data:/var/lib/mysql

volumes:
  mysql_data:
```

### `Dockerfile`
FROM php:8.3-cli

# Instalar extensões e dependências
RUN apt-get update && apt-get install -y \
    zip unzip curl git libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# PHP config
COPY .docker/php.ini /usr/local/etc/php/php.ini

---

## ᵀᴹ Dicas

- Sempre que alterar dependências PHP (`composer.json`) ou JS (`package.json`), é bom rodar novamente:
  ```bash
  composer install
  yarn install
  ```
- Se tiver problemas com cache:
  ```bash
  php artisan config:cache
  php artisan migrate:fresh --seed
  ```

---

## ᵀᴹ Problemas comuns

- **Banco não conecta:**  
  Confirme se o `DB_HOST` no `.env` é `mysql`, não `localhost`.
- **Portas já usadas:**  
  Verifique se as portas 8000 ou 3306 já não estão sendo usadas no seu sistema.

---


## Telas da Aplicação

## Login
![image](https://github.com/user-attachments/assets/b99d4dc2-5b13-40a8-b67d-f0ae30b1008d)

## Register
![image](https://github.com/user-attachments/assets/cae9f4e1-f2cc-4dbb-9965-73bfd7cad357)


## Chamados 
![image](https://github.com/user-attachments/assets/799573e5-8674-4905-ab03-c47bb16b77fe)
![image](https://github.com/user-attachments/assets/741c425d-732b-4be0-8d58-d992464c975a)
![image](https://github.com/user-attachments/assets/c1f4dafb-a4e0-4b1d-8506-8d43a9736c11)
![image](https://github.com/user-attachments/assets/578253ae-dde4-4a1b-80e5-98e8de4f0303)
![image](https://github.com/user-attachments/assets/08d336fc-2c22-4838-8eaa-30ddbf9029ff)
![image](https://github.com/user-attachments/assets/60414709-13fa-4ba6-84fe-c18ace525218)


##  resolved
![image](https://github.com/user-attachments/assets/e108b980-862a-42ca-8975-32a483b67f85)
![image](https://github.com/user-attachments/assets/8d3ad514-740a-4fdd-8e6e-970134f4c5a7)


## Collection apiDog

workflow: Felipe Silva002 has invited you to join a project TIckets on Apidog https://app.apidog.com/invite/project?token=llo4EPw-BFSVI8a5ju9gF
