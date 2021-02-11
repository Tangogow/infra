FROM ubuntu:trusty
MAINTAINER ProjetSecu
ENV WLN_STARTUP_ROOT /wln
ENV WLN_LISTEN_PORT 80
EXPOSE 80 22
WORKDIR /wln
RUN apt-get update \
    && apt-get -y install \
        curl \
        wget \
        apache2 \
        libapache2-mod-php5 \
        php5-mysql \
        php5-sqlite \
        php5-gd \
        php5-curl \
        php-pear \
        php-apc \
	php5-radius \
	openssh-server \
    && apt-get clean \
    && apt-get autoclean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && curl -sS https://getcomposer.org/installer \
        | php -- --install-dir=/usr/local/bin --filename=composer


RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf \

    && sed -i 's/variables_order.*/variables_order = "EGPCS"/g' \
        /etc/php5/apache2/php.ini
 
ADD ./start.sh /start.sh
RUN chmod 777 /start.sh && rm /var/www/html -rf && mkdir /var/www/html && chmod -R 777 /var/www/html
#SSH
RUN mkdir /root/.ssh/ && touch /root/.ssh/authorized_keys
COPY authorized_keys /root/.ssh/
RUN chmod 700 /root/.ssh/
RUN chmod 600 /root/.ssh/authorized_keys
RUN /etc/init.d/ssh restart

COPY config-files/* /var/www/html/
WORKDIR /var/www/html
ENTRYPOINT ["/bin/bash", "/start.sh"]
ONBUILD COPY . /var/www/html
