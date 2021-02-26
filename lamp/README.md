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

edit /etc/phpmyadmin/config.inc.php, uncomment:
$cfg['Servers'][$i]['AllowNoPassword'] = TRUE;

```
