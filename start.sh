#!/bin/bash

# Para parar a execução se algum comando falhar
set -e

# Instala dependências JS e builda o front
npm install
npm run build

# Roda migrations com segurança
php artisan migrate:fresh --seed --force

# Inicia o Apache
apache2-foreground
