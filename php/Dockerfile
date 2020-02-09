FROM php:7.4.2-fpm

ARG WITH_XDEBUG=false

RUN if [ $WITH_XDEBUG = "true" ] ; then \
        pecl install xdebug; \
        docker-php-ext-enable xdebug; \
        echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \

    fi ;
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli

#RUN wget https://getcomposer.org/installer -O - -q \
#    | php -- --install-dir=/bin --filename=composer --quiet

WORKDIR /var/www/html
#
#echo "xdebug.overload_var_dump=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
#        echo "xdebug.var_display_max_children=256" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
#        echo "xdebug.var_display_max_depth=16" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
#        echo "xdebug.var_display_max_data=1024" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \