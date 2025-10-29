FROM php:8.2-apache

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2ensite 000-default.conf && a2dissite 000-default.conf && a2ensite 000-default.conf

COPY . /var/www/html/

EXPOSE 80

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

CMD ["apache2-foreground"]