# Auditoría de web actual — HUMANía Web

Este directorio recoge la auditoría previa de la web actual antes de instalar el nuevo tema y el nuevo plugin de HUMANía Web.

## Objetivo

Analizar la web existente para migrar de forma segura hacia el nuevo diseño sin perder contenido, datos, suscriptores ni funcionalidades importantes.

## Documentos

- plugins-actuales.md
- contenido-actual.md
- suscriptores-newsletter.md
- plan-migracion.md

## Principios

- No instalar nada en producción sin staging.
- No desactivar plugins sin saber qué hacen.
- No borrar datos sin backup.
- No migrar suscriptores sin revisar consentimiento.
- No cambiar el diseño público sin pruebas.
- Documentar decisiones.

## Flujo de trabajo

1. Inventariar plugins actuales.
2. Identificar funciones críticas.
3. Revisar contenido existente.
4. Revisar suscriptores.
5. Probar tema y plugin en staging.
6. Decidir qué se conserva, qué se sustituye y qué se elimina.
7. Preparar migración controlada.
