# 01 - Credenciales y Accesos

## Objetivo
Establecer un modelo seguro de autenticación y gestión de credenciales
desde el inicio del proyecto.

## Servicios configurados

- Cuenta Google dedicada al proyecto.
- Bitwarden (servidor EU) para gestión de contraseñas.
- GitHub con autenticación SSH.

## 2FA

- 2FA activado en Google.
- 2FA activado en Bitwarden.
- 2FA activado en GitHub.
- Recovery keys almacenadas offline.

## SSH GitHub

- Generación clave ed25519.
- Clave pública añadida a GitHub.
- Verificación mediante:
  ssh -T git@github.com

Resultado:
Autenticación correcta.

## SSH VM Ubuntu

- Instalación OpenSSH Server.
- Servicio habilitado y activo.
- Acceso remoto validado desde portátil.
- Snapshot base realizado tras validación.
