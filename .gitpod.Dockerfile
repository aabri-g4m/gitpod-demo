FROM php:8.0.10-cli

# Set working directory
WORKDIR /var/www

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN /usr/local/bin/install-php-extensions sockets zip grpc protobuf
# install git
RUN apt-get update && apt-get install git -y
# Add source code files to WORKDIR
COPY . .

# Run RR server
EXPOSE 9090/tcp