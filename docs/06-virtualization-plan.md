# 06 - Virtualización en UTM

## 1. Objetivo

Documentar el uso de **UTM** sobre **Apple Silicon** para desplegar las máquinas virtuales que sustentan la infraestructura del proyecto.

## 2. Host de virtualización

- Equipo: Mac mini M4
- Memoria: 24 GB
- Almacenamiento interno: 512 GB SSD
- Sistema anfitrión: macOS

## 3. Máquinas virtuales principales

### 3.1 Ubuntu Server 24.04 LTS ARM64

Función:

- entorno de automatización;
- sandbox `/opt/aia-bot`;
- pruebas de seguridad y ejecución programada.

Configuración documentada en la memoria del proyecto:

- 2 vCPU;
- 4 GB RAM;
- 64 GB de almacenamiento virtual;
- red inicial compartida durante la fase preparatoria;
- posterior integración conceptual en el entorno segmentado del proyecto.

### 3.2 OpenWRT

Función:

- router interno;
- puertas de enlace de las redes activas;
- control de encaminamiento y filtrado.

Configuración final de red:

- `eth0` WAN / tránsito;
- `eth1` administración;
- `eth2` servicios;
- `eth3` automatización.

## 4. Decisión relevante sobre red

La primera arquitectura planteó un trunk 802.1Q hacia OpenWRT mediante una única interfaz física. Tras la validación práctica, se descartó como solución final y se adoptó un modelo multi-NIC.

La documentación del proyecto conserva ambas capas:

- **diseño inicial**, como antecedente;
- **implantación final**, como solución defendida.

## 5. Medidas de seguridad de la VM Ubuntu

- acceso administrativo por SSH con clave;
- contraseña deshabilitada en SSH;
- firewall UFW;
- separación de roles mediante `aia-bot`;
- ACL para administración controlada;
- entorno Python aislado.

## 6. Recuperación y trazabilidad

La virtualización permite:

- conservar snapshots;
- documentar reconstrucción;
- limitar impacto de errores;
- reproducir el entorno con una guía técnica clara.
