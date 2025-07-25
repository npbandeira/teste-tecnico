# Testes da API de Produtos (usando curl)

## 1. Listar produtos

```bash
curl -X GET http://localhost:8000/api/produtos
```

---

## 2. Visualizar produto

```bash
curl -X GET http://localhost:8000/api/produtos/1
```

---

## 3. Criar produto

```bash
curl -X POST http://localhost:8000/api/produtos \
  -H "Content-Type: application/json" \
  -d '{
    "nome": "Monitor",
    "preco": 999.99,
    "quantidade": 5
  }'
```

---

## 4. Editar produto

```bash
curl -X PUT http://localhost:8000/api/produtos/2 \
  -H "Content-Type: application/json" \
  -d '{
    "nome": "Monitor 4K",
    "preco": 1200.00
  }'
```

---

## 5. Excluir produto

```bash
curl -X DELETE http://localhost:8000/api/produtos/2
```

---

## 6. Exemplo de erro de validação

```bash
curl -X POST http://localhost:8000/api/produtos \
  -H "Content-Type: application/json" \
  -d '{
    "preco": 999.99,
    "quantidade": 5
  }'
```

> Esperado: Deve retornar erro de validação, pois o campo "nome" é obrigatório.
