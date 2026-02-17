# 06 - Plan de Virtualización

## 1. Objetivo

Implementar un entorno de laboratorio aislado mediante máquina virtual
ejecutada en el Mini (Apple Silicon M4), destinado a la ejecución del bot
y pruebas experimentales.

## 2. Plataforma de virtualización

Host:
- Mac mini (Apple M4, 24 GB RAM)
- macOS Tahoe 26.3

Hipervisor:
- UTM (basado en QEMU)
- Virtualización nativa ARM64

Justificación:
- Compatibilidad total con Apple Silicon.
- Ligero y estable.
- Adecuado para entorno laboratorio.
- Coherente con arquitectura ARM del host.

## 3. Sistema operativo invitado

- Ubuntu Server 24.04 LTS (ARM64)

Justificación:
- Soporte a largo plazo.
- Bajo consumo de recursos.
- Entorno estándar en infraestructura real.
- Superficie de ataque reducida frente a Desktop.

## 4. Recursos asignados a la VM

- 4 vCPU
- 6-8 GB RAM
- 60 GB almacenamiento
- Red inicial: NAT (fase previa a VLAN)

## 5. Evolución de red

Fase 1:
- Red NAT controlada desde el host.

Fase 2 (cuando el switch esté operativo):
- Conexión a VLAN 40 (Laboratorio).
- Inter-VLAN routing en router.
- Aplicación de ACL específicas.

## 6. Medidas de seguridad iniciales

- Usuario no root.
- SSH habilitado.
- Firewall UFW activo.
- Actualizaciones automáticas de seguridad.
- Snapshot base tras instalación limpia.

## 7. Gestión de riesgos

En caso de fallo:
- Restauración mediante snapshot.
- Reinstalación reproducible documentada.
- No impacto sobre NAS ni backups.
