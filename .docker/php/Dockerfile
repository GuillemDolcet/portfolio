FROM ubuntu:22.04

RUN add-apt-repository ppa:ondrej/php \
    && apt-get update \
    && apt-get install -y php8.2-cli php8.2-common php8.2-curl php8.2-gd \
        php8.2-intl php8.2-mbstring php8.2-opcache php8.2-pgsql \
        php8.2-readline php8.2-soap php8.2-xml php8.2-zip php8.2-bcmath \
        php8.2-tidy php8.2-ssh2 php8.2-memcached php8.2-redis php8.2-imagick \
    && apt-get clean \
    && apt-get autoclean \
    && apt-get autoremove -y --purge \
    && rm -fr /var/lib/apt/lists/*

# PHP settings
RUN echo -e "\
; Enable opcache + JIT\n\
opcache.enable=1\n\
opcache.enable_cli=1\n\
opcache.jit_buffer_size=128M\n\
opcache.jit=tracing" >> /etc/php/8.2/cli/conf.d/10-opcache.ini

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin/ --filename=composer

USER root
WORKDIR /
