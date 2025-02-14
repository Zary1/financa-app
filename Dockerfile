# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala extensões necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Copia os arquivos do Laravel para dentro do container
COPY . /var/www/html

# Define o diretório de trabalho
WORKDIR /var/www/html

# Dá permissão à pasta de cache e logs
RUN chmod -R 777 storage bootstrap/cache

# Expor a porta 80 para acessar o app
EXPOSE 80