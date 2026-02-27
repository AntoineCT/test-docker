## Pour instalé et démarré le serveur

# Dans un CMD à l'emplacement du dossier du repository

```bash
docker build -t test-cours:version3 .
docker run -di --name server-lamp -p 8080:80 -v "%cd%:/var/www/html" test-cours:version3
```

# Si vous utilisez PowerShell

```powershell
docker build -t test-cours:version3 .
docker run -di --name server-lamp -p 8080:80 -v "$PWD\:/var/www/html" test-cours:version3
```

- Site web: http://localhost:8080/

**⚠️ IMPORTANT**: Après avoir lancé le conteneur, attendez **15-20 secondes** que MySQL démarre complètement avant d'accéder au site.

## Pour l'arrêter

### CMD

```bash
docker stop server-lamp
docker rm -f server-lamp
```

### PowerShell

```powershell
docker stop server-lamp
docker rm -f server-lamp
```
