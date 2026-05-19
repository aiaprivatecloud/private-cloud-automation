# Mapa final de puertos del switch

## 1. Distribución de puertos

| Puerto | VLAN | Tipo | Destino |
|---:|---:|---|---|
| 1 | 50 | Access / untagged | Mac mini `en0` / OpenWRT WAN |
| 2 | 10 | Access / untagged | Mac mini `en8` / OpenWRT administración |
| 3 | 30 | Access / untagged | Mac mini `en9` / OpenWRT servicios |
| 4 | 40 | Access / untagged | Mac mini `en10` / OpenWRT automatización |
| 5 | 30 | Access / untagged | NAS |
| 6 | 40 | Access / untagged | Raspberry Pi |
| 7 | 10 | Access / untagged | Portátil de administración |
| 8 | 50 | Access / untagged | Router principal / tránsito |

## 2. PVID

| Puerto | PVID |
|---:|---:|
| 1 | 50 |
| 2 | 10 |
| 3 | 30 |
| 4 | 40 |
| 5 | 30 |
| 6 | 40 |
| 7 | 10 |
| 8 | 50 |

## 3. Parámetros complementarios

- GVRP: desactivado.
- Input filtering: habilitado.
- Tramas aceptadas en puertos de acceso: untagged y priority tagged.
- VLAN 1: residual del switch, no empleada como red operativa del proyecto.
