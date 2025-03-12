# Avaliação
Projeto de avaliação dos conhecimentos de desenvolvimento de uma aplicação web. 
Após finalizar, o candidato deve disponibilizar o link do repositório no github.

## Prazo
O candidato terá 3 dias corridos a partir da disponibilização deste arquivo para finalizar o projeto.

## Especificações
* Postgres 14+
* Laravel

## Observações
*Este projeto conta com o ambiente de banco dados já prepardo no docker.*
- Quaisquer configurações ou alterações necessárias para que o projeto seja executado,
devem ser documentadas no projeto

# Objetivo
- Criar um sistema (CRUD) para controle de viagens.
- O Sistema deve conter as seguintes funcionalidades:
* CRUD de Veículos
  * Modelo
  * Ano
  * Data de aquisição
  * KMs rodados no momento da aquisição
  * Renavam - Deve ser único
  * Placa - Deve ser único
* CRUD de Motoristas
  * Nome 
  * Data de nascimento - ter no minímo, 18 anos
  * N° da CNH.
* CRUD de Viagens
  * Escolher os motoristas da viagem
  * Escolher o veículo da viagem
  * KM Inicial do veículo no início da viagem
  * KM Final do veículo ao finalizar a viagem
  * Data e hora inicial da viagem
  * Data e hora de chegada.


## Configuração do Ambiente

### Pré-requisitos

- Docker
- Docker Compose
- Composer
- PHP 8.0+
- Node.js (opcional, para compilação de assets)

### Passos para Configuração

1. **Clone o repositório:**

   ```bash
   git clone git@github.com:reinaldoper/entrevista-master.git
   cd entrevista-master
   ```

2. Copie o arquivo .env.example para .env e configure as variáveis de ambiente:

   ```bash
   cp .env.example .env
   ```

- Edite o arquivo .env conforme necessário, especialmente as configurações do banco de dados.


3. Suba os contêineres Docker:

   ```bash
   docker-compose up -d
   ```

4. Instale as dependências do Composer:

   ```bash
   composer install
   ```

5. Gere a chave da aplicação:

   ```bash
   php artisan key:generate
   ```

6. Execute as migrações:

   ```bash
   php artisan migrate 
   ```

7. Inicie o servidor de desenvolvimento:

   ```bash
   php artisan serve
   ```

- O servidor estará disponível em http://localhost:8000.
