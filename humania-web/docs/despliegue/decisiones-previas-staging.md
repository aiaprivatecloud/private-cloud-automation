# Decisiones previas a staging — HUMANía Web

Este documento recoge las decisiones tomadas antes de probar el nuevo tema y el nuevo plugin de HUMANía Web en un entorno de staging.

## Objetivo

Evitar instalar el tema y el plugin sin criterio previo.

La prueba en staging debe servir para comprobar compatibilidad, detectar errores y decidir el orden real de migración sin tocar producción.

## Estado actual

La web actual tiene:

- 452 entradas
- 9 páginas
- 562 medios / adjuntos
- 421 comentarios
- 2 usuarios
- 16 plugins detectados
- 3 formularios WPForms
- dependencia fuerte de Elementor
- correo saliente configurado con WP Mail SMTP
- cookies/legal gestionado con Complianz
- posible uso residual de Lean Player

## Decisión principal

La prueba debe hacerse en una copia de la web actual.

No se recomienda probar primero en un WordPress vacío.

Motivo:

- hay que comprobar entradas reales
- hay que comprobar páginas reales
- hay que comprobar medios reales
- hay que comprobar formularios reales
- hay que comprobar dependencias de Elementor
- hay que comprobar SEO, cookies y menús reales

## Producción

Producción no se toca en esta fase.

No se debe:

- activar el tema nuevo en producción
- activar el plugin nuevo en producción
- eliminar plugins en producción
- limpiar categorías en producción
- modificar formularios en producción
- cambiar legal/cookies en producción
- lanzar newsletter en producción

## Staging

El staging debe ser una copia funcional de la web actual.

Antes de instalar nada se debe comprobar:

- que carga la portada
- que cargan entradas
- que cargan páginas
- que cargan medios
- que funcionan menús
- que funcionan formularios
- que el panel de WordPress funciona
- que no hay errores visibles
- que la copia no indexa en buscadores si el entorno lo permite

## Tema HUMANía

Archivo:

- `humania-theme.zip`

Decisión:

- instalar en staging
- activar solo después de confirmar backup/copia funcional
- revisar errores
- revisar diseño
- volver al tema anterior si rompe partes críticas

No se espera que el tema esté completo en la primera activación.

La primera activación sirve para comprobar:

- que WordPress lo reconoce
- que no rompe el panel
- que carga sin error fatal
- que muestra entradas básicas
- que aplica estilos base
- que respeta accesibilidad básica

## Plugin HUMANía AI News

Archivo:

- `humania-ai-news.zip`

Decisión:

- instalar en staging
- activar en staging
- comprobar menú de administración
- comprobar páginas internas
- comprobar que no publica nada
- comprobar que no captura noticias automáticamente
- comprobar que no genera errores

El plugin no debe tener automatización real en esta fase.

## Elementor

Decisión:

- mantener Elementor durante la primera fase
- mantener PRO Elements durante la primera fase
- mantener Ultimate Addons for Elementor durante la primera fase

Motivo:

La web actual tiene páginas importantes creadas con Elementor:

- Portada
- Nosotros
- Contacta
- Dudas
- AI decálogo
- AIA

Elementor solo podrá eliminarse cuando esas páginas estén reconstruidas con el tema propio.

## Plugins que se mantienen inicialmente

Se mantienen en staging durante la primera prueba:

- All in One SEO
- Complianz - Terms and Conditions
- Complianz GDPR/CCPA Cookie Consent
- Elementor
- LiteSpeed Cache
- PRO Elements
- Really Simple Security
- ShortPixel Image Optimizer
- Ultimate Addons for Elementor
- WP Mail SMTP
- WPForms Lite

Motivo:

Afectan a diseño, formularios, SEO, seguridad, rendimiento, privacidad o correo.

## Plugins que se revisarán después

No se eliminan antes de la primera prueba.

Candidatos a revisión posterior:

- hCaptcha for WP
- Lean Player
- Plantillas de inicio
- Plantillas de inicio de Kadence WP
- WP Popular Posts

## hCaptcha

Estado:

- inactivo
- los formularios revisados usan reCAPTCHA

Decisión:

- candidato a eliminación en staging
- no eliminar todavía en producción

## Lean Player

Estado:

- activo
- exportación detectada con elementos demo
- uso real no confirmado

Decisión:

