# OpenWRT — Configuración final de interfaces

## 1. Función

OpenWRT actúa como router interno de la infraestructura segmentada y como puerta de enlace de los segmentos activos.

## 2. Interfaces

| Interfaz | Función | Red |
|---|---|---|
| `eth0` | WAN / tránsito | 192.168.50.0/24 |
| `eth1` | Administración | 192.168.10.0/24 |
| `eth2` | Servicios | 192.168.30.0/24 |
| `eth3` | Automatización | 192.168.40.0/24 |

## 3. Direcciones documentadas

| Interfaz | Dirección |
|---|---|
| `eth1` | 192.168.10.1/24 |
| `eth2` | 192.168.30.1/24 |
| `eth3` | 192.168.40.1/24 |

`eth0` obtiene dirección dentro de la red de tránsito según la configuración de salida del entorno.

## 4. Papel en la arquitectura

- Enruta entre subredes cuando está permitido.
- Centraliza el control lógico del laboratorio.
- Mantiene la salida hacia Internet mediante la red de tránsito.
- Sustituye al diseño router-on-a-stick por un modelo más estable en el entorno virtualizado disponible.

## 5. Validaciones asociadas

- presencia de interfaces;
- estado operativo;
- rutas internas;
- conectividad hacia Internet;
- acceso a Raspberry Pi desde la red de administración.
