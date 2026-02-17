# 01 - Despliegue Base VM

## Objetivo
Desplegar entorno base aislado para automatización del proyecto AIA Private Cloud.

## Hardware anfitrión
Mac Mini M4 (2024)
24GB RAM
512GB SSD
macOS Tahoe 26.3

## Hipervisor
UTM (virtualización ARM64)

## VM creada
Sistema: Ubuntu Server 24.04 LTS ARM64
CPU: 4 núcleos
RAM: 4GB
Disco: 64GB
Red: Modo puente (virtio-net)

## Configuración realizada
- Instalación limpia del sistema.
- Actualización inicial del sistema.
- Instalación y activación de OpenSSH Server.
- Verificación de servicio SSH activo.
- Conexión remota validada desde portátil.

## Snapshot
Se crea snapshot manual duplicando el paquete Linux.utm.
Ubicación:
VM-Snapshots/AIA-PrivateCloud/Linux-BASE-PostInstall.utm
