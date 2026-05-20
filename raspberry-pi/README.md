# Raspberry Pi — Integración final

## 1. Función

La Raspberry Pi se integra como nodo auxiliar de automatización, monitorización y almacenamiento de evidencias dentro de la red de automatización.

En la fase final del proyecto, este papel de monitorización se concreta especialmente en la prueba del SAI mediante NUT y en la ejecución del script `monitoring/sai/monitor_sai_equipos.sh`, encargado de registrar estados, eventos y disponibilidad de nodos durante la validación de continuidad eléctrica.

## 2. Red

| Parámetro | Valor |
|---|---|
| Red | 192.168.40.0/24 |
| IP fija | 192.168.40.10 |
| Gateway | 192.168.40.1 |
| DNS | 192.168.40.1 |
| Acceso remoto | SSH |

## 2.1 Usuario de administración

La Raspberry Pi utiliza el usuario local `rpi-aia` para las tareas de administración y acceso remoto por SSH.

Este usuario pertenece exclusivamente al nodo Raspberry Pi y no debe confundirse con `aia-bot`, que es el usuario de servicio creado en la máquina virtual de automatización para ejecutar procesos controlados dentro del sandbox `/opt/aia-bot`.

La separación entre ambos responde a que cumplen funciones distintas:

- `rpi-aia`: administración del nodo Raspberry Pi y gestión de monitorización, almacenamiento externo y pruebas del SAI.
- `aia-bot`: ejecución de automatizaciones básicas dentro de la VM Ubuntu Server.

## 3. Configuración IP con NetworkManager

```bash
sudo nmcli connection modify "Wired connection 1" ipv4.addresses 192.168.40.10/24
sudo nmcli connection modify "Wired connection 1" ipv4.gateway 192.168.40.1
sudo nmcli connection modify "Wired connection 1" ipv4.dns 192.168.40.1
sudo nmcli connection modify "Wired connection 1" ipv4.method manual
sudo nmcli connection up "Wired connection 1"
```

## 4. Acceso SSH

```bash
ssh rpi-aia@192.168.40.10
```

## 5. Ruta estática necesaria desde el portátil Windows

```powershell
route -p add 192.168.40.0 mask 255.255.255.0 192.168.10.1
```

## 6. SSD externo

La unidad externa queda:

- formateada en `ext4`;
- montada en `/mnt/externo`;
- configurada mediante UUID en `/etc/fstab`;
- validada tras reinicio.

## 7. Estructura inicial de directorios

```text
/mnt/externo/
├── logs/
├── monitorizacion/
├── scripts/
├── backups/
└── datos/
```

## 8. Comprobaciones realizadas y evidencias públicas

Durante la puesta en servicio de la Raspberry Pi se verificaron los siguientes puntos:

- configuración de red e identificación de la interfaz mediante `ip a`;
- tabla de rutas y puerta de enlace mediante `ip route`;
- acceso remoto por SSH desde el portátil de administración;
- montaje del SSD externo con `df -h`;
- validación del montaje declarado en `/etc/fstab` mediante `mount -a`;
- persistencia del montaje tras reinicio.

Estas comprobaciones se desarrollan en la memoria final del proyecto y en la documentación técnica asociada a la integración de la Raspberry Pi.

Como evidencias públicas seleccionadas incorporadas al repositorio se incluyen:

- [`12-ssd-externo-montado-mnt-externo.png`](../docs/evidencias/capturas/raspberry/12-ssd-externo-montado-mnt-externo.png) — SSD externo montado en `/mnt/externo`.
- [`21-raspberry-ip-rutas-ssh-activo.png`](../docs/evidencias/capturas/raspberry/21-raspberry-ip-rutas-ssh-activo.png) — IP fija `192.168.40.10/24`, ruta por defecto vía `192.168.40.1` y servicio SSH activo.

El índice completo de evidencias puede consultarse en [`docs/evidencias/README.md`](../docs/evidencias/README.md). La incidencia de integración y la ruta estática necesaria desde el portátil de administración se recogen en [`docs/08-incidencias-tecnicas.md`](../docs/08-incidencias-tecnicas.md).
