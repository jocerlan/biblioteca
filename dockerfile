# Usa uma imagem oficial do PHP com Apache
FROM php:8.2-apache

# Habilita módulos do Apache e extensões PHP necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# Copia os arquivos da aplicação para o diretório padrão do Apache
COPY . /var/www/html/

# Define permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expõe a porta padrão do Apache
EXPOSE 80

# Inicia o Apache
CMD ["apache2-foreground"]
