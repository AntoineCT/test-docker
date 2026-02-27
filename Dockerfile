FROM antoinect/test-cours:version2

RUN mkdir -p /scripts

RUN cat > /entrypoint.sh << 'EOF'
#!/bin/bash
set -e
service apache2 start
service mysql start
sleep 2
mysql -u root -e "CREATE DATABASE IF NOT EXISTS shop;"
mysql -u root shop -e "CREATE TABLE IF NOT EXISTS product (id INT AUTO_INCREMENT PRIMARY KEY, image VARCHAR(255), name VARCHAR(255), description TEXT, price DECIMAL(10,2));"
mysql -u root shop -e "CREATE TABLE IF NOT EXISTS user (id INT AUTO_INCREMENT PRIMARY KEY, pseudo VARCHAR(255), mdp VARCHAR(255));"
tail -f /dev/null
EOF

RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

