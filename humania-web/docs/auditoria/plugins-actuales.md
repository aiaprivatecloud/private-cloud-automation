# Plugins actuales — HUMANía Web

Este documento recoge el inventario inicial de plugins instalados actualmente en la web antes de migrar al nuevo diseño de HUMANía Web.

## Objetivo

Saber qué plugins existen, para qué sirven y qué decisión inicial se toma sobre cada uno antes de instalar el nuevo tema y el nuevo plugin.

## Resumen

| Dato | Valor |
|---|---:|
| Plugins detectados | 16 |
| Plugins activos | 15 |
| Plugins inactivos | 1 |
| Dependencia fuerte detectada | Elementor |
| Formularios detectados | 3 |
| Sistema claro de newsletter | No confirmado |
| Plugins candidatos a eliminación futura | 5 |
| Plugins a mantener inicialmente | 10 |
| Plugins a vigilar especialmente | 2 |

## Tabla de plugins

| Plugin | Estado | Función | Crítico ahora | Decisión inicial |
|---|---|---|---|---|
| All in One SEO | Activo | SEO, mapas del sitio, metadatos | Sí | Mantener por ahora |
| Complianz - Terms and Conditions | Activo | Términos y condiciones | Sí | Mantener por ahora |
| Complianz GDPR/CCPA Cookie Consent | Activo | Cookies, RGPD, privacidad | Sí | Mantener y completar configuración |
| Elementor | Activo | Maquetador visual | Sí | Mantener hasta reconstruir diseño |
| hCaptcha for WP | Inactivo | Antispam / captcha | No | Borrar en staging si no se usa |
| Lean Player | Activo | Reproductor audio/vídeo | Dudoso | Candidato a eliminar si solo contiene demos |
| LiteSpeed Cache | Activo | Caché y rendimiento | Sí | Mantener |
| Plantillas de inicio | Activo | Importador de plantillas | No | Candidato a eliminar |
| Plantillas de inicio de Kadence WP | Activo | Importador de plantillas | No | Candidato a eliminar |
| PRO Elements | Activo | Funciones avanzadas para Elementor | Sí, mientras dependa Elementor | Vigilar y sustituir a futuro |
| Really Simple Security | Activo | Seguridad, hardening, 2FA, vulnerabilidades | Sí | Mantener por ahora |
| ShortPixel Image Optimizer | Activo | Optimización de imágenes | Sí | Mantener por ahora |
| Ultimate Addons for Elementor | Activo | Extensiones, cabeceras, pies y bloques Elementor | Sí, mientras dependa Elementor | Mantener temporalmente |
| WP Mail SMTP | Activo | Envío fiable de correos | Sí | Mantener |
| WP Popular Posts | Activo | Entradas populares | No crítico | Revisar si se sustituye |
| WPForms Lite | Activo | Formularios | Sí | Mantener por ahora |

## Diagnóstico general

La web actual depende de un conjunto importante de plugins vinculados al diseño visual.

La dependencia principal es:

- Elementor
- PRO Elements
- Ultimate Addons for Elementor
- Plantillas de inicio
- Plantillas de inicio de Kadence WP

Esto indica que parte del diseño actual fue construido con plantillas y bloques visuales.

No se debe eliminar Elementor ni sus extensiones hasta que el nuevo tema HUMANía sustituya esas páginas y plantillas.

## Plugins que se mantienen inicialmente

Estos plugins deben mantenerse al inicio de la migración:

- All in One SEO
- Complianz - Terms and Conditions
- Complianz GDPR/CCPA Cookie Consent
- Elementor
- LiteSpeed Cache
- Really Simple Security
- ShortPixel Image Optimizer
- WP Mail SMTP
- WPForms Lite
- Ultimate Addons for Elementor

Motivo:

- sostienen funcionalidades actuales
- pueden afectar a SEO, formularios, cookies, rendimiento o diseño
- no deben retirarse sin pruebas en staging

## Plugins candidatos a eliminación futura

### hCaptcha for WP

Está inactivo.

Además, los formularios revisados muestran reCAPTCHA activo, no hCaptcha.

Decisión inicial:

- revisar en staging
- borrar si no se usa
- no mantener plugins inactivos sin motivo

### Plantillas de inicio

Probablemente se utilizó para importar diseños.

Debe revisarse si sigue siendo necesario.

Decisión inicial:

- mantener durante auditoría
- comprobar si aporta algo en producción
- eliminar en staging si no afecta

### Plantillas de inicio de Kadence WP

Probablemente se utilizó para importar diseños.

Decisión inicial:

- mantener durante auditoría
- comprobar dependencia real
- eliminar si no se usa

### Lean Player

La configuración de Lean Player está presente, pero la exportación revisada muestra elementos demo.

Elementos detectados:

- Demo: YouTube Video Player
- Demo: Vimeo Video Player
- Demo: HTML5 Video Player
- Demo: YouTube Video Player - Auto Play
- Demo: Audio / Podcast Player - Speed 1.25

