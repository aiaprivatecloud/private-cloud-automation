# Resultados de prueba en staging — HUMANía Web

Este documento resume la primera prueba real del tema y del plugin HUMANía en staging.

## Objetivo

Comprobar si el nuevo tema y el plugin propio pueden instalarse y funcionar sobre una copia real de la web actual sin afectar a producción.

## Entorno

| Elemento | Resultado |
|---|---|
| Entorno usado | Staging |
| Producción afectada | No |
| Backup manual previo | Sí |
| Staging recreado desde web actual | Sí |
| Tema HUMANía probado | Sí |
| Plugin HUMANía AI News probado | Sí |

## Backup previo

Antes de probar staging se creó un backup manual desde Hostinger.

También se recibió por correo un enlace de descarga de la web completa.

Decisiones:

- no subir backups a Git
- no compartir enlaces de backup
- conservar copia fuera del repositorio
- probar siempre en staging antes de producción

## Tema HUMANía

| Comprobación | Resultado |
|---|---|
| ZIP inicial aceptado | No |
| ZIP regenerado con Python | Sí |
| Tema instalado | Sí |
| Tema activo en staging | Sí |
| Error fatal | No |
| Panel WordPress accesible | Sí |
| Frontal carga | Sí |

Observaciones:

- el tema carga contenido real
- mantiene identidad antigua AI IA HOY
- las entradas se muestran correctamente
- las páginas Elementor siguen cargando
- falta diseño final HUMANía
- falta plantilla específica single.php

## Plugin HUMANía AI News

| Comprobación | Resultado |
|---|---|
| Plugin instalado | Sí |
| Plugin activado | Sí |
| Menú HUMANía IA visible | Sí |
| Error fatal | No |
| Captura automática | No |
| Publicación automática | No |

Durante la prueba se mejoró el plugin:

- menú Ajustes
- menú Revisión
- pantalla de ajustes real
- guardado de configuración
- saneamiento de opciones
- pantalla de revisión con configuración guardada

## Formularios y correo

| Comprobación | Resultado |
|---|---|
| Formulario visible | Sí |
| Envío realizado | Sí |
| Correo recibido | Sí |
| WP Mail SMTP funciona | Sí |
| Error visible | No |

Conclusión:

WPForms y WP Mail SMTP funcionan correctamente en staging.

## Cookies y legal

| Comprobación | Resultado |
|---|---|
| Banner de cookies aparece | Sí |
| Rechazar cookies funciona | Sí |
| Política de cookies abre | Sí |
| Términos y condiciones abre | Sí |
| Política de privacidad localizada | No |
| Enlaces legales en footer | No |

Pendiente antes de producción:

- crear o confirmar Política de privacidad
- añadir enlaces legales al footer
- revisar Complianz
- revisar páginas legales definitivas

## Reproductor HUMANía

Se creó y probó el shortcode [humania_player].

| Comprobación | Resultado |
|---|---|
| Shortcode renderiza | Sí |
| Audio reproduce | Sí |
| Usa URL real del RSS/Anchor | Sí |
| Botones externos aparecen | Sí |
| Error fatal | No |

Conclusión:

El reproductor propio funciona como primera versión.

Pendiente:

- mejorar diseño
- probar en móvil
- añadir enlaces reales por plataforma
- valorar lectura automática del RSS
- sustituir progresivamente embeds antiguos de iVoox

## Lean Player

La auditoría indica que Lean Player probablemente no es necesario.

Pendiente:

- desactivarlo en staging
- comprobar que no se rompe ningún contenido
- eliminarlo solo si no afecta a nada

## Problemas detectados

| Problema | Gravedad | Estado |
|---|---|---|
| Política de privacidad no localizada | Alta antes de producción | Pendiente |
| Enlaces legales no visibles en footer | Media/alta | Pendiente |
| Identidad antigua AI IA HOY visible | Media | Pendiente |
| Falta diseño final HUMANía | Media | Pendiente |
| Falta single.php | Media | Pendiente |
| Reproductor necesita pulido visual | Media | Pendiente |
| RSS aún no se procesa automáticamente | Media | Pendiente |
| Lean Player pendiente de prueba | Baja/media | Pendiente |

## Resultado general

La prueba inicial de staging es positiva.

El tema y el plugin pueden instalarse y funcionar sobre la web real sin romper el sitio.

No está listo para producción, pero sí está listo para seguir desarrollando sobre staging.

## Próximos pasos

1. Crear o confirmar Política de privacidad.
2. Añadir enlaces legales al footer.
3. Crear plantilla single.php.
4. Mejorar diseño del reproductor.
5. Probar reproductor en móvil.
6. Desactivar Lean Player en staging y comprobar impacto.
7. Definir formato definitivo para episodios.
8. Preparar lectura automática del RSS.
9. Rediseñar cabecera y portada con identidad HUMANía.
10. Mantener producción sin cambios.
