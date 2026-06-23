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
- 3 formularios WPForms detectados
- dependencia fuerte de Elementor
- páginas legales gestionadas por Complianz
- formularios gestionados con WPForms
- envío de correo gestionado con WP Mail SMTP
- caché gestionada con LiteSpeed Cache
- optimización de imágenes con ShortPixel

## Diagnóstico añadido de formularios, correo y legal

### Formularios

Se detectan formularios en WPForms:

- Hestia
- Newsletter Signup Form
- AI Aprendí contacta

El formulario `Newsletter Signup Form` no confirma por sí solo la existencia de una newsletter real.

No se detecta sistema claro de:

- lista de suscriptores
- campañas
- bajas
- consentimiento específico de newsletter
- doble confirmación

### Correo

WP Mail SMTP está configurado con:

- Google / Gmail
- OAuth conectado
- correo remitente actual: eiaihoy@gmail.com
- nombre remitente actual: AI Aprendí
- sin conexión de respaldo

Debe revisarse durante la migración de marca para cambiar la identidad de correo a HUMANía.

### Legal y cookies

Complianz está activo, pero incompleto.

Estado detectado:

- gestión de consentimientos activa
- progreso aproximado: 25%
- 6 tareas abiertas
- términos y condiciones validados
- aviso sobre custom post types no cubiertos por el escaneo gratuito

Debe completarse antes de producción.

### Lean Player

Lean Player está activo, pero la revisión indica que los elementos exportados parecen demos.

Decisión:

- revisar en staging
- comprobar uso real en páginas públicas
- eliminar si no se usa

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

Estado: avanzada.

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
- revisar correo saliente
- revisar reproductores Lean Player

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
- comprobar formularios
- comprobar envío de correo
- comprobar cookies y banner legal
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
- plantilla para contacto
- plantilla para página legal simple

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
- revisar formularios embebidos
- revisar shortcodes

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
4. Lean Player, si solo contiene demos.
5. WP Popular Posts, si se puede sustituir.
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

Diagnóstico actual:

- existe un formulario llamado `Newsletter Signup Form`
- no se detecta newsletter real
- no se detecta lista clara de suscriptores
- no se detecta sistema de campañas
- WP Mail SMTP no es una newsletter
- Gmail puede servir para bajo volumen, pero no para envío masivo

Tareas:

- revisar formularios actuales
- identificar si existen suscriptores reales
- revisar consentimiento
- elegir sistema
- actualizar política de privacidad
- crear formulario de suscripción
- añadir baja sencilla
- probar entregabilidad
- cambiar remitente de AI Aprendí a HUMANía

Regla:

No usar emails de comentarios como suscriptores.

## Fase 9: legal y privacidad

Estado: pendiente.

Objetivo:

Completar Complianz y asegurar que la web nueva conserva cumplimiento legal básico.

Tareas:

- completar asistente de Complianz
- revisar tareas abiertas
- revisar banner de cookies
- revisar política de cookies
- revisar términos y condiciones
- revisar si falta política de privacidad
- revisar custom post types futuros
- adaptar textos a HUMANía

## Fase 10: producción

Estado: pendiente.

Condiciones para producción:

- staging probado
- tema estable
- plugin estable
- backup completo
- plan de rollback
- páginas principales revisadas
- formularios revisados
- correo saliente probado
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
- comprobar formulario newsletter si existe
- comprobar legal
- comprobar cookies
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

Si falla un formulario:

1. Volver al formulario anterior.
2. Revisar WPForms.
3. Revisar WP Mail SMTP.
4. Probar envío.
5. No tocar producción sin prueba.

## Decisión actual

No instalar nada en producción.

Siguiente paso:

- completar auditoría documental
- subir auditoría al repositorio
- revisar ubicación pública de formularios
- revisar configuración completa de WPForms
- revisar uso real de Lean Player en staging
- completar Complianz
- preparar prueba controlada en staging

## Resumen

La migración de HUMANía Web debe conservar el contenido actual, reducir dependencia de plugins visuales y construir progresivamente una estructura propia basada en tema y plugin propios.

La prioridad es avanzar sin romper la web actual.
