FROM portfolio-php

COPY ./start-container /usr/local/bin/start-container

RUN chmod ugo+x /usr/local/bin/start-container

RUN mkdir -p /srv/www/app

RUN chown -R www-data:www-data /srv/www/app \
    && chmod -R u+rw /srv/www/app \
    && chmod -R g+rw /srv/www/app \
    && chmod -R go-w /srv/www/app

RUN chown -R www-data:www-data /var/log/apache2

RUN mkdir -p /var/run/apache2 && chown -R www-data:www-data /var/run/apache2

USER www-data

WORKDIR /srv/www/app

ENTRYPOINT [ "/usr/local/bin/start-container" ]

EXPOSE 5000
