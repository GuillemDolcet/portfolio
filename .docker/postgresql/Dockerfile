FROM postgres:17

ARG debian_frontend=noninteractive
ENV DEBIAN_FRONTEND=${debian_frontend}

# locale settings: language & timezone
ENV LANG=es_ES.UTF-8
ENV LANGUAGE=es_ES.UTF-8
ENV LC_ALL=es_ES.UTF-8

RUN sed -i '/es_ES.UTF-8/s/^# //g' /etc/locale.gen \
    && localedef -i es_ES -c -f UTF-8 -A /usr/share/locale/locale.alias es_ES.UTF-8 \
    && update-locale --reset LANG=es_ES.UTF-8 LANGUAGE=es_ES.UTF-8 LC_ALL=es_ES.UTF-8 \
    && dpkg-reconfigure -f noninteractive locales \
    && echo "Europe/Madrid" > /etc/timezone \
    && ln -fs /usr/share/zoneinfo/Europe/Madrid /etc/localtime \
    && dpkg-reconfigure -f noninteractive tzdata

# pgtune
COPY pgtune.settings /tmp
COPY pgtune.sh /docker-entrypoint-initdb.d

# cleanup
RUN rm -rf /tmp/* \
    && apt-get clean \
    && apt-get autoclean -y \
    && apt-get autoremove -y --purge \
    && rm -rf /var/lib/apt/lists/*
