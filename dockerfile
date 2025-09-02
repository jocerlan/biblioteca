# Usa imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala extensões do PHP (caso precise, adicione mais)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia o código do projeto
COPY app/ /var/www/html/

# Habilita o módulo de reescrita do Apache
RUN a2enmod rewrite

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta 80
EXPOSE 80

# Apache já é o processo principal, então não precisa de CMD extra
