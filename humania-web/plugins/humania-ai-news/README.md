# HUMANía AI News

Plugin propio de HUMANía Web para automatizacion controlada de noticias de inteligencia artificial.

## Objetivo

Preparar un sistema que permita capturar fuentes, filtrar noticias, eliminar duplicados, resumir contenido y crear borradores revisables en WordPress.

## Estado actual

Esqueleto inicial del plugin.

En esta fase:

- no captura noticias
- no llama APIs externas
- no resume contenido
- no crea borradores reales
- no publica contenido

## Principios

- Seguridad desde el diseño.
- No publicar automaticamente en fase inicial.
- Crear borradores revisables.
- Validar entradas.
- Escapar salidas.
- Comprobar permisos.
- Usar nonces en acciones futuras.
- No guardar secretos en el repositorio.
- Registrar errores sin exponer informacion sensible.

## Estructura

- humania-ai-news.php
- includes/security.php
- includes/logger.php
- includes/fetch-sources.php
- includes/normalize-item.php
- includes/deduplicate.php
- includes/classify.php
- includes/summarize.php
- includes/create-draft.php
- admin/settings-page.php
- admin/review-page.php
- assets/css/admin.css
- assets/js/admin.js
