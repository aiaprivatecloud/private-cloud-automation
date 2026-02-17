# AIA Private Cloud Automation

Proyecto de Fin de Ciclo del ciclo superior ASIR (Administración de Sistemas Informáticos en Red).

## 1. Descripción

Diseño e implementación de una infraestructura de nube privada orientada a la automatización
de producción de contenido digital (podcast y revista AI IA HOY / HUMANIA), con especial
énfasis en segmentación de red, seguridad, trazabilidad y monitorización.

## 2. Objetivos técnicos

- Diseñar una arquitectura segmentada y escalable.
- Implementar buenas prácticas de seguridad (2FA, SSH, gestión centralizada de credenciales).
- Aislar entornos críticos (almacenamiento, backups, laboratorio).
- Versionar documentación y configuración.
- Garantizar reproducibilidad y trazabilidad de cambios.

## 3. Alcance

El proyecto incluye:

- Diseño lógico y físico de red.
- Modelo de seguridad y hardening.
- Infraestructura de virtualización y/o contenedores.
- Automatización mediante scripts.
- Sistema de monitorización.
- Estrategia de copias de seguridad y pruebas de restauración.

No incluye exposición directa de servicios a Internet sin capa de protección adicional.

## 4. Arquitectura general

Componentes previstos:

- NAS: almacenamiento y backups.
- Host principal 24/7: ejecución de servicios y automatización.
- Raspberry Pi: nodo de monitorización y auditoría.
- Portátil: entorno de laboratorio y pruebas.
- Router y switch gestionable: segmentación mediante VLAN (fase posterior).

## 5. Estructura del repositorio

docs/            Documentación técnica versionada  
network/         Diseño y configuración de red  
virtualization/  Arquitectura de máquinas virtuales  
docker/          Servicios en contenedores  
scripts/         Automatizaciones  
security/        Modelo de seguridad  
monitoring/      Sistema de monitorización  
backup/          Estrategia de copias y recuperación  

## 6. Seguridad implementada hasta la fecha

- Autenticación SSH con clave ed25519 para GitHub.
- 2FA habilitado en servicios críticos.
- Gestión de credenciales centralizada en Bitwarden.
- Control de cambios mediante Git.

## 7. Metodología

- Desarrollo incremental.
- Documentación paralela al despliegue.
- Uso de ramas para nuevas funcionalidades.
- Registro completo de cambios en el repositorio.

## 8. Estado actual

- Infraestructura Git configurada.
- Modelo documental definido.
- Diseño de red en fase de planificación.