- revisar en staging
- comprobar si hay shortcodes activos
- comprobar si alguna página pública lo usa
- eliminar solo si no afecta a nada

## WPForms

Estado:

- 3 formularios detectados
- un formulario llamado `Newsletter Signup Form`
- no se detecta newsletter real

Decisión:

- mantener WPForms Lite
- revisar ubicación pública de formularios
- revisar mensajes de confirmación
- revisar destinatarios
- revisar consentimiento legal

## Newsletter

Decisión:

- no lanzar newsletter en esta fase
- no usar emails de comentarios como suscriptores
- no considerar usuarios WordPress como suscriptores
- no considerar contactos como suscriptores

Antes de activar newsletter debe existir:

- formulario claro
- consentimiento explícito
- política de privacidad actualizada
- sistema de baja
- herramienta elegida
- prueba de envío
- registro del consentimiento

## WP Mail SMTP

Estado:

- Gmail / Google OAuth configurado
- remitente actual: `eiaihoy@gmail.com`
- nombre remitente actual: `AI Aprendí`
- sin conexión de respaldo

Decisión:

- mantener en staging
- probar envío de formularios
- cambiar identidad a HUMANía más adelante
- no usar Gmail como sistema de newsletter masiva

## Complianz

Estado:

- activo
- consentimiento activado
- configuración incompleta
- tareas abiertas
- aviso sobre custom post types no cubiertos por escaneo gratuito

Decisión:

- mantener
- completar asistente antes de producción
- revisar cookies
- revisar términos
- revisar privacidad
- adaptar textos a HUMANía

## SEO

Plugin actual:

- All in One SEO

Decisión:

- mantener
- no cambiar estructura de URLs al principio
- no borrar metadatos
- no cambiar categorías masivamente
- revisar SEO después de activar tema en staging

## Taxonomías

Decisión:

- no limpiar categorías ni etiquetas antes de staging

Cambios futuros posibles:

- Humania -> HUMANía
- Podcast IA Hoy -> Podcast HUMANía
- Chat GPT -> ChatGPT / Modelos de IA
- Leyes IA -> Regulación
- empresas -> Empresas
- Ciencias/ciencias -> Ciencia
- ElonMusk -> Elon Musk
- Noticias IA/noticias IA -> Noticias IA

## Portada

Decisión inicial:

La futura portada HUMANía debería priorizar:

- identidad clara
- último episodio destacado
- últimas entradas/noticias
- acceso al podcast
- explicación breve del proyecto
- contacto
- futura newsletter

No se recomienda depender de sliders, plantillas visuales pesadas ni bloques innecesarios.

## Criterios de éxito en staging

La prueba se considera aceptable si:

- el tema se instala
- el plugin se instala
- no hay error fatal
- el panel funciona
- las entradas se pueden ver
- las páginas se pueden abrir
- los medios cargan
- los formularios siguen accesibles
- el plugin HUMANía no publica automáticamente
- el sitio puede volver al tema anterior sin pérdida

## Criterios de fallo

La prueba se considera fallida si:

- hay error fatal
- se rompe el panel
- se pierden entradas
- se pierden páginas
- dejan de cargar medios
- se rompen formularios
- se rompe el login
- el plugin publica algo sin orden humana
- el tema impide volver al diseño anterior

## Rollback en staging

Si falla el tema:

1. Volver al tema anterior.
2. Desactivar tema HUMANía.
3. Revisar logs.
4. Corregir en local.
5. Volver a empaquetar.

Si falla el plugin:

1. Desactivar plugin HUMANía AI News.
2. Revisar logs.
3. Corregir en local.
4. Volver a empaquetar.

## Orden recomendado de prueba

1. Confirmar staging.
2. Confirmar que staging replica producción.
3. Hacer captura del estado inicial.
4. Instalar tema HUMANía.
5. Activar tema HUMANía.
6. Revisar errores.
7. Volver al tema anterior si hace falta.
8. Instalar plugin HUMANía AI News.
9. Activar plugin.
10. Revisar panel.
11. Probar formularios.
12. Revisar Complianz.
13. Revisar rendimiento básico.
14. Documentar resultados.

## Decisión final antes de Hostinger

La migración no empieza por diseño.

Empieza por staging, comprobación, rollback y registro de errores.

El objetivo no es que todo quede perfecto en la primera prueba.

El objetivo es saber qué rompe, qué sobrevive y qué hay que construir después.
