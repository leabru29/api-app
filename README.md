# Laravel API Application

Este projeto é uma aplicação API desenvolvida em Laravel 11 e containerizada com Docker usando o Laravel Sail.

## Requisitos

Antes de começar, certifique-se de que seu sistema atende aos seguintes requisitos:

- **Windows ou Linux**
- **Docker** e **Docker Compose** instalados
- PHP 8.3 (opcional, para executar comandos localmente sem Docker)
- Composer (opcional, para instalar dependências sem Docker)

---

## Configuração do Projeto

### 1. Clonar o Repositório

```bash
git clone https://github.com/leabru29/api-app.git
cd api-app
```

### 2. Instalar Dependências

#### Usando Docker:
```bash
./vendor/bin/sail composer install
```

#### Sem Docker (opcional):
```bash
composer install
```

### 3. Configurar o Ambiente

Copie o arquivo `.env.example` para `.env` e ajuste as configurações, se necessário:
```bash
cp .env.example .env
```

**Gere uma chave da aplicação:**
```bash
./vendor/bin/sail artisan key:generate
```

### 4. Construir e Iniciar os Containers Docker

```bash
./vendor/bin/sail up -d
```

### 5. Configurar o Banco de Dados

Rode as migrações para configurar o esquema do banco de dados:
```bash
./vendor/bin/sail artisan migrate
```

Se necessário, execute os seeders:
```bash
./vendor/bin/sail artisan db:seed
```

---

## Como Rodar o Projeto

### Windows

1. Certifique-se de que o Docker Desktop está em execução.
2. Use o WSL2 (subsistema do Windows para Linux) para executar os comandos.
3. Navegue até o diretório do projeto e execute:
   ```bash
   ./vendor/bin/sail up -d
   ```

### Linux

1. Certifique-se de que o Docker está instalado e rodando.
2. Navegue até o diretório do projeto e execute:
   ```bash
   ./vendor/bin/sail up -d
   ```

---

## Executando Testes

Para rodar os testes automatizados:
```bash
./vendor/bin/sail test
```

---

## Acessando a Aplicação

Após iniciar os containers, você pode acessar a API em:

- **URL:** `http://localhost`

Certifique-se de que a porta 80 não está em uso. Caso contrário, ajuste a porta no arquivo `docker-compose.yml`.

---

## Parando o Ambiente

Para parar os containers:
```bash
./vendor/bin/sail down
```

---

## Comandos Úteis

### Executar Comandos Artisan

```bash
./vendor/bin/sail artisan <comando>
```

### Executar Comandos Composer

```bash
./vendor/bin/sail composer <comando>
```

### Acessar o Container

```bash
./vendor/bin/sail shell
```

---

## Dicas

- Para rodar o projeto sem Docker, você precisará configurar manualmente o ambiente (servidor PHP, banco de dados, etc.).
- Sempre verifique se as dependências e versões correspondem aos requisitos do Laravel 11.
