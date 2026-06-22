# Seguridad base — HUMANía Web

Este documento define la base de seguridad del proyecto HUMANía Web.

## Contexto

HUMANía Web será una web basada en WordPress, alojada en Hostinger, con tema propio y plugin propio para automatización de noticias de inteligencia artificial.

Esto implica riesgos específicos:

- Errores en el tema.
- Errores en el plugin.
- Entradas externas no confiables.
- Posibles ataques a formularios.
- Riesgos asociados a APIs.
- Riesgos asociados a automatización con IA.
- Gestión incorrecta de permisos.
- Publicación accidental de contenido no revisado.
- Filtración de claves o secretos.

## Objetivo de seguridad

La web debe diseñarse para reducir riesgos desde el inicio.

La seguridad no debe añadirse al final como parche, sino integrarse en:

- Arquitectura.
- Desarrollo.
- Automatización.
- Publicación.
- Mantenimiento.
- Backups.
- Gestión de usuarios.

## Principios básicos

### Mínimo privilegio

Cada usuario, función o proceso debe tener solo los permisos estrictamente necesarios.

### Validar entrada

Toda entrada debe validarse antes de usarse.

Esto incluye:

- Formularios.
- Parámetros de URL.
- Fuentes RSS.
- APIs externas.
- Respuestas de modelos de IA.
- Campos de administración.

### Escapar salida

Todo dato mostrado en pantalla debe escaparse correctamente.

Esto reduce riesgos de XSS y errores derivados de mostrar contenido no confiable.

### No confiar en fuentes externas

Las noticias, feeds, APIs y modelos de IA deben considerarse fuentes no confiables hasta que sean validadas.

### Revisión humana

La automatización de noticias debe crear borradores al principio.

No se debe publicar automáticamente contenido generado o resumido por IA sin revisión.

### Secretos fuera del repositorio

No deben guardarse en Git:

- Claves API.
- Tokens.
- Contraseñas.
- Credenciales de WordPress.
- Credenciales de Hostinger.
- Datos personales.

### Logs controlados

El sistema debe registrar errores y eventos relevantes, pero no debe guardar información sensible innecesaria.

## Áreas de seguridad

### WordPress

- Usuarios con permisos mínimos.
- Contraseñas robustas.
- 2FA en cuentas críticas.
- Actualizaciones controladas.
- Plugins mínimos.
- Eliminación de plugins no usados.
- Staging antes de producción.
- Backups periódicos.

### Tema propio

- HTML semántico.
- Código simple.
- Sin librerías innecesarias.
- Escape de salidas.
- No incluir lógica sensible en plantillas.
- No cargar scripts externos sin justificación.

### Plugin propio

- Validación de entradas.
- Sanitización.
- Escape de salidas.
- Nonces en formularios.
- Comprobación de capacidades.
- Control de errores.
- Logs.
- Límites de ejecución.
- Creación inicial de borradores, no publicación directa.

### Automatización de noticias

- Fuentes permitidas.
- Eliminación de duplicados.
- Validación de URLs.
- Control de prompt injection.
- Revisión humana.
- Registro de operaciones.
- No ejecución automática de instrucciones externas.

## Riesgos principales

| Riesgo | Impacto | Mitigación |
|---|---|---|
| XSS | Alto | Escape de salidas y validación |
| CSRF | Medio/Alto | Nonces |
| Permisos incorrectos | Alto | Comprobación de capacidades |
| Prompt injection | Alto | Aislar instrucciones y validar salidas |
| Publicación automática errónea | Medio/Alto | Borradores y revisión humana |
| Exposición de claves | Alto | Secretos fuera del repo |
| Plugins vulnerables | Alto | Mínimos plugins y actualizaciones |
| Pérdida de datos | Alto | Backups y restauración probada |

## Revisión

Este documento debe revisarse antes de comenzar:

- desarrollo del tema
- desarrollo del plugin
- conexión con fuentes externas
- automatización con IA
- despliegue en Hostinger
