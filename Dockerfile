FROM php:8.2-cli

# Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpng-dev \
    libjpeg62-turbo-dev libfreetype6-dev \
    libicu-dev libonig-dev libxml2-dev libxslt1-dev iproute2\
    && rm -rf /var/lib/apt/lists/*

# Configure & install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        gd \
        intl \
        mysqli \
        pdo_mysql \
        mbstring \
        zip \
        xml \
        pcntl \
        xsl

# Set working directory
WORKDIR /app

# Copy project files into image (untuk pertama kali build)
COPY . .

# Source - https://stackoverflow.com/a
# Posted by ybenhssaien, modified by community. See post 'Timeline' for change history
# Retrieved 2025-11-29, License - CC BY-SA 4.0

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Expose port untuk php spark serve
EXPOSE 8080

# Default command: jalankan php spark serve
#CMD ["php", "spark", "serve", "--host=0.0.0.0", "--port=8080"]
# CMD ["bash", "-lc", "php -S 0.0.0.0:8080 -t public/ public/index.php"]
CMD ["bash", "-lc", "php spark serve --host=0.0.0.0 --port=8080 --no-debugbar"]


