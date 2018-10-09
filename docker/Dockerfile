#FROM registry.cn-hangzhou.aliyuncs.com/wanjia/phprunner
FROM wjdocker.lab/wanjia2/phprunner:7.1

#RUN  pecl install redis && \
#     docker-php-ext-enable redis

COPY mongodb-1.2.5.tgz /usr/local/src/
RUN  apt-get install -y libpcre3-dev &&\
     cd /usr/local/src/ && \
     tar zxvfp mongodb-1.2.5.tgz && \
     cd mongodb-1.2.5 && \
     phpize && ./configure && make -j8 && make install && \
     docker-php-ext-enable mongodb

COPY rabbitmq-c-master.zip /usr/local/src/
RUN  apt-get install -y cmake && \
     cd /usr/local/src/ && \
     unzip rabbitmq-c-master.zip && \
     cd rabbitmq-c-master && \
     mkdir build && cd build && cmake -DCMAKE_INSTALL_PREFIX=/usr -DCMAKE_INSTALL_LIBDIR=lib .. && cmake --build . --target install

COPY amqp-1.7.1.tgz /usr/local/src/
RUN  cd /usr/local/src/ && \
     tar zxvfp amqp-1.7.1.tgz && \
     cd amqp-1.7.1 && \
     phpize && ./configure && make -j8 && make install && \
     docker-php-ext-enable amqp


RUN  docker-php-ext-install pcntl sockets && \
     apt-get install -y libevent-dev && \
     echo '\n' | pecl install event && \
     docker-php-ext-enable event && \
     mv /usr/local/etc/php/conf.d/docker-php-ext-event.ini /usr/local/etc/php/conf.d/docker-php-ext-zz_event.ini

RUN  docker-php-ext-install soap
RUN  docker-php-ext-install bcmath


RUN  pecl install msgpack && \
     docker-php-ext-enable msgpack

COPY yar-2.0.4.tgz /usr/local/src/phpext/
RUN  cd /usr/local/src/phpext && \
     tar zxvfp yar-2.0.4.tgz && \
     cd /usr/local/src/phpext/yar-2.0.4 && \
     phpize && \
     ./configure --enable-msgpack && \
     make install && \
     docker-php-ext-enable yar

RUN  pecl install xdebug


COPY app_check /usr/local/bin/
COPY app_init /usr/local/bin/
COPY zz-docker.conf /usr/local/etc/php-fpm.d/
COPY crontab /var/spool/cron/crontabs/root
RUN  chown -R root:crontab /var/spool/cron/crontabs/root \
     && chmod 600 /var/spool/cron/crontabs/root
RUN  touch /var/log/cron.log

WORKDIR /var/www