No se ha confirmado uso real en páginas o entradas.

Decisión inicial:

- revisar en staging
- comprobar si hay shortcodes activos
- comprobar si alguna página pública lo usa
- eliminar si solo contiene demos

### WP Popular Posts

No parece crítico.

Decisión inicial:

- revisar si se muestra en la web actual
- valorar sustitución por bloque propio o consulta del tema
- mantener solo si aporta valor real

## Plugins a vigilar especialmente

### PRO Elements

Añade funciones profesionales a Elementor.

Debe vigilarse porque:

- aumenta dependencia de Elementor
- puede afectar a plantillas actuales
- puede condicionar la migración
- debe sustituirse si el nuevo tema asume esas funciones

Decisión inicial:

- mantener hasta reconstruir diseño
- no depender de él en el diseño nuevo
- eliminar solo cuando staging confirme que no es necesario

### Ultimate Addons for Elementor

Puede estar gestionando cabeceras, pies de página, bloques o shortcodes.

Decisión inicial:

- mantener temporalmente
- revisar dónde se usa
- sustituir progresivamente por el tema propio

## Plugins legales y privacidad

Plugins:

- Complianz - Terms and Conditions
- Complianz GDPR/CCPA Cookie Consent

Estado detectado:

- gestión de consentimientos activada
- progreso aproximado: 25%
- 6 tareas abiertas
- términos y condiciones validados
- aviso sobre custom post types no cubiertos por el escaneo gratuito

Decisión inicial:

- mantener
- revisar asistente
- completar tareas abiertas
- conservar páginas legales existentes
- comprobar que la nueva web respeta cookies y privacidad
- no sustituir hasta tener alternativa legal clara

## Plugins de rendimiento

Plugins:

- LiteSpeed Cache
- ShortPixel Image Optimizer

Decisión inicial:

- mantener
- revisar configuración en staging
- comprobar compatibilidad con el nuevo tema
- comprobar que no rompe CSS o JavaScript
- mantener optimización de imágenes

## Plugins de comunicación

Plugins:

- WP Mail SMTP
- WPForms Lite

Estado detectado:

- WPForms Lite tiene 3 formularios.
- WP Mail SMTP está configurado con Google / Gmail OAuth.
- El remitente actual es `AI Aprendí`.
- No hay conexión de respaldo configurada.

Decisión inicial:

- mantener
- revisar formularios existentes
- revisar envío de correos
- revisar si hay formularios de suscripción
- revisar consentimiento
- cambiar identidad del remitente a HUMANía durante la migración de marca

## Plugins de seguridad

Plugin:

- Really Simple Security

Decisión inicial:

- mantener
- revisar configuración
- comprobar 2FA
- revisar usuarios
- revisar alertas
- no duplicar funciones de seguridad con plugins innecesarios

## Relación con el nuevo tema

El nuevo tema HUMANía podrá sustituir progresivamente funciones visuales de:

- Elementor
- PRO Elements
- Ultimate Addons for Elementor
- WP Popular Posts

Pero no en la primera instalación.

## Relación con el nuevo plugin

El plugin HUMANía AI News podrá sustituir progresivamente funciones editoriales relacionadas con:

- noticias IA
- borradores automatizados
- clasificación
- revisión editorial
- archivo temático

Pero no sustituye de momento:

- SEO
- formularios
- cookies
- seguridad
- caché
- SMTP
- optimización de imágenes

## Estrategia de reducción de plugins

La reducción debe hacerse en staging y de uno en uno.

Orden recomendado:

1. hCaptcha, si no se usa.
2. Plantillas de inicio, si no se usa.
3. Plantillas de inicio de Kadence WP, si no se usa.
4. Lean Player, si solo contiene demos.
5. WP Popular Posts, si se puede sustituir.
6. PRO Elements, cuando no haya dependencia.
7. Ultimate Addons for Elementor, cuando no haya dependencia.
8. Elementor, solo al final.

## Reglas

- No desactivar plugins en producción para probar.
- No eliminar plugins sin backup.
- No eliminar Elementor hasta reconstruir páginas.
- No eliminar Complianz sin alternativa legal.
- No eliminar WPForms sin revisar formularios.
- No eliminar WP Mail SMTP si hay formularios o newsletter futura.
- No mantener plugins inactivos sin motivo.
- No usar Gmail como solución de newsletter masiva.

## Pendiente

- revisar formularios existentes en WPForms
- revisar ajustes completos de WP Mail SMTP
- revisar uso real de Lean Player en páginas públicas
- revisar si WP Popular Posts se muestra en la web
- revisar configuración de Complianz
- completar tareas abiertas de Complianz
- revisar configuración de LiteSpeed Cache
- revisar alertas de Really Simple Security
- revisar dependencia exacta de PRO Elements
- revisar dependencia exacta de Ultimate Addons for Elementor
