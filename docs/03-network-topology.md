# 03 - Topología física y lógica final

## 1. Topología física de implantación

```text
Internet
   |
[Router ASUS RT-AX52 Pro]
   |
   | VLAN 50 / tránsito
   |
[Switch Allied Telesis AT-GS950/8]
   |-- P1  -> Mac mini en0  -> OpenWRT eth0  -> WAN
   |-- P2  -> Mac mini en8  -> OpenWRT eth1  -> Administración
   |-- P3  -> Mac mini en9  -> OpenWRT eth2  -> Servicios
   |-- P4  -> Mac mini en10 -> OpenWRT eth3  -> Automatización
   |-- P5  -> NAS TerraMaster              -> VLAN 30
   |-- P6  -> Raspberry Pi 4               -> VLAN 40
   |-- P7  -> Portátil de administración    -> VLAN 10
   |-- P8  -> Router principal / tránsito   -> VLAN 50
```

## 2. Correspondencia final entre interfaces

| Elemento | Interfaz | Puerto switch | VLAN | Función |
|---|---|---:|---:|---|
| Mac mini | `en0` | 1 | 50 | WAN / tránsito |
| Mac mini | `en8` | 2 | 10 | Administración |
| Mac mini | `en9` | 3 | 30 | Servicios |
| Mac mini | `en10` | 4 | 40 | Automatización |
| OpenWRT | `eth0` | — | 50 | WAN |
| OpenWRT | `eth1` | — | 10 | Gateway administración |
| OpenWRT | `eth2` | — | 30 | Gateway servicios |
| OpenWRT | `eth3` | — | 40 | Gateway automatización |

La interfaz `eth0` de OpenWRT actúa como enlace WAN/tránsito y obtiene su dirección mediante DHCP dentro de la red `192.168.50.0/24`, por lo que su IP concreta puede variar según la concesión del router principal.

## 3. Topología lógica

```text
VLAN 10 - Administración - 192.168.10.0/24
  Gateway: 192.168.10.1
  Elementos: portátil admin, acceso de gestión a switch y OpenWRT

VLAN 20 - Usuarios - 192.168.20.0/24
  Estado: definida para ampliación futura

VLAN 30 - Servicios - 192.168.30.0/24
  Gateway: 192.168.30.1
  Elementos: NAS

VLAN 40 - Automatización - 192.168.40.0/24
  Gateway: 192.168.40.1
  Elementos: Raspberry Pi, entorno de automatización

VLAN 50 - WAN / tránsito - 192.168.50.0/24
  Elementos: salida hacia router principal
```

## 4. Direcciones documentadas

| Equipo | Dirección |
|---|---|
| OpenWRT administración | 192.168.10.1 |
| Switch gestionable | 192.168.10.2 |
| Portátil de administración durante pruebas | 192.168.10.10 |
| Raspberry Pi | 192.168.40.10 |
| OpenWRT automatización | 192.168.40.1 |

## 5. Ruta estática aplicada en el portátil Windows

Durante la implantación se detectó que el portátil de administración no alcanzaba correctamente la red 192.168.40.0/24. La resolución consistió en añadir una ruta persistente:

```powershell
route -p add 192.168.40.0 mask 255.255.255.0 192.168.10.1
```

Esta ruta permite enviar hacia OpenWRT el tráfico destinado a la red de automatización.

## 6. Diferencia frente al diseño inicial

No existe en la solución final un enlace trunk 802.1Q único hacia OpenWRT. Ese diseño se conserva únicamente como antecedente técnico e incidencia documentada.
