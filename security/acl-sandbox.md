# ACL del sandbox `/opt/aia-bot`

## Objetivo

Conservar a `aia-bot` como propietario operativo del entorno y permitir al usuario `administrador` revisar y mantener el sandbox sin abrir permisos globales.

## Comandos

```bash
sudo apt update
sudo apt install -y acl

sudo setfacl -R -m u:administrador:rwx /opt/aia-bot
sudo setfacl -R -d -m u:administrador:rwx /opt/aia-bot
```

## Verificación

```bash
getfacl /opt/aia-bot
getfacl /opt/aia-bot/logs
ls -ld /opt/aia-bot
ls -l /opt/aia-bot
```

## Resultado esperado

- `aia-bot` mantiene la propiedad principal.
- `administrador` dispone de acceso completo mediante ACL.
- Los nuevos ficheros heredan el permiso definido.
