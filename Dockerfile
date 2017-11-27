FROM ubuntu:16.04

# UPDATE
RUN apt-get update

# INSTALL NGINX PHP-FPM
RUN apt-get install -y nginx php-fpm

# INSTALL OTHERS
RUN apt-get install -y php7.0-mcrypt php7.0-mbstring php7.0-gd php7.0-curl php7.0-dom php7.0-zip git

# INSTALL DATABASE
RUN apt-get install -y php7.0-pgsql

# INSTALL NODE
RUN apt-get install -y curl
RUN curl -sL https://deb.nodesource.com/setup_6.x -o nodesource_setup.sh
RUN sh ./nodesource_setup.sh 
RUN apt-get install -y nodejs
RUN rm nodesource_setup.sh

# INSTALL CAPISTRANO
RUN apt-get install -y rubygems
RUN gem install capistrano -v 2.12.0
RUN gem install capistrano_colors

# CONFIG PHP.INI
RUN echo "cgi.fix_pathinfo=0" >> /etc/php/7.0/fpm/php.ini && \
    echo "display_errors = On" >> /etc/php/7.0/fpm/php.ini && \
    echo "date.timezone = \"America/Sao_Paulo\"" >> /etc/php/7.0/fpm/php.ini && \
    echo "date.timezone = \"America/Sao_Paulo\"" >> /etc/php/7.0/cli/php.ini

# LOGS
RUN ln -sf /dev/stdout /var/log/nginx/access.log && ln -sf /dev/stderr /var/log/nginx/error.log

# RELOAD CONFIGS
RUN service php7.0-fpm start

# UP RUNNING
CMD nginx && \
    service php7.0-fpm restart && \
    tail -f /dev/null
