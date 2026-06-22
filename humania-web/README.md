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
- docs/seguridad/README.md
- docs/seguridad/seguridad-base.md

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

## Estado del proyecto

Fase inicial: definición de estructura, branding, accesibilidad, arquitectura y seguridad base.
