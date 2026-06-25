# Formato automatizado de episodio HUMANía

Este documento define el formato actual para publicar episodios en la nueva web HUMANía.

La publicación de episodios ya no depende de insertar bloques manuales ni de pegar shortcodes dentro del contenido principal de WordPress.

La plantilla `single.php` del tema `humania-theme` detecta los campos propios del episodio y genera automáticamente la estructura pública.

## Principio general

Cada episodio se publica como una entrada normal de WordPress.

Ruta recomendada:

- WordPress → Entradas → Añadir nueva

El diseño del episodio se genera desde campos propios, no desde maquetación manual.

## Qué NO debe hacerse

No se debe insertar manualmente el shortcode del reproductor en el contenido principal.

No se debe pegar esto dentro del editor:

[humania_player audio="..."]

Tampoco se deben maquetar manualmente en el editor principal estas secciones:

- Resumen
- Ideas clave
- Referencias
- Reproductor

La plantilla se encarga de generar esas partes.

## Editor principal de WordPress

En episodios HUMANía, el contenido principal del editor no se imprime como sección pública del episodio.

La estructura visible se genera desde los campos de la caja:

Datos del episodio HUMANía

Esto permite automatizar la creación de entradas en el futuro sin depender de bloques, Gutenberg o maquetación manual.

## Campos del episodio

La entrada debe rellenarse mediante la caja:

Datos del episodio HUMANía

Campos disponibles:

- Audio MP3
- Spotify
- Apple Podcasts
- iVoox
- YouTube
- Introducción breve
- Resumen
- Ideas clave
- Referencias

## Audio MP3

El campo Audio MP3 es el campo más importante.

Debe contener una URL directa a un archivo de audio reproducible, preferiblemente MP3.

Correcto:

https://d3ctxlq1ktw2nl.cloudfront.net/staging/2026-5-21/86b75e1e-ea7e-cd47-f998-bda6c2592fbb.mp3

Incorrecto:

Una URL intermedia de Anchor, Spotify, Apple Podcasts o cualquier página que envuelva el audio.

El reproductor HTML necesita una URL directa al archivo de audio.

Si el audio no es directo, el reproductor puede aparecer con duración 0:00 / 0:00 o no reproducir.

## Enlaces externos de escucha

Los campos Spotify, Apple Podcasts, iVoox y YouTube deben usarse solo si existe un enlace específico del episodio en esa plataforma.

No deben rellenarse con enlaces generales del podcast salvo que se decida expresamente.

## RSS

El RSS general del podcast no se usa dentro de cada episodio.

Motivo:

El RSS representa el feed completo del podcast, no un episodio concreto.

El RSS general debe colocarse en una sección global de la web, por ejemplo:

- página Dónde escuchar HUMANía;
- footer;
- bloque global de suscripción;
- página de contacto o distribución.

No debe aparecer como enlace de episodio.

## Introducción breve

La introducción breve aparece en la cabecera del episodio, debajo del título.

Debe ser clara y corta.

Ejemplo:

Un episodio sobre cómo la inteligencia artificial está transformando la educación sin pedir permiso a nadie, que al parecer es la nueva forma oficial de hacer cambios históricos.

## Resumen

El campo Resumen genera automáticamente una caja principal en el episodio.

Debe explicar el contenido del capítulo en uno o varios párrafos.

Ejemplo:

Este episodio analiza el impacto de la inteligencia artificial generativa en la educación, desde el uso de asistentes conversacionales hasta la automatización de tareas docentes.

También revisa los riesgos de dependencia tecnológica, pérdida de pensamiento crítico y desigualdad de acceso.

## Ideas clave

El campo Ideas clave se rellena con una idea por línea.

Ejemplo:

La plantilla controla el diseño del episodio.
El reproductor se genera desde el campo Audio MP3.
Las ideas clave se convierten automáticamente en lista.
Las referencias se preparan para automatización futura.

La plantilla convierte cada línea en un elemento de lista.

## Referencias

El campo Referencias se rellena con una referencia por línea.

Formato recomendado:

Título de la fuente | URL

Ejemplo:

Informe de Stanford sobre IA | https://example.com/informe
Artículo de referencia | https://example.com/articulo

Si no se incluye URL, la referencia aparecerá como texto normal.

## Imagen destacada

Cada episodio debe tener imagen destacada.

Recomendación:

- formato cuadrado 1:1 para coherencia con portadas del podcast;
- texto alternativo descriptivo;
- estilo visual alineado con HUMANía;
- evitar imágenes decorativas sin función editorial.

Ejemplo de texto alternativo:

Portada del episodio La conciencia sale a bolsa, con una campana financiera sobre una cocina humilde.

## Categorías

Cada episodio debe tener al menos una categoría.

Categorías recomendadas:

- Podcast
- Inteligencia artificial
- Actualidad IA
- HUMANía

Debe evitarse la categoría Uncategorized en publicaciones reales.

## Extracto

El extracto puede usarse como resumen breve para listados, portada y SEO.

Si no hay extracto manual, WordPress puede generar uno automáticamente, pero es preferible revisarlo.

## Estructura pública generada

Cuando una entrada tiene datos de episodio, la plantilla genera automáticamente:

- cabecera oscura con título;
- fecha y categorías;
- introducción breve;
- imagen destacada si existe;
- reproductor de audio;
- caja de resumen;
- caja de ideas clave;
- caja de referencias.

## Automatización futura

El formato actual está preparado para automatización.

Un proceso futuro podrá crear entradas rellenando campos como:

- title;
- excerpt;
- featured image;
- category;
- humania_audio_url;
- humania_spotify_url;
- humania_apple_url;
- humania_ivoox_url;
- humania_youtube_url;
- humania_episode_intro;
- humania_summary;
- humania_key_points;
- humania_references.

Los campos están registrados como metadatos de entrada y preparados para uso posterior.

## Checklist antes de publicar

- [ ] Título revisado.
- [ ] Categoría asignada.
- [ ] Imagen destacada añadida.
- [ ] Texto alternativo añadido.
- [ ] Audio MP3 directo añadido.
- [ ] Reproductor probado.
- [ ] Introducción breve revisada.
- [ ] Resumen revisado.
- [ ] Ideas clave añadidas, una por línea.
- [ ] Referencias añadidas con formato Título | URL.
- [ ] Enlaces externos del episodio revisados.
- [ ] No hay shortcode manual en el contenido principal.
- [ ] Vista móvil comprobada.
- [ ] Entrada publicada o programada.

## Estado

Formato automatizado probado en WordPress limpio de Hostinger.

Validado:

- un solo reproductor;
- audio funcionando con URL MP3 directa;
- diseño automático aplicado;
- resumen automático;
- ideas clave automáticas;
- referencias automáticas;
- RSS eliminado del flujo de episodio;
- portada sin botón RSS innecesario.
