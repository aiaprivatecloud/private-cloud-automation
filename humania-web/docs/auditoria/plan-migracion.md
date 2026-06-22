# Plan de migración — HUMANía Web

Este documento define el plan inicial para migrar la web actual hacia el nuevo diseño de HUMANía Web.

## Objetivo

Migrar hacia el nuevo tema y plugin sin perder contenido, datos, posicionamiento, funcionalidades importantes ni suscriptores potenciales.

## Diagnóstico inicial

La web actual contiene:

- 452 entradas publicadas
- 9 páginas publicadas
- 562 medios / adjuntos
- 421 comentarios
- 2 usuarios
- 16 plugins detectados
- dependencia fuerte de Elementor
- páginas legales gestionadas por Complianz
- formularios gestionados probablemente con WPForms
- envío de correo gestionado con WP Mail SMTP
- caché gestionada con LiteSpeed Cache

## Principio central

No se sustituye la web actual de golpe.

La migración se hará por fases:

1. Auditar.
2. Probar en staging.
3. Adaptar tema.
4. Adaptar plugin.
5. Reducir dependencias.
6. Desplegar en producción.

## Fase 1: auditoría de la web actual

Estado: iniciada.

Tareas:

- inventariar plugins
- revisar contenido exportado
- revisar páginas Elementor
- revisar categorías y etiquetas
- revisar usuarios
- revisar formularios
- revisar comentarios
- revisar medios
- revisar páginas legales
- revisar posible sistema de suscriptores

Documentos relacionados:

- plugins-actuales.md
- contenido-actual.md
- suscriptores-newsletter.md

## Fase 2: staging

Estado: pendiente.

Objetivo:

Probar el tema y el plugin de HUMANía en un entorno de prueba antes de tocar producción.

Tareas:

- confirmar entorno staging real
- hacer backup antes de instalar
- instalar `humania-theme.zip`
- instalar `humania-ai-news.zip`
- activar tema en staging
- activar plugin en staging
- comprobar errores
- comprobar páginas
- comprobar entradas
- comprobar medios
- comprobar administración
- comprobar menú del plugin
- confirmar que el plugin no captura ni publica noticias

Regla:

Producción no se toca en esta fase.

## Fase 3: adaptación del tema

Estado: pendiente.

Objetivo:

Convertir el tema HUMANía en una alternativa real al diseño actual.

Plantillas necesarias:

- front-page.php
- home.php
- single.php
- page.php
- archive.php
- category.php
- tag.php
- search.php
- 404.php
- plantilla para podcast
- plantilla para noticias IA
- plantilla para archivo temático

Prioridad inicial:

1. Entrada individual.
2. Página normal.
3. Portada.
4. Archivo de entradas.
5. Categorías.
6. Página de podcast.
7. Página de contacto.
8. Página sobre HUMANía.

## Fase 4: adaptación del contenido

Estado: pendiente.

Objetivo:

Asegurar que las entradas, páginas y medios actuales se ven correctamente con el nuevo diseño.

Tareas:

- revisar 10 entradas representativas
- revisar entradas antiguas
- revisar entradas recientes
- revisar páginas hechas con Elementor
- revisar imágenes destacadas
- revisar enlaces internos
- revisar categorías
- revisar etiquetas
- revisar extractos
- revisar SEO
- revisar metadatos
- revisar comentarios

## Fase 5: limpieza de taxonomías

Estado: pendiente.

Objetivo:

Normalizar categorías y etiquetas para la nueva marca HUMANía.

Cambios previstos:

- Humania -> HUMANía
- Podcast IA Hoy -> Podcast HUMANía
- Chat GPT -> ChatGPT o Modelos de IA
- Leyes IA -> Regulación
- empresas -> Empresas
- Ciencias/ciencias -> Ciencia
- Elon Musk/ElonMusk -> Elon Musk
- Noticias IA/noticias IA -> Noticias IA

Regla:

No modificar taxonomías en producción sin backup.

## Fase 6: reducción de plugins

Estado: pendiente.

Objetivo:

Reducir dependencias externas sin romper la web.

Orden recomendado:

1. hCaptcha, si no se usa.
2. Plantillas de inicio, si no se usa.
3. Plantillas de inicio de Kadence WP, si no se usa.
4. WP Popular Posts, si se puede sustituir.
5. Lean Player, si solo contiene demos.
6. PRO Elements, cuando no haya dependencia.
7. Ultimate Addons for Elementor, cuando no haya dependencia.
8. Elementor, solo al final.

Plugins que se mantienen al inicio:

- All in One SEO
- Complianz
- LiteSpeed Cache
- Really Simple Security
- ShortPixel
- WP Mail SMTP
- WPForms Lite
- Elementor y extensiones mientras haya dependencia

## Fase 7: plugin HUMANía AI News

Estado: esqueleto inicial creado.

Objetivo:

Desarrollar el plugin propio de noticias IA sin publicar automáticamente.

Orden de desarrollo:

1. ajustes internos
2. gestión de fuentes
3. captura manual
4. normalización
5. deduplicación
6. clasificación
7. creación de borradores
8. panel de revisión
9. logs
10. cron controlado

Regla:

No publicar automáticamente en la primera fase.

## Fase 8: newsletter futura

Estado: pendiente.

Objetivo:

Diseñar una newsletter de HUMANía con consentimiento claro.

Tareas:

- revisar formularios actuales
- identificar si existen suscriptores reales
- revisar consentimiento
- elegir sistema
- actualizar política de privacidad
- crear formulario de suscripción
- añadir baja sencilla
- probar entregabilidad

Regla:

No usar emails de comentarios como suscriptores.

## Fase 9: producción

Estado: pendiente.

Condiciones para producción:

- staging probado
- tema estable
- plugin estable
- backup completo
- plan de rollback
- páginas principales revisadas
- formularios revisados
- SEO revisado
- cookies revisadas
- usuarios revisados
- automatización desactivada o en modo borrador

## Checklist antes de producción

- backup de archivos
- backup de base de datos
- comprobar home
- comprobar entradas
- comprobar páginas
- comprobar contacto
- comprobar legal
- comprobar menú
- comprobar móvil
- comprobar accesibilidad básica
- comprobar rendimiento básico
- comprobar panel de WordPress
- comprobar que el plugin no publica nada automáticamente

## Rollback

Si falla el tema:

1. Cambiar a tema anterior.
2. Revisar logs.
3. Corregir en staging.
4. No improvisar en producción.

Si falla el plugin:

1. Desactivar plugin.
2. Revisar logs.
3. Corregir en staging.
4. No activar automatización hasta resolver.

## Decisión actual

No instalar nada en producción.

Siguiente paso:

- completar auditoría documental
- subir auditoría al repositorio
- revisar formularios de WPForms
- revisar ajustes de WP Mail SMTP
- revisar uso real de Lean Player
- preparar prueba controlada en staging

## Resumen

La migración de HUMANía Web debe conservar el contenido actual, reducir dependencia de plugins visuales y construir progresivamente una estructura propia basada en tema y plugin propios.

La prioridad es avanzar sin romper la web actual.
