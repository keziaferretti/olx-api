# API OLX em Laravel
Este projeto é uma API desenvolvida em Laravel para simular o funcionamento do OLX, com funcionalidades de autenticação e gerenciamento de anúncios.

## Funcionalidades

### Autenticação:

- **signin**: Login de usuários.
- **signup**: Registro de novos usuários.
- **me**: Recuperar informações do usuário autenticado.

### Migrações:

- **advertises**: Tabela de anúncios.
- **states**: Tabela de estados.
- **categories**: Tabela de categorias.

### Requisitos
- PHP >= 8.2
- Composer
- Laravel >= 8
- MySQL

### Instalação

**Clone o repositório**
`
   git clone https://github.com/keziaferretti/olx-api.git
   cd olx-api
`


### Instale as dependências:

  composer install


### Configure o arquivo .env:
Copie o arquivo .env.example para .env e configure as variáveis de ambiente, especialmente a conexão com o banco de dados:

cp .env.example .env

### migrações:

php artisan migrate

### Inicie o servidor de desenvolvimento:

php artisan serve

### Rotas de Autenticação
- POST /api/signup
- Registra um novo usuário.

### Parâmetros:

- name: Nome do usuário (obrigatório, mínimo 3 caracteres)
- email: Email do usuário (obrigatório, único)
- password: Senha do usuário (obrigatório, mínimo 6 caracteres)
- state_id: ID do estado (obrigatório, deve existir na tabela states)

Exemplo de Requisição:

'  json
  {
    "name": "John Doe",
    "email": "john.doe@example.com",
    "password": "password123",
    "state_id": 1
  }'

POST /api/signin
- Realiza o login do usuário.

### Parâmetros:

  - email: Email do usuário (obrigatório)
  - password: Senha do usuário (obrigatório)

Exemplo de Requisição:

'  json
  {
    "email": "john.doe@example.com",
    "password": "password123"
  }'
GET /api/me
Recupera as informações do usuário autenticado.

Cabeçalho de Autorização:

Authorization: Bearer {token}
Exemplo de Resposta:

'  json
  {
    "id": 1,
    "name": "John Doe",
    "email": "john.doe@example.com",
    "state_id": 1,
    "created_at": "2023-05-24T12:00:00.000000Z",
    "updated_at": "2023-05-24T12:00:00.000000Z"
  }'

### Migrações
- advertises: Tabela que armazena os anúncios.
- states: Tabela que armazena os estados.
- categories: Tabela que armazena as categorias dos anúncios.
