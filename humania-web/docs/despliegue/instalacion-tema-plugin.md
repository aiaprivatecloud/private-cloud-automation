# Instalación de tema y plugin — HUMANía Web

Este documento define el procedimiento inicial para instalar el tema propio y el plugin propio en WordPress.

## Elementos a instalar

Tema:

- humania-theme

Plugin:

- humania-ai-news

## Rutas esperadas en WordPress

Tema:

- wp-content/themes/humania-theme/

Plugin:

- wp-content/plugins/humania-ai-news/

## Regla principal

Primero staging. Después producción.

Nada de probar directamente en producción, porque la valentía mal entendida en informática suele acabar en restaurar backups a las dos de la mañana.

## Instalación del tema

Pasos previstos:

1. Preparar la carpeta `humania-theme`.
2. Comprobar que contiene `style.css`.
3. Comprobar que contiene `index.php`.
4. Subir la carpeta a `wp-content/themes/`.
5. Entrar en WordPress.
6. Ir a Apariencia.
7. Comprobar que el tema aparece.
8. Activarlo primero en staging.
9. Revisar portada, entradas, cabecera y footer.
10. Revisar errores visibles.

## Instalación del plugin

Pasos previstos:

1. Preparar la carpeta `humania-ai-news`.
2. Comprobar que contiene `humania-ai-news.php`.
3. Subir la carpeta a `wp-content/plugins/`.
4. Entrar en WordPress.
5. Ir a Plugins.
6. Comprobar que el plugin aparece.
7. Activarlo primero en staging.
8. Verificar que aparece el menú HUMANía IA.
9. Verificar que no hay errores visibles.
10. No activar automatización real hasta fases posteriores.

## Comprobaciones mínimas del tema

- carga la home
- carga una entrada
- carga una página
- se ve la cabecera
- se ve el footer
- funciona el enlace de saltar al contenido
- los enlaces tienen foco visible
- no hay errores PHP visibles
- el diseño es usable en móvil

## Comprobaciones mínimas del plugin

- el plugin se activa
- no genera error fatal
- aparece en el menú de administración
- la pantalla de ajustes carga
- la pantalla de revisión carga
- no captura noticias todavía
- no publica contenido
- no llama APIs externas
- no guarda secretos

## Producción

Antes de instalar en producción:

- hacer backup de archivos
- hacer backup de base de datos
- comprobar que staging funciona
- documentar versión
- preparar vuelta atrás

## Pendiente

- definir método final de empaquetado ZIP
- definir método final de subida por Hostinger
- definir si se usará SFTP
- definir proceso de actualización del tema
- definir proceso de actualización del plugin
