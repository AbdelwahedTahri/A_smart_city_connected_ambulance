FROM ubuntu:latest

# Install apache and php-mod
RUN ln -fs /usr/share/zoneinfo/Africa/Casablanca /etc/localtime \
&& apt update -yq \
&& DEBIAN_FRONTEND=noninteractive apt install apache2 libapache2-mod-php -yq \
&& apt-get clean -y

# Add app's files
ADD App/ /var/www/html/

# Add Virtual Hosts config files
ADD sites-config/ /etc/apache2/sites-available

# Add direct links + conf apache + enable mod + enable sites
RUN cd /var/www/html/smartCity \
&& ln data/authorizedIdentifiers.json EspAPI/data/ \
&& ln data/cityParameterValues.json EspAPI/data/ \
&& chmod 666 EspAPI/data/* \
&& ln data/cityParameterValues.json adminInterface/data/ \
&& chmod 666 adminInterface/data/* \
&& cd /etc/apache2/ \
&& echo 'Listen 5000' >> ports.conf \
&& htpasswd -bc /etc/apache2/passwords user 0000 \
&& a2enmod rewrite \
&& a2dissite 000-default.conf \
&& a2ensite 01-sm-city-esp.conf \
&& a2ensite 02-sm-city-admin.conf 

# Persistant Volume
VOLUME /var/www/html/smartCity/

# Exposed ports
EXPOSE 80
EXPOSE 5000

# Start command
CMD ["apache2ctl", "-D", "FOREGROUND"]