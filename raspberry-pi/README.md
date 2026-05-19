# Raspberry Pi — Integración final

## 1. Función

La Raspberry Pi se integra como nodo auxiliar de automatización, monitorización y almacenamiento de evidencias dentro de la red de automatización.

## 2. Red

| Parámetro | Valor |
|---|---|
| Red | 192.168.40.0/24 |
| IP fija | 192.168.40.10 |
| Gateway | 192.168.40.1 |
| DNS | 192.168.40.1 |
| Acceso remoto | SSH |

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

## 8. Evidencias asociadas

- `ip a`
- `ip route`
- `df -h`
- `mount -a`
- acceso SSH
- montaje persistente tras reinicio
