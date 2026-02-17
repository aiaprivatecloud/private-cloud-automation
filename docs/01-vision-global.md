# 01 - Visión global del proyecto

## 1. Propósito
Implementar una infraestructura de nube privada orientada a la automatización del podcast y revista (AI IA HOY / HUMANIA),
con énfasis en seguridad, segmentación de red, monitorización y automatización reproducible.

## 2. Principios de diseño
- Seguridad por defecto: mínimos privilegios, 2FA, secretos centralizados.
- Segmentación: separar servicios críticos (NAS/backup) de entornos de ejecución (VM/bot).
- Trazabilidad: todo cambio se registra en GitHub (código y documentación).
- Reproducibilidad: configuración documentada y scripts versionados.

## 3. Componentes y roles (alto nivel)
- NAS: almacenamiento y copias de seguridad (objetivo: fuera del alcance del bot).
- Mini / equipo principal: ejecución 24/7 (servicios, contenedores y/o VM del bot).
- Raspberry Pi: nodo de borde/auditoría (logs, monitorización, “kill switch” si aplica).
- Portátil: nodo de trabajo y pruebas (virtualización pesada, pruebas de modelos, laboratorio).
- Router/Switch: segmentación (VLANs cuando llegue el switch), reglas de firewall.

## 4. Entornos
- Producción doméstica (controlada): servicios estables (Nextcloud/almacenamiento/backup).
- Laboratorio: pruebas de red, VM del bot, hardening, automatizaciones.
- Acceso remoto: preferible vía VPN (no exposición directa), con 2FA.

## 5. Seguridad mínima aplicable desde el inicio
- 2FA en Google/Bitwarden/GitHub.
- Credenciales y claves API almacenadas en Bitwarden (colecciones).
- Claves SSH para GitHub (sin contraseñas en terminal).
- Documentación de cambios y configuración en el repositorio.

## 6. Entregables (evidencias)
- Documentación técnica versionada (/docs).
- Scripts y automatizaciones (/scripts).
- Diseño de red y segmentación (/network).
- Modelo de seguridad y hardening (/security).
- Plan de backups y pruebas de restauración (/backup).
- Monitorización y métricas (/monitoring).
