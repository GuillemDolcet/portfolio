FROM php:8.2

COPY ./start-container /usr/local/bin/start-container

RUN chmod ugo+x /usr/local/bin/start-container

RUN mkdir -p /srv/www/app

RUN chown -R www-admin:www-admin /srv/www/app \
    && chmod -R u+rw /srv/www/app \
    && chmod -R g+rw /srv/www/app \
    && chmod -R go-w /srv/www/app

USER www-admin

WORKDIR /srv/www/app

ENTRYPOINT [ "/usr/local/bin/start-container" ]

EXPOSE 5000
