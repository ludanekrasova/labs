# LAMP

```bash

sudo apt install apache2 mysql-server

sudo mysql -u root

USE mysql;
UPDATE user SET plugin='mysql_native_password' WHERE User='root';
FLUSH PRIVILEGES;
exit;

sudo service mysql restart
sudo apt install phpmyadmin
sudo service apache2 restart

install midnight commander:
sudp apt install mc

edit /etc/phpmyadmin/config.inc.php, uncomment:
$cfg['Servers'][$i]['AllowNoPassword'] = TRUE;

add index.php to /var/www/html

login to phpmyadmin as: http://localhost/phpmyadmin
login: root
password: (none)
create database test, run test.sql


postgresql:

sudo apt install postgresql postgresql-contrib
sudo curl https://www.pgadmin.org/static/packages_pgadmin_org.pub | sudo apt-key add
sudo sh -c 'echo "deb https://ftp.postgresql.org/pub/pgadmin/pgadmin4/apt/$(lsb_release -cs) pgadmin4 main" > /etc/apt/sources.list.d/pgadmin4.list && apt update'
sudo apt install pgadmin4-web
sudo /usr/pgadmin4/bin/setup-web.sh


then open http://localhost/pgadmin4
login/password: postgres/postgres 

Peer authentication failed for user "postgres":
edit /etc/postgresql/13/main/pg_hba.conf, replace first "peer" to "trust".
sudo service postgresql stop
sudo service postgresql start
psql -U postgres

ALTER USER postgres WITH PASSWORD 'postgres';
exit;

edit /etc/postgresql/13/main/pg_hba.conf, replace "trust" to "md5".
sudo service postgresql restart

sudo apt install php-pgsql
sudo service apache2 restart
```
