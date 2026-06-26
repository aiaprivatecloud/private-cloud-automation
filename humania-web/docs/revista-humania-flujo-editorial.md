# Revista HUMANía - Flujo editorial de noticias IA

## Objetivo

La Revista HUMANía recoge noticias de inteligencia artificial desde fuentes RSS configuradas en WordPress, pero no publica nada automáticamente.

El sistema solo crea candidatas editoriales. La revisión, descarte, edición y publicación final siguen siendo manuales.

## Estado actual probado

- Fuente RSS activa de prueba: Xataka Inteligencia Artificial.
- Importación manual funcional.
- Importación automática programada cada 6 horas.
- Las noticias se crean como borrador.
- Las noticias entran con estado editorial pending_review.
- Las noticias duplicadas se evitan por URL original.
- Las noticias descartadas desaparecen de pendientes.
- Las noticias revisadas desaparecen de pendientes.
- Al publicar manualmente una noticia, se marca automáticamente como approved.
- La página pública /revista-humania/ muestra solo noticias publicadas y aprobadas.

## Fuente RSS de prueba

Actualmente se recomienda probar solo con una fuente:

https://www.xataka.com/tag/inteligencia-artificial/rss2.xml

No añadir más fuentes hasta validar el flujo durante varios días desde móvil.

## Flujo editorial

### 1. Importación

La importación puede ser manual desde HUMANía IA > Revisión > Importar noticias ahora, o automática mediante WP-Cron cada 6 horas.

En ambos casos, las noticias importadas se guardan como:

- post_type: humania_news
- post_status: draft
- humania_news_editorial_status: pending_review

No se publica nada automáticamente.

### 2. Revisión

En HUMANía IA > Revisión aparece la lista de últimas candidatas pendientes.

Cada noticia tiene dos acciones rápidas:

- Revisar: marca la noticia como in_review y abre el editor.
- Descartar: marca la noticia como discarded y la elimina de la lista de pendientes.

Una noticia deja de aparecer en pendientes cuando ya no tiene estado editorial pending_review.

### 3. Publicación

Al publicar manualmente una noticia HUMANía desde el editor, el plugin fuerza automáticamente:

humania_news_editorial_status: approved

Así la noticia aparece en la página pública:

/revista-humania/

La página pública solo muestra noticias que cumplan ambas condiciones:

- post_status: publish
- humania_news_editorial_status: approved

## Estados editoriales

- pending_review: candidata recién importada, pendiente de revisar.
- in_review: noticia abierta para revisión editorial.
- approved: noticia aprobada para mostrarse en Revista HUMANía.
- discarded: noticia descartada.

## Automatización cada 6 horas

La automatización se gestiona desde includes/cron.php.

Hook:

humania_ai_news_import_sources_event

Intervalo:

humania_every_six_hours

La pantalla HUMANía IA > Revisión muestra:

- estado de programación;
- próxima ejecución;
- zona horaria de WordPress;
- última ejecución automática;
- último resultado automático.

## Nota sobre WP-Cron

WP-Cron no es un cron real del servidor. Se ejecuta cuando WordPress recibe visitas o actividad.

Durante la prueba en staging puede retrasarse si la web no recibe visitas. Para producción, si el sistema funciona bien, se recomienda configurar un cron real en Hostinger que llame periódicamente a wp-cron.php.

## Prueba móvil durante dos días

Durante la prueba:

1. Mantener solo Xataka como fuente RSS.
2. Revisar desde móvil la pantalla HUMANía IA > Revisión.
3. Comprobar que la automatización se ejecuta cada 6 horas o queda marcada como programada.
4. Revisar si aparecen nuevas candidatas.
5. Descartar alguna noticia desde el móvil.
6. Revisar alguna noticia desde el móvil.
7. Publicar una noticia desde el móvil.
8. Confirmar que aparece en /revista-humania/.
9. Confirmar que no aparecen noticias descartadas ni pendientes.
10. Confirmar que no se duplican noticias ya importadas.

## Criterio para pasar a la siguiente fase

Solo pasar a nuevas fuentes o mejoras cuando durante dos días se confirme:

- la automatización no rompe nada;
- el flujo móvil es cómodo;
- las candidatas se gestionan bien;
- las publicadas aparecen correctamente;
- las descartadas desaparecen;
- no hay duplicados molestos;
- la página pública se mantiene limpia.

## Próximas mejoras posibles

- Añadir más fuentes RSS.
- Añadir filtro por medio.
- Añadir contador de pendientes en el panel.
- Añadir botón de ejecución manual del cron.
- Configurar cron real en Hostinger.
- Mejorar detección de idioma.
- Añadir resúmenes ampliados para medios no castellanos.
- Añadir gestión segura de imágenes candidatas.
