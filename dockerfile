# Usa imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala extensões do PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Configura Apache para rodar na porta 8080
RUN sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf \
    && sed -i 's/80/8080/g' /etc/apache2/ports.conf

# Copia o código do projeto
COPY app/ /var/www/html/

# Habilita mod_rewrite
RUN a2enmod rewrite

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta 8080
EXPOSE 8080
