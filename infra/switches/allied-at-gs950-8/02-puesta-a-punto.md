# AT-GS950/8 — Configuración final e integración en la red segmentada

## 1. Objetivo

Documentar la configuración final del switch Allied Telesis AT-GS950/8 como elemento central de distribución física de la red segmentada del proyecto.

## 2. Decisión de implantación

La versión inicial del diseño contempló un puerto trunk 802.1Q hacia OpenWRT. Esa solución se descartó como implantación definitiva tras las pruebas realizadas en el entorno Apple Silicon + UTM.

La configuración final utiliza **puertos de acceso untagged** asociados a una VLAN concreta y una función física clara.

## 3. VLAN operativas

| VLAN | Función |
|---:|---|
| 10 | Administración |
| 20 | Usuarios, reservada |
| 30 | Servicios críticos |
| 40 | Automatización |
| 50 | WAN / tránsito |

La VLAN 1 se mantiene únicamente como elemento residual del propio switch.

## 4. Distribución final de puertos

| Puerto | VLAN | Uso |
|---:|---:|---|
| 1 | 50 | Mac mini `en0` / OpenWRT WAN |
| 2 | 10 | Mac mini `en8` / OpenWRT administración |
| 3 | 30 | Mac mini `en9` / OpenWRT servicios |
| 4 | 40 | Mac mini `en10` / OpenWRT automatización |
| 5 | 30 | NAS |
| 6 | 40 | Raspberry Pi |
| 7 | 10 | Portátil de administración |
| 8 | 50 | Router principal / tránsito |

## 5. Membresía de VLAN

| VLAN | Puertos untagged |
|---:|---|
| 10 | 2, 7 |
| 30 | 3, 5 |
| 40 | 4, 6 |
| 50 | 1, 8 |

## 6. PVID

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

## 7. Parámetros adicionales

- **Ingress Filtering**: habilitado.
- **Acceptable Frame Types**: untagged y priority tagged en puertos de acceso.
- **GVRP**: desactivado para evitar propagación dinámica de VLAN.
- **Configuración persistente**: guardada en memoria flash tras los cambios relevantes.

## 8. Justificación técnica

La configuración final favorece:

- estabilidad;
- diagnóstico sencillo;
- coherencia entre función física y red lógica;
- reducción de ambigüedad en la defensa del proyecto;
- compatibilidad con la arquitectura final multi-NIC.

## 9. Relación con la incidencia inicial

La documentación del trunk y router-on-a-stick debe consultarse como antecedente técnico, no como configuración vigente. La solución final se describe en este documento.
