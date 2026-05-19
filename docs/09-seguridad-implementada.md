# 09 - Seguridad implementada

## 1. Enfoque

La seguridad del proyecto se plantea desde el inicio como parte de la arquitectura, no como añadido posterior. Los controles se distribuyen en:

- red;
- sistema;
- autenticación;
- permisos;
- trazabilidad.

## 2. Segmentación

La separación por VLAN permite aislar funciones y reduce exposición entre redes. La implantación final mantiene redes diferenciadas para:

- administración;
- servicios;
- automatización;
- tránsito WAN.

## 3. Cortafuegos UFW en la VM de automatización

Además del cortafuegos local de la máquina virtual, el control de tráfico entre segmentos se apoya en las zonas y forwardings documentados para OpenWRT. La síntesis de estas políticas puede consultarse en:

- [`infra/openwrt/02-politicas-firewall-zonas.md`](../infra/openwrt/02-politicas-firewall-zonas.md)


Se documenta una política restrictiva:

```bash
sudo ufw default deny incoming
sudo ufw default deny outgoing
```

A continuación se permite únicamente la salida necesaria:

```bash
sudo ufw allow out to any port 53 proto udp
sudo ufw allow out to any port 53 proto tcp
sudo ufw allow out to any port 80 proto tcp
sudo ufw allow out to any port 443 proto tcp
sudo ufw allow out to any port 123 proto udp
```

Estas excepciones permiten mantener operativa la VM sin abrir tráfico innecesario: DNS por UDP y TCP para resolución de nombres, HTTP/HTTPS para actualizaciones y consultas controladas, y NTP por UDP para conservar una hora coherente en tareas programadas y registros.

Y se limita SSH entrante a la red de administración:

```bash
sudo ufw allow in from 192.168.10.0/24 to any port 22 proto tcp
```

## 4. SSH endurecido

El acceso administrativo se basa en claves criptográficas y se deshabilita la autenticación por contraseña en el servidor SSH.

Medidas documentadas:

- clave Ed25519;
- copia de clave pública al servidor;
- restricción de SSH por origen;
- desactivación de `PasswordAuthentication`.

## 5. Usuario de servicio

La automatización no se ejecuta como administrador. Se usa el usuario:

```text
aia-bot
```

Esta separación facilita el principio de mínimo privilegio.

## 6. ACL sobre el sandbox

Se concede acceso administrativo controlado sobre `/opt/aia-bot` mediante ACL, sin transferir la propiedad del entorno al usuario administrador.

Ejemplo de configuración:

```bash
sudo setfacl -R -m u:administrador:rwx /opt/aia-bot
sudo setfacl -R -d -m u:administrador:rwx /opt/aia-bot
```

## 7. Fail2ban

`fail2ban` figura entre las herramientas base instaladas en la VM. Para mantener rigor documental, el repositorio no afirma por defecto que exista una política de bloqueo efectiva validada salvo que se añadan:

- jail activo;
- configuración concreta;
- logs o prueba de funcionamiento.

## 8. Seguridad del propio repositorio

No deben subirse:

- secretos;
- credenciales;
- backups reales;
- imágenes de VM;
- evidencias privadas.
