FROM ubuntu:24.04

ARG uid=9999
ARG gid=9999

ARG debian_frontend=noninteractive
ENV DEBIAN_FRONTEND=noninteractive

RUN groupadd -o -g ${gid} www-data 2>/dev/null || true

# Si el usuario www-data no existe, lo crea con el UID y GID correctos
RUN if ! getent passwd www-data >/dev/null; then \
        useradd -o -u ${uid} -g www-data -m -s /bin/bash www-data; \
    else \
        usermod -o -u ${uid} www-data; \
        groupmod -o -g ${gid} www-data; \
    fi

RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y ca-certificates software-properties-common apt-utils \
        locales tzdata

RUN localedef -i es_ES -c -f UTF-8 -A /usr/share/locale/locale.alias es_ES.UTF-8

ENV LANG=es_ES.utf8

RUN echo "Europe/Madrid" > /etc/timezone \
    && ln -fs /usr/share/zoneinfo/Europe/Madrid /etc/localtime \
    && dpkg-reconfigure -f noninteractive tzdata \
    && locale-gen "es_ES.UTF-8" \
    && update-locale --reset LANG=es_ES.UTF-8 \
    && dpkg-reconfigure -f noninteractive locales

RUN apt-get install -y curl git-core zip unzip postgresql-client

RUN apt-get install -y fontconfig libfreetype6 libjpeg-turbo8 libpng16-16 libxrender1 xfonts-base xfonts-75dpi \
    && curl -L https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6.1-2/wkhtmltox_0.12.6.1-2.jammy_amd64.deb --output /tmp/wkhtmltox.deb \
    && dpkg -i /tmp/wkhtmltox.deb \
    && rm -f /tmp/wkhtmltox.deb

RUN apt-get update \
    && apt-get clean \
    && apt-get autoclean \
    && apt-get autoremove -y --purge
