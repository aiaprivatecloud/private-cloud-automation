# Despliegue — HUMANía Web

Este directorio recoge la documentación relacionada con entornos, instalación, staging, producción, backups y recuperación de HUMANía Web.

## Objetivo

Definir un flujo seguro y ordenado para llevar el tema propio y el plugin propio desde el repositorio hasta WordPress sin romper producción.

## Documentos

- entornos.md
- instalacion-tema-plugin.md
- checklist-staging-produccion.md
- backups-rollback.md
- empaquetado-validacion.md

## Principios

- No trabajar directamente en producción.
- Probar primero en staging.
- Hacer backup antes de cambios importantes.
- Documentar cada despliegue relevante.
- Mantener tema y plugin bajo control de versiones.
- Evitar cambios manuales no documentados.
- Poder volver atrás si algo falla.

## Flujo recomendado

1. Desarrollo en rama.
2. Pull Request.
3. Merge a main.
4. Preparación del paquete o subida controlada.
5. Instalación en staging.
6. Pruebas.
7. Backup de producción.
8. Despliegue en producción.
9. Comprobación posterior.
10. Registro de incidencias si aparecen.

## Nota

El objetivo no es desplegar rápido.

El objetivo es desplegar sin convertir la web en una escena de crimen digital.
