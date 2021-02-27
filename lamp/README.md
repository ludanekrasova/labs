# Таблицы

* people

id|name|surname
--|--|--
1|Амадей|Моцарт

* subjects

id | subject 
--|--
1 | Музыка


* grades

id | person_id | subject_id | grade | date
---|-----------|------------|-------|-----
1  | 1         |          1 | 5     | 1791-12-05


* Пример SQL запроса:

```sql
SELECT name, surname, subject, grade, date from people
JOIN grades ON grades.person_id = people.id
JOIN subjects ON grades.subject_id = subjects.id
```

name | surname | subject | grade | date
-----|---------|---------|-------|-----
Амадей| Моцарт | Музыка  | 5     | 1791-12-05

Запросы могут быть сложнее, чтобы собирать данные по всем предметам или оценкам за определенный период или выводить среднюю оценку.

# Windows

Достаточно скачать один win64 installer Postgres, там есть все, включая pgadmin и HTTP сервер (PEMHTTpPD aka apache2 EDB).

* https://www.postgresql.org/download/windows/

## apache

Файлы хостятся в `C:\Program Files (x86)\edb\pem\httpd\apache\www`.

* http://localhost:8080/

## pgadmin4

(запускается через ярлык в программах):

* http://127.0.0.1:64378


# Linux

## Установка apache2

```
sudo apt install apache2
```

## Установка PHP

```
sudo apt install php php-pgsql
sudo service apache2 restart
```

* http://localhost (скопировать index.php в /var/www/html)

## Установка Postgres
```
sudo apt install postgresql postgresql-contrib
```

## Установка pgadmin4

```
sudo curl https://www.pgadmin.org/static/packages_pgadmin_org.pub | sudo apt-key add
sudo sh -c 'echo "deb https://ftp.postgresql.org/pub/pgadmin/pgadmin4/apt/$(lsb_release -cs) pgadmin4 main" > /etc/apt/sources.list.d/pgadmin4.list && apt update'
sudo apt install pgadmin4-web
sudo /usr/pgadmin4/bin/setup-web.sh
```

* http://localhost/pgadmin4 (login/password: postgres/postgres)


## Ошибки

Peer authentication failed for user "postgres":

* отредактировать /etc/postgresql/13/main/pg_hba.conf, заменить первый "peer" на "trust".

```
sudo service postgresql stop
sudo service postgresql start
psql -U postgres
ALTER USER postgres WITH PASSWORD 'postgres';
exit;
```

* отредактировать  /etc/postgresql/13/main/pg_hba.conf, заменить "trust" на "md5".

```
sudo service postgresql restart
```

## Импорт базы в Postgres
```
psql -U postgres postgres < dump.sql
```

## Экспорт базы из Postgres
```
pg_dump -U postgres postgres > dump.sql
```

## Установка Midnight Commander (опционально)
```
sudo apt install mc
sudo mc
```

## Установка MySQL (опционально)
```
sudo apt install mysql-server
sudo mysql -u root

USE mysql;
UPDATE user SET plugin='mysql_native_password' WHERE User='root';
FLUSH PRIVILEGES;
exit;

sudo service mysql restart
sudo apt install phpmyadmin
sudo service apache2 restart

(edit /etc/phpmyadmin/config.inc.php, uncomment $cfg['Servers'][$i]['AllowNoPassword'] = TRUE;)

login to phpmyadmin as: http://localhost/phpmyadmin
login: root
password: (none)
create database test, run test.sql
```

