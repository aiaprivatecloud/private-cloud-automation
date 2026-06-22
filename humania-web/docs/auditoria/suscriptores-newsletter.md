# Suscriptores y newsletter — HUMANía Web

Este documento recoge el análisis inicial de usuarios, posibles suscriptores y futura newsletter de HUMANía Web.

## Objetivo

Identificar dónde están almacenados los posibles suscriptores actuales, qué consentimiento existe y cómo se podría implementar una newsletter futura de forma segura, legal y mantenible.

## Datos actuales conocidos

A partir del panel de WordPress y de la exportación XML completa se detecta:

| Elemento | Cantidad / Estado |
|---|---|
| Usuarios de WordPress | 2 |
| Comentarios | 421 |
| Plugin específico de newsletter | No detectado |
| Plugin de formularios | WPForms Lite |
| Plugin de envío de correo | WP Mail SMTP |
| Plugin legal/cookies | Complianz |
| Sistema claro de newsletter | No confirmado |

## Usuarios actuales

Usuarios detectados en WordPress:

| Usuario | Rol | Contenido asociado |
|---|---|---:|
| Administrador principal | Administrador / Instructor de Tutor | 452 |
| Editora | Editor | 0 |

## Observaciones sobre usuarios

- Hay un usuario administrador principal con todo el contenido asociado.
- Hay una usuaria con rol Editor y 0 contenidos.
- Aparece un rol adicional llamado “Instructor de Tutor”.
- Ese rol podría venir de un plugin anterior o de una funcionalidad educativa ya no visible.
- Conviene revisar roles y permisos antes de producción.

## Recomendaciones sobre usuarios

- Activar 2FA para usuarios con acceso al panel.
- Mantener solo los roles necesarios.
- Revisar si el rol “Instructor de Tutor” sigue teniendo sentido.
- No usar cuenta administradora para tareas editoriales ordinarias si se puede evitar.
- Revisar que no existan usuarios antiguos o innecesarios.

## Newsletter actual

No se detecta todavía un sistema claro de newsletter.

No aparecen plugins específicos como:

- MailPoet
- Mailchimp
- Brevo
- Newsletter
- FluentCRM
- MailerLite
- ConvertKit

Plugins relacionados detectados:

- WPForms Lite
- WP Mail SMTP

## WPForms Lite

WPForms Lite puede usarse para formularios de contacto o captación.

Pendiente revisar:

- formularios existentes
- campos recogidos
- finalidad de cada formulario
- si existe checkbox de consentimiento
- si existe aviso legal
- si recoge emails para contacto o suscripción
- si almacena entradas en WordPress o solo envía correo

## WP Mail SMTP

WP Mail SMTP no es un sistema de newsletter.

Su función es mejorar la entrega de correos enviados por WordPress.

Puede ser útil para:

- formularios de contacto
- avisos administrativos
- confirmaciones
- futuras integraciones de newsletter

Pero no gestiona por sí solo:

- listas de suscriptores
- campañas
- bajas
- consentimiento
- segmentación

## Comentarios

La web tiene 421 comentarios.

Los comentarios no deben considerarse automáticamente suscriptores de newsletter.

Pueden contener emails, pero esos emails se recogieron para comentar, no necesariamente para recibir comunicaciones editoriales.

## Regla principal

No se debe enviar newsletter a nadie si no existe una base clara para hacerlo.

Un usuario, comentarista o contacto no equivale automáticamente a suscriptor de newsletter.

## Futura newsletter HUMANía

La newsletter futura debería implementarse como sistema separado y claro.

Debe incluir:

- formulario específico de suscripción
- consentimiento explícito
- finalidad clara
- política de privacidad actualizada
- registro de fecha de alta
- registro de origen del consentimiento
- sistema sencillo de baja
- identificación clara del remitente

## Opciones futuras

### Opción 1: servicio externo

Ejemplos posibles:

- Brevo
- Mailchimp
- MailerLite
- MailPoet
- ConvertKit

Ventajas:

- gestión de bajas
- plantillas
- entregabilidad
- estadísticas
- cumplimiento más sencillo

Inconvenientes:

- dependencia externa
- coste potencial
- configuración de privacidad
- integración con WordPress

### Opción 2: plugin WordPress especializado

Ventajas:

- integración directa con WordPress
- gestión desde el panel
- menos herramientas externas

Inconvenientes:

- más carga para WordPress
- más mantenimiento
- otro plugin crítico
- cuidado con entregabilidad

### Opción 3: desarrollo propio

Ventajas:

- control total
- integración con HUMANía
- independencia parcial

Inconvenientes:

- más desarrollo
- más responsabilidad legal
- gestión de bajas
- entregabilidad
- logs
- seguridad
- mantenimiento

## Decisión inicial

No implementar newsletter todavía.

Antes hay que:

1. Revisar formularios actuales.
2. Revisar si existe alguna lista real de suscriptores.
3. Revisar consentimiento actual.
4. Revisar política de privacidad.
5. Decidir sistema de newsletter.
6. Definir texto legal.
7. Probar en staging.
8. Activar solo cuando el sistema esté claro.

## Riesgos

| Riesgo | Mitigación |
|---|---|
| Usar emails de comentarios como suscriptores | No hacerlo |
| Confundir usuarios con suscriptores | Separar usuarios y newsletter |
| Enviar correos sin consentimiento | Revisar base legal |
| No permitir baja sencilla | Incluir baja en cada comunicación |
| Usar WP Mail SMTP como newsletter | No hacerlo |
| Duplicar listas | Centralizar sistema |
| Perder consentimiento | Registrar origen y fecha |
| Exponer emails | Minimizar datos y proteger accesos |

## Relación con el plugin HUMANía AI News

El plugin HUMANía AI News no debe gestionar newsletter en su primera fase.

Su objetivo inicial es:

- capturar noticias
- clasificar
- resumir
- crear borradores
- facilitar revisión humana

La newsletter podría integrarse en una fase posterior, pero como módulo separado o con integración externa.

## Pendiente

- revisar formularios de WPForms
- revisar si WPForms almacena entradas
- revisar textos de consentimiento
- revisar si hay casillas de aceptación
- revisar configuración de WP Mail SMTP
- revisar política de privacidad actual
- decidir herramienta de newsletter
- definir estrategia de suscripción
- definir estrategia de baja
