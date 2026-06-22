# HUMANía Web

Proyecto de rediseño completo de la web del ecosistema HUMANía.

## Objetivo

Crear una web moderna, accesible, segura, ligera y automatizada para publicar contenido sobre inteligencia artificial, incluyendo episodios del podcast, noticias, artículos editoriales y archivo temático.

## Identidad

HUMANía es una marca editorial-tecnológica centrada en explicar la inteligencia artificial desde una mirada humana, rigurosa e irónica.

Frase de marca:

HUMANía, la IA en castellano.

## Stack previsto

- WordPress
- Tema propio
- Plugin propio para automatización de noticias
- Hostinger
- GitHub
- Cursor
- Staging
- Cron Jobs

## Pilares del proyecto

1. Accesibilidad.
2. Seguridad desde el diseño.
3. Rendimiento.
4. Diseño mobile-first.
5. Identidad visual coherente.
6. Automatización editorial controlada.
7. Mantenimiento sencillo.

## Estructura inicial

- docs/branding
- docs/accesibilidad
- docs/arquitectura
- docs/automatizacion
- docs/seguridad
- docs/despliegue
- assets/logo
- assets/colors
- assets/images
- theme/humania-theme
- plugins/humania-ai-news

## Documentación principal

- docs/branding/paleta-colores.md
- docs/branding/logo.md
- docs/accesibilidad/checklist-accesibilidad.md
- docs/arquitectura/estructura-web.md
- docs/automatizacion/noticias-ia.md
- docs/seguridad/README.md
- docs/seguridad/seguridad-base.md
- docs/seguridad/desarrollo-seguro-tema-plugin.md
- docs/despliegue/README.md
- docs/despliegue/entornos.md
- docs/despliegue/instalacion-tema-plugin.md
- docs/despliegue/checklist-staging-produccion.md
- docs/despliegue/backups-rollback.md
- docs/despliegue/empaquetado-validacion.md

## Tema propio

El tema propio se encuentra en:

- theme/humania-theme

Estado actual:

- esqueleto inicial creado
- estructura base WordPress
- CSS inicial mobile-first
- JavaScript mínimo
- soporte de menús
- soporte de imágenes destacadas

## Plugin propio

El plugin propio se encuentra en:

- plugins/humania-ai-news

Estado actual:

- esqueleto inicial creado
- estructura modular
- panel de administración inicial
- página futura de revisión
- sin captura real de noticias
- sin publicación automática
- sin llamadas externas

## Seguridad

La seguridad se incorpora como prioridad desde el inicio del proyecto.

HUMANía Web usará tema propio y plugin propio, por lo que el desarrollo debe seguir principios de seguridad desde el diseño:

- mínimo privilegio
- validación de entradas
- escape de salidas
- revisión humana de contenido automatizado
- secretos fuera del repositorio
- backups
- staging antes de producción
- control de permisos
- documentación de riesgos

La automatización editorial no debe publicar directamente en sus primeras fases. El sistema debe crear borradores revisables.

## Despliegue

El despliegue debe realizarse con un flujo controlado:

1. Desarrollo en rama.
2. Pull Request.
3. Merge a main.
4. Prueba en staging.
5. Backup.
6. Despliegue en producción.
7. Comprobación posterior.

No se deben probar cambios nuevos directamente en producción.

## Estado del proyecto

Fase inicial avanzada: documentación base, branding, accesibilidad, arquitectura, seguridad, despliegue, tema inicial y plugin inicial.
