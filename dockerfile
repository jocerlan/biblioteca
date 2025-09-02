# Base oficial PHP com FPM
FROM php:8.2-fpm

# Instala Nginx e outras dependências
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    && rm -rf /var/lib/apt/lists/*

# Copia arquivos do projeto
COPY app /var/www/html

# Copia a configuração do Nginx
COPY default.conf /etc/nginx/sites-available/default

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html

# Configuração do Supervisor para rodar Nginx + PHP-FPM juntos
RUN mkdir -p /var/log/supervisor
COPY --chown=root:root <<EOF /etc/supervisor/conf.d/supervisord.conf
[supervisord]
nodaemon=true

[program:php-fpm]
command=/usr/local/sbin/php-fpm -F

[program:nginx]
command=/usr/sbin/nginx -g "daemon off;"
EOF

# Expõe a porta 80
EXPOSE 8080

# Comando de inicialização
CMD ["/usr/bin/supervisord"]
