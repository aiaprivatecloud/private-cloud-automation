# 01 - Credenciales y accesos

## 1. Objetivo

Establecer un modelo seguro de autenticación y control de accesos para el proyecto, evitando incorporar secretos reales al repositorio.

## 2. Servicios y prácticas documentadas

- cuenta de proyecto;
- gestor de contraseñas;
- GitHub con autenticación SSH;
- 2FA en servicios críticos;
- claves de recuperación conservadas fuera del repositorio.

## 3. Acceso GitHub por SSH

- generación de clave Ed25519;
- alta de clave pública;
- verificación mediante:

```bash
ssh -T git@github.com
```

## 4. Acceso SSH a la VM

- servidor OpenSSH instalado;
- acceso por clave pública;
- autenticación por contraseña deshabilitada;
- restricción de entrada mediante UFW desde la VLAN 10.

## 5. Principio de publicación segura

El repositorio no debe contener:

- contraseñas;
- tokens;
- claves privadas;
- datos reales de recuperación;
- exportaciones sensibles sin anonimizar.
