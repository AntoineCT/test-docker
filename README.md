## Pour installé et démarré le serveur

# dans un CMD à l'emplacement du dossier du repository:

# Veillez a bien utilisé un CMD et non pas powershell, car la variable %cd% ne fonctionne pas dans powershell

```bash
docker build -t test-cours:version3 .
docker run -di --name server-lamp -p 8080:80 -v "%cd%:/var/www/html" test-cours:version3
```

- Site web: http://localhost:8080/

## Pour l'arrêté

```bash
docker stop server-lamp
docker rm -f server-lamp
```
