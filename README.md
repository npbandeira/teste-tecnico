## Teste Técnico

[➡️ Exemplos de testes com curl para a API de Produtos](./testes_api_produtos.md)

### Pré-requisitos

- Docker instalado.

### Como rodar o projeto

1. Clone o repositório:

   ```bash
   git clone https://github.com/npbandeira/teste-tecnico.git
   cd teste-tecnico
   ```

2. Copie o arquivo de variáveis de ambiente de exemplo:

   ```bash
   cp .env.example .env
   ```

3. Dê permissão ao script (se necessário):

   ```bash
   chmod +x start.sh
   ```

4. Execute o script para subir o ambiente:

   ```bash
   ./start.sh
   ```

5. Ou, se preferir, use o Docker Compose diretamente:

   ```bash
   docker compose up
   ```

### Estrutura básica

- `Dockerfile` - configuração do container principal
- `docker-compose.yml` - orquestração dos containers
- `start.sh` - script para facilitar o uso

### Dicas

- Para parar os containers:

  ```bash
  docker compose down
  ```

- Para remover containers parados:

  ```bash
  docker rm $(docker ps -aq)
  ```

- Para limpar imagens não usadas:

  ```bash
  docker image prune
  ```

### Observações

- Configure as variáveis de ambiente se necessário.
- Edite o `start.sh` conforme sua necessidade.

Em caso de dúvidas, abra uma issue no repositório.

---

## 📦 Documentação da API de Produtos

A API permite cadastrar, listar, editar, visualizar e excluir produtos.

### Endpoints

#### 1. Listar produtos

- **GET** `/api/produtos`
- **Resposta:**

```json
[
  {
    "id": 1,
    "nome": "Notebook",
    "preco": 3500.00,
    "quantidade": 10,
    "created_at": "2024-07-24T20:00:00.000000Z",
    "updated_at": "2024-07-24T20:00:00.000000Z"
  },
  ...
]
```

#### 2. Visualizar produto

- **GET** `/api/produtos/{id}`
- **Resposta:**

```json
{
  "id": 1,
  "nome": "Notebook",
  "preco": 3500.00,
  "quantidade": 10,
  "created_at": "2024-07-24T20:00:00.000000Z",
  "updated_at": "2024-07-24T20:00:00.000000Z"
}
```

#### 3. Criar produto

- **POST** `/api/produtos`
- **Body:**

```json
{
  "nome": "Monitor",
  "preco": 999.99,
  "quantidade": 5
}
```

- **Validações:**
  - `nome`: obrigatório, string
  - `preco`: obrigatório, numérico, maior que 0
  - `quantidade`: obrigatório, inteiro, maior ou igual a 0
- **Resposta:**

```json
{
  "id": 2,
  "nome": "Monitor",
  "preco": 999.99,
  "quantidade": 5,
  "created_at": "2024-07-24T20:10:00.000000Z",
  "updated_at": "2024-07-24T20:10:00.000000Z"
}
```

#### 4. Editar produto

- **PUT/PATCH** `/api/produtos/{id}`
- **Body:** (qualquer campo pode ser enviado)

```json
{
  "nome": "Monitor 4K",
  "preco": 1200.00
}
```

- **Validações:**
  - `nome`: string
  - `preco`: numérico, maior que 0
  - `quantidade`: inteiro, maior ou igual a 0
- **Resposta:**

```json
{
  "id": 2,
  "nome": "Monitor 4K",
  "preco": 1200.00,
  "quantidade": 5,
  "created_at": "2024-07-24T20:10:00.000000Z",
  "updated_at": "2024-07-24T20:15:00.000000Z"
}
```

#### 5. Excluir produto

- **DELETE** `/api/produtos/{id}`
- **Resposta:**

```json
{
  "mensagem": "Produto excluído com sucesso."
}
```

### Observações

- Todos os retornos são em JSON.
- Utilize ferramentas como Postman, Insomnia ou curl para testar.
- Em caso de erro de validação, a resposta será:

```json
{
  "message": "The given data was invalid.",
  "errors": {
    "nome": ["O campo nome é obrigatório."],
    ...
  }
}
```
