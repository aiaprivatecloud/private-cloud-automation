# Endurecimiento SSH de la VM de automatización

## Objetivo

Limitar el acceso administrativo a conexiones con clave pública y evitar autenticación por contraseña.

## Pasos documentados

1. Generar clave Ed25519 en el equipo administrador.
2. Copiar la clave pública a la VM.
3. Verificar acceso.
4. Desactivar autenticación por contraseña en `sshd_config`.
5. Reiniciar el servicio SSH.
6. Mantener el puerto 22 restringido por UFW a `192.168.10.0/24`.

## Comandos relevantes

```bash
ssh-keygen -t ed25519 -C "admin-automation"
ssh-copy-id administrador@IP_DE_LA_VM
```

```bash
sudo sed -i 's/#PasswordAuthentication yes/PasswordAuthentication no/' /etc/ssh/sshd_config
sudo sed -i 's/PasswordAuthentication yes/PasswordAuthentication no/' /etc/ssh/sshd_config
sudo systemctl restart ssh
```

## Verificación

- Acceso por clave correcto.
- Acceso por contraseña rechazado.
- SSH permitido únicamente desde la red de administración.
