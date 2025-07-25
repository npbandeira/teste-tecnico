#!/bin/bash
set -e

# Builda as imagens
printf '\n==> Buildando as imagens Docker...\n'
docker compose build

# Sobe os containers
printf '\n==> Subindo os containers...\n'
docker compose up -d

# Aguarda o app estar rodando
printf '\n==> Aguardando o container app iniciar...\n'
docker compose exec app bash -c 'until [ -f artisan ]; do sleep 1; done'

# Instala dependências do composer
printf '\n==> Instalando dependências do Composer...\n'
docker compose exec app composer install

# Ajusta permissões
printf '\n==> Ajustando permissões...\n'
docker compose exec app bash -c "chmod -R 777 storage bootstrap/cache"

# Gera a chave da aplicação Laravel
printf '\n==> Gerando chave da aplicação (key:generate)...\n'
docker compose exec app php artisan key:generate

# Roda migrations e seeders (opcional)
printf '\n==> Rodando migrations e seeders...\n'
docker compose exec app php artisan migrate:fresh --seed

# Mostra status
printf '\n==> Status dos containers:\n'
docker compose ps

printf '\n==> Tudo pronto! Acesse: http://localhost:8000/api/produtos\n'
