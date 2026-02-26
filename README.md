## Pour installé et démarré le serveur

# dans un CMD à l'emplacement du dossier du repository:

```bash
docker build -t test-cours:version3 .
docker run -d -i --name server-lamp -p 8080:80 -v "%cd%:/var/www/html" test-cours:version3
```

- Site web: http://localhost:8080/
- PhpMyAdmin: http://localhost:8080/phpmyadmin/

## Pour l'arrêté

```bash
docker stop server-lamp
docker rm server-lamp
```
