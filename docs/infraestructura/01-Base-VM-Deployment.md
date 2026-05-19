# 01 - Despliegue base de la VM Ubuntu

## 1. Objetivo

Documentar la creación inicial de la máquina virtual de automatización sobre UTM, destinada a servir como base del sandbox del proyecto.

## 2. Hardware anfitrión

- Mac mini M4
- 24 GB de RAM
- 512 GB SSD
- macOS

## 3. Hipervisor

- UTM
- Virtualización ARM64 sobre Apple Silicon

## 4. VM Ubuntu Server

| Parámetro | Valor documentado |
|---|---|
| Sistema | Ubuntu Server 24.04 LTS ARM64 |
| CPU | 2 vCPU |
| RAM | 4 GB |
| Disco | 64 GB |
| Red inicial | Shared Network durante fase preparatoria |

## 5. Configuración realizada

- instalación limpia;
- actualización del sistema;
- instalación de OpenSSH Server;
- acceso remoto validado;
- preparación para endurecimiento y sandbox;
- transición posterior hacia la arquitectura segmentada del proyecto.

## 6. Recuperación

La VM puede recuperarse mediante snapshots o reconstruirse siguiendo los procedimientos documentados en este repositorio y en la memoria del TFG.
