# 05 - Modelo de alojamiento del laboratorio

## 1. Decisión adoptada

El laboratorio (VM del bot y entorno experimental)
se ejecutará en el equipo Mac Mini dedicado 24/7.

## 2. Justificación técnica

- Disponibilidad continua.
- Separación del entorno de trabajo personal.
- Aislamiento del portátil (equipo de desarrollo).
- Control centralizado de servicios.
- Menor exposición de datos personales.

## 3. Gestión de riesgos

En caso de fallo:

- El impacto se limita al entorno de laboratorio.
- No afecta al NAS ni a los backups.
- Se podrán restaurar snapshots.
- El repositorio Git mantiene trazabilidad de configuración.

## 4. Medidas adicionales previstas

- Snapshots periódicos de la VM.
- Monitorización básica (uso CPU/RAM/red).
- Logs centralizados en nodo de auditoría (Raspberry Pi).
- Revisión periódica de actualizaciones de seguridad.